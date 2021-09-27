<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Blockavel\LaraBlockIo\LaraBlockIoFacade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Coinremitter\Coinremitter;
use Victorybiz\GeoIPLocation\GeoIPLocation;
use Jimmerioles\BitcoinCurrencyConverter\Converter;

use App\Models\User;
use App\Models\Admin;
use App\Models\Buyer;
use App\Models\Merging;
use App\Models\Payout;
use App\Models\Seller;
use App\Models\Transaction;
use App\Models\Dispute;
use App\Models\Conversation;
use App\Models\Review;
use App\Models\Deposit;
use App\Models\Status;

use App\Mail\Notification;
use App\Mail\KycRejectMail;
use App\Mail\KycApproveMail;

use Mail;
use LaraBlockIo;
use Alert;
use Log;
use Coindesk;
use Swap;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth:admin']); //, '2fa'
    }

    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $balance = 0;//LaraBlockIo::getAvailableBalance();
        $user_count = User::all()->count();
        $transaction_count = Transaction::all()->count();
        $payout_count = Payout::where('approved_at', '')->count();

        return view('admin.home', [
            'user_count' => $user_count,
            'transaction_count' => $transaction_count,
            'payout_count' => $payout_count,
            'balance' => $balance
        ]);
    }

    /**
     * Show  Disputes.
     *
     * @return \Illuminate\Http\Response
     */
    public function disputes()
    {

        $disputes = Dispute::orderBy('id', 'DESC')->get();

        return view('admin.disputes', [
            'disputes' => $disputes
        ]);
    }

    /**
     * Show Payouts.
     *
     * @return \Illuminate\Http\Response
     */
    public function payouts()
    {

        $payouts = Payout::with(['user'])->get();

        return view('admin.payouts', [
            'payouts' => $payouts
        ]);
    }

    /**
     * Show Admin Profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('admin.profile');
    }

    /**
     * Show trades.
     *
     * @return \Illuminate\Http\Response
     */
    public function trades()
    {

        $trades = Merging::with(['buyer', 'seller', 'associated_seller', 'associated_buyer'])->get();

        return view('admin.trades', [
            'trades' => $trades
        ]);
    }

    /**
     * Show support tickets
     *
     * @return \Illuminate\Http\Response
     */
    public function tickets()
    {

        $balance = 0;//LaraBlockIo::getAvailableBalance();
        $user_count = User::all()->count();
        $transaction_count = Transaction::all()->count();
        $payout_count = Payout::where('approved_at', '')->count();

        return view('admin.tickets', [
            'user_count' => $user_count,
            'transaction_count' => $transaction_count,
            'payout_count' => $payout_count,
            'balance' => $balance
        ]);
    }


    /**
     * Show All Users
     *
     * @return \Illuminate\Http\Response
     */
    public function allUsers()
    {

        $users = User::all();

        return view('admin.allUsers', [
            'users' => $users
        ]);
    }


    public function saveProfile(Request $request)
    {
        $data = $request->all();

        $user = Admin::find($request->id);


        if(\Hash::check($data['old_password'], Auth::guard('admin')->user()->password)){
            if($request->new_password == $request->confirm_password){
                $user->email = $request->email;
                $user->password = bcrypt($request->new_password);
            }else{
                alert()->error('Password mismatch', 'Oops!')->persistent('Close');
                return redirect()->back();
            }
        }else{
            alert()->error('Wrong Old password, Try again with the right one', 'Oops!')->persistent('Close');
            return redirect()->back();
        }


        if($user->update()) {
            alert()->success('Save Changes', 'Success')->persistent('Close');
            return redirect()->back();
        }else{
            alert()->error('An Error Occurred', 'Oops!')->persistent('Close');
            return redirect()->back();
        }
    }


    public function blockUser(Request $request)
    {
        $id = $request['id'];

        $users = User::find($id);
        $users->status = 'blocked';
        $users->update();

        alert()->success('User blocked successfully.', 'Success')->persistent('Close');;
        return redirect()->back();
    }

    public function approveKYC(Request $request)
    {
        $id = $request['id'];

        $users = User::find($id);
        $users->status = 'approved';
        $users->update();

        //Mail::to($users->email)->send(new KycApproveMail($users->username));

        alert()->success('User Account Activated.', 'Success')->persistent('Close');;
        return redirect()->back();
    }

    public function rejectKYC(Request $request)
    {
        $id = $request['id'];

        $users = User::find($id);
        $users->status = NULL;
        $users->update();

        Mail::to($users->email)->send(new KycRejectMail($users->username));

        alert()->success('User KYC Rejected.', 'Success')->persistent('Close');;
        return redirect()->back();
    }

    public function unblockUser(Request $request)
    {
        $id = $request['id'];

        $users = User::find($id);
        $users->status = 'approved';
        $users->update();

        alert()->success('User unblocked successfully.', 'Success')->persistent('Close');;
        return redirect()->back();
    }

    public function approvePayout(Request $request)
    {
        $id = $request['id'];

        $payout = Payout::find($id);
        $payout->payout_status = 'approved';
        $payout->update();

        alert()->success('Payout approved successfully.', 'Success')->persistent('Close');;
        return redirect()->back();
    }

    public function payBuyer(Request $request)
    {
        $id = $request['id'];
        $geoip = new GeoIPLocation();
        $ip = $geoip->getIP();
        $set_ip = $geoip->setIP($ip);
        $currency = $geoip->getCurrencyCode();
        $currencySym = $geoip->getCurrencySymbol();
        $defaultCurrency = env('DEFAULT_CURRENCY');

        //todo 1, update mergings, 2, create transaction, 3. transfer funds

        $dispute = Dispute::find($id);
        //--------------------CURRENT TIME--------------------------------
        $current_time = \Carbon\Carbon::now()->toDateTimeString();

        //update mergings
        $merging_id = $dispute['merging_id'];
        $merging_data = Merging::find($merging_id);
        $buyer_user_id = $merging_data->buyer_user_id;
        $seller_user_id = $merging_data->seller_user_id;
        $selling_amount = $merging_data->seller_amount;

        $seller = Seller::where('merging_id', $merging_id)->first();



        $selling_id = $merging_data->seller_id;
        $buying_id = $merging_data->buyer_id;

        $selling_amount_btc = $seller->selling_amount;

        $seller_details = User::find($seller_user_id);
        $seller_btc_address = $seller_details['btc_address'];
        $balance_btc = $seller_details->btc_wallet;
        $wallet_balance =  $balance_btc;

        // $seller_labels = env('APP_NAME').'-User-'.$seller_username;
        // $balance = LaraBlockIo::getAddressesBalanceByLabels($seller_labels);
        // $seller_wallet_balance = $balance->data->available_balance;

        //TRANSFER THE TO THE BUYER
        if($balance_btc >= $selling_amount_btc){
            $buyer = User::find($buyer_user_id);
            $buyer_old_wallet_balance = $buyer->btc_wallet;
            $buyer_balance = $buyer_old_wallet_balance + $selling_amount_btc;
            $buyer->btc_wallet = $buyer_balance;
            $buyer->save();

            $seller = User::find($seller_user_id);
            $seller_old_wallet_balance = $seller->btc_wallet;
            $seller_balance = $seller_old_wallet_balance - $selling_amount_btc;
            $seller->btc_wallet = $seller_balance;
            $seller->save();

            // LaraBlockIo::withdrawFromAddressesToAddresses($selling_amount_btc, $seller_btc_address, $buyer_btc_address, $nonce = null);

            $transaction_label = env('APP_NAME').'-transaction-'.$buyer_username.'-'.$buying_id.'-'.$seller_username.'-'.$selling_id;

            $newTransaction = ([
                'merging_id' => $merging_id,
                'buyer_user_id' => $merging->buyer_user_id,
                'seller_user_id' => $merging->seller_user_id,
                'transaction_label' => env('APP_NAME').'-transaction-'.$buyer_username.'-'.$seller_username.'-'.time(),
                'transaction_status' => 'Completed',
                'verified_at' => $current_time,
            ]);

            $transaction = Transaction::create($newTransaction);

            $merging->pay_received_status = 'Received';
            $merging->update();

            $dispute->dispute_status = 'resolved';
            $dispute->resolved_at = $current_time;
            $dispute->update();

        //Seller Email BuyerPaymentMail
        //Mail::to($seller_email)->send(new BuyerPaymentMail($seller_email, $seller_username, sprintf('%06d', $merging_id)));
            alert()->success('You have confirm payment made by buyer, buyer will be credited and you will be deducted', 'Good Job')->persistent('Close');
            return redirect()->back();
        }else{
        //Seller Email BuyerPaymentMail
        //Mail::to($seller_email)->send(new BuyerPaymentMail($seller_email, $seller_username, sprintf('%06d', $merging_id)));
            alert()->error('Seller topup to proceed with your transaction, and we advice you explain the delay to the buyer', 'Insufficient funds')->persistent('Close');
            return redirect()->back();
        }
    }

    public function paySeller(Request $request)
    {
        $id = $request['id'];

        //todo 1, update mergings, 2, create transaction, 3. transfer funds

        $dispute = Dispute::find($id);
        //--------------------CURRENT TIME--------------------------------
        $current_time = \Carbon\Carbon::now()->toDateTimeString();
        //update mergings
        $merging_id = $dispute['merging_id'];
        $merging_data = Merging::find($merging_id);
        $selling_id = $merging_data->seller_id;
        $buying_id = $merging_data->buyer_id;

        $buyer_user_id = $merging_data->buyer_user_id;
        $buyer_username = $merging_data->buyer_username;
        $buyer_email = $merging_data->buyer_email;
        $seller_username = $merging_data->seller_username;
        $seller_user_id = $merging_data->seller_user_id;
        $seller_email = $merging_data->seller_email;
        $seller_consent = $merging_data->seller_consent;
        $seller_payment_mode = $merging_data->seller_payment_mode;
        $selling_amount = $merging_data->seller_amount;

        $sellers = Seller::find($selling_id);
        $sellers->buyer_id = NULL;
        $sellers->buyer_user_id = NULL;
        $sellers->merge_at = NULL;
        $sellers->merge_status = 'pending';
        $sellers->update();

        $deletebuyer = Buyer::where('id', '=', $buying_id)->delete();
        $deletemerging = Merging::where('id', '=', $merging_id)->delete();

        $dispute->dispute_status = 'resolved';
        $dispute->resolved_at = $current_time;
        $dispute->update();

        $buyer = User::find($seller_user_id);
        $buyer->status = 'blocked';
        $buyer->update();

        if($deletemerging){
            //Seller Email BuyerRejectMail
            //Mail::to($buyer_email)->send(new BuyerRejectMail($buyer_email, $buyer_username, sprintf('%06d', $merging_id)));

            alert()->success('You have reverse the transaction and buyer have been blocked.', 'Oops')->persistent('Close');
            return redirect()->back();
        }
    }

}

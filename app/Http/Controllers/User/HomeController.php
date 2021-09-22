<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Coinremitter\Coinremitter;
use Blockavel\LaraBlockIo\LaraBlockIoFacade;
use Victorybiz\GeoIPLocation\GeoIPLocation;

use App\Models\User;
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
use App\Models\PaymentMethod as Payment;

use App\Mail\BuyerNotificationMail;
use App\Mail\SellerNotificationMail;
use App\Mail\BuyerAgreementMail;
use App\Mail\BuyerRejectMail;
use App\Mail\BuyerPaymentMail;
use App\Mail\PingMail;
use App\Mail\BuyerApproveMail;
use App\Mail\SellerApproveMail;
use App\Mail\BuyerDisputeMail;
use App\Mail\SellerDisputeMail;
use App\Mail\Notification;
use App\Mail\PendingUserMail;

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
        $this->middleware(['auth:user']); //, '2fa'
    }

     /**
     * Enable 2FA
     */
    public function authenticate2fa(Request $request){
        $user = Auth::guard('user')->user();
        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());

        $secret = $request->input('one_time_password');
        $valid = $google2fa->verifyKey($user->loginSecurity->google2fa_secret, $secret);

		 //packages
        $geoip = new GeoIPLocation();
        $ip = $geoip->getIP();
        $set_ip = $geoip->setIP($ip);
        $currency = $geoip->getCurrencyCode();
        $currencySym = $geoip->getCurrencySymbol();
        $defaultCurrency = env('DEFAULT_CURRENCY');



        //user's Data
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $transactions = Transaction::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->get();
        $deposits = Deposit::where('user_id', $user_id)->where('status', 'Success')->get();
        $balance_usd = $user->usd_wallet;
        $wallet_balance = $this->getCurrencyBalance($currency, $balance_usd);


        $dispute = Dispute::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->where('dispute_status', '=', NULL)->get();


        $dispute_count = count($dispute);
        if($dispute_count > 0) {
            alert()->error('You have an unresolved dispute, kindy resolve the dispute to continue transactions.', 'Pending Dispute')->persistent('Close');
			return redirect()->back();
        }


        if($valid){
            alert()->success('Login Successful', 'Good!!!')->persistent('Close');
            return view('user.home',[
				'payment_methods'=> Payment::all(),
				'wallet_balance' => $wallet_balance,
				'currencySym' => $currencySym,
				'transactions' => $transactions,
				'currency' => $currency
			]);
        }else{
            alert()->error('Invalid verification Code, Please try again.', 'Opps!!!')->persistent('Close');
			return redirect()->back();
        }
    }

    public function index(){
        // if(empty(Auth::guard('user')->user()->loginSecurity)){
        //     return redirect('/2fa');
        // }

        // if(empty(Auth::guard('user')->user()->email_verified_at)){
        //     return view('/user/auth/verify', [
        //        'email' => Auth::guard('user')->user()->email,
        //    ]);
        // }

        // if(Auth::guard('user')->user()->status == 'blocked'){
        //     return view('/user/auth/blocked', [
        //        'email' => Auth::guard('user')->user()->email,
        //    ]);
        // }

        // if(empty(Auth::guard('user')->user()->status)){
        //     return view('/user/kyc');
        // }

        // if(Auth::guard('user')->user()->status == 'pending'){
        //     return view('/user/pending');
        // }

        //packages
        $geoip = new GeoIPLocation();
        $ip = $geoip->getIP();
        $set_ip = $geoip->setIP($ip);
        $currency = $geoip->getCurrencyCode();
        $currencySym = $geoip->getCurrencySymbol();
        $defaultCurrency = env('DEFAULT_CURRENCY');



        //user's Data
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $transactions = Transaction::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->get();
        $deposits = Deposit::where('user_id', $user_id)->where('status', 'Success')->get();
        $balance_usd = $user->usd_wallet;
        $wallet_balance = $this->getCurrencyBalance($currency, $balance_usd);


        $dispute = Dispute::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->where('dispute_status', '=', NULL)->get();


        $dispute_count = count($dispute);
        if($dispute_count > 0) {
            alert()->error('You have an unresolved dispute, kindy resolve the dispute to continue transactions.', 'Pending Dispute')->persistent('Close');
        }


        log::info($wallet_balance);


        return view('user.home',[
            'payment_methods'=> Payment::all(),
            'wallet_balance' => $wallet_balance,
            'currencySym' => $currencySym,
            'transactions' => $transactions,
            'currency' => $currency
        ]);
    }

    public function sales()
    {
        // if(Auth::guard('user')->user()->status == 'blocked'){
        //     return view('/user/auth/blocked', [
        //        'email' => Auth::guard('user')->user()->email,
        //    ]);
        // }

        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $username = $user->username;

        $geoip = new GeoIPLocation();
        $ip = $geoip->getIP();
        $set_ip = $geoip->setIP($ip);
        $currency = $geoip->getCurrencyCode();
        $currencySym = $geoip->getCurrencySymbol();
        $defaultCurrency = env('DEFAULT_CURRENCY');
        $balance_usd = $user->usd_wallet;
        $wallet_balance = $this->getCurrencyBalance($currency, $balance_usd);


        $sellers = Seller::where([
            ['merge_status', '=', 'pending'],
            ['seller_user_id', '!=', $user_id],
            ['currency', '=', $currency]
        ])->inRandomOrder()->take(20)->get();


        return view('user.sales', [
            'payment_methods'=> Payment::all(),
            'wallet_balance' => $wallet_balance,
            'currency' => $currency,
            'sellers' => $sellers
        ]);

    }

    //search Markets
    public function search_market(Request $request)
    {
        if(Auth::guard('user')->user()->status == 'blocked'){
            return view('/user/auth/blocked', [
               'email' => Auth::guard('user')->user()->email,
           ]);
        }

        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $username = $user->username;

        $geoip = new GeoIPLocation();
        $ip = $geoip->getIP();
        $set_ip = $geoip->setIP($ip);
        $currency = $geoip->getCurrencyCode();
        $currencySym = $geoip->getCurrencySymbol();
        $defaultCurrency = env('DEFAULT_CURRENCY');
        $balance_usd = $user->usd_wallet;
        $wallet_balance = $this->getCurrencyBalance($currency, $balance_usd);

        //usd equivalent of amount
        $usd_amount = intval($this->getCurrencyUSD($currency, $request->usd_amount));

        $sellers = Seller::where([
            ['merge_status', '=', 'pending'],
            ['selling_amount', '=', $usd_amount],
            ['seller_user_id', '!=', $user_id],
        ])->inRandomOrder()->take(20)->get();

        $seller_count = count($sellers);

        alert()->success('Kindly pick from these sellers and transacts. Cheers', 'Success')->persistent('Close');
        return view('user.search_market', [
            'payment_methods'=> Payment::all(),
            'wallet_balance' => $wallet_balance,
            'sellers' => $sellers,
            'seller_count' => $seller_count
        ]);
    }


    public function profile()
    {
        if(Auth::guard('user')->user()->status == 'blocked'){
            return view('/user/auth/blocked', [
               'email' => Auth::guard('user')->user()->email,
           ]);
        }

        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $username = $user->username;

        $geoip = new GeoIPLocation();
        $ip = $geoip->getIP();
        $set_ip = $geoip->setIP($ip);
        $currency = $geoip->getCurrencyCode();
        $currencySym = $geoip->getCurrencySymbol();
        $defaultCurrency = env('DEFAULT_CURRENCY');
        $balance_usd = $user->usd_wallet;
        $wallet_balance = $this->getCurrencyBalance($currency, $balance_usd);

        $transactions = Transaction::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->get();
        $payouts = Payout::where('user_id', $user_id)->get();

        $dispute = Dispute::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->where('dispute_status', '=', NULL)->get();


        $dispute_count = count($dispute);
        if($dispute_count > 0) {
            alert()->error('You have an unresolved dispute, kindy resolve the dispute to continue transactions.', 'Pending Dispute')->persistent('Close');
        }

        return view('user.profile', [
            'payment_methods'=> Payment::all(),
            'wallet_balance' => $wallet_balance,
            'transactions' => $transactions,
            'payouts' => $payouts,
            'currency' => $currency
        ]);
    }

    public function uploadKYC(Request $request)
    {
        $this->validate($request, [
            'front' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'back' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048'
        ]);

        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $username = $user->username;

        $front = $username.'-front'.'.'.$request->front->getClientOriginalExtension();
        $back = $username.'-back'.'.'.$request->back->getClientOriginalExtension();
        if(empty($front) && empty($back)){
            alert()->error('Kindly Upload the right image', 'Oops');
            return redirect()->back();
        }

        $request->front->move(public_path('uploads/image'), $front);
        $request->back->move(public_path('uploads/image'), $back);

        $user = User::find($user_id);
        $user->kycfront = $front;
        $user->kycback = $back;
        $user->status = 'pending';

        if($user->update()){

            Mail::to(env('ADMIN_EMAIL'))->send(new PendingUserMail($user->username));

            alert()->success('Kindly wait, Your document is been processed.', 'KYC Document Upload Successfully')->persistent('Close');
            return redirect()->back();
        }
    }

}

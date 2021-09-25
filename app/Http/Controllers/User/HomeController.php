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
        $balance_btc = $user->btc_wallet;
        $wallet_balance = $this->getCurrencyBalance($currency, $balance_btc);


        $genTrades = Seller::where([
            ['merge_status', '=', 'pending'],
            ['seller_user_id', '!=', $user_id],
            ['currency', '=', $currency]
        ])->inRandomOrder()->take(20)->get();


        $userTrades = Seller::where([
            ['merge_status', '=', 'pending'],
            ['seller_user_id', '=', $user_id],
            ['currency', '=', $currency]
        ])->inRandomOrder()->take(20)->get();


        return view('user.sales', [
            'payment_methods'=> Payment::all(),
            'wallet_balance' => $wallet_balance,
            'currency' => $currency,
            'genTrades' => $genTrades,
            'userTrades' => $userTrades
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

    public function createTrade(Request $request)
    {
        //User data
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $username = $user->username;
        $email = $user->email;

        $geoip = new GeoIPLocation();
        $ip = $geoip->getIP();
        $set_ip = $geoip->setIP($ip);
        $currency = $geoip->getCurrencyCode();
        $currencySym = $geoip->getCurrencySymbol();
        $defaultCurrency = env('DEFAULT_CURRENCY');
        $balance_btc = $user->btc_wallet;

        $this->validate($request, [
            'usd_amount' => 'required|min:1',
        ]);

        $dispute = Dispute::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->where('dispute_status', '=', NULL)->get();

        $dispute_count = count($dispute);
        if($dispute_count > 0) {
            alert()->error('You have an unresolved dispute, kindy resolve the dispute to continue transactions.', 'Pending Dispute')->persistent('Close');
        }

        //SUMMING UP PENDING ADS
        $seller_info = Seller::where('seller_user_id', $user_id)->where('merge_status', 'pending')->get();
        $usd_selling_amount = intval($this->toUsd($currency, $request->usd_amount));
        $btc_selling_amount = $this->getBtcBalance($usd_selling_amount);

        $hash = md5($username.$email.time());

        $selling_rate = $request->selling_rate;
        $btc_selling_balance = $seller_info->sum('selling_amount'); //selling amount will always be in btc
        //--------------------CURRENT TIME--------------------------------
        $current_time = \Carbon\Carbon::now()->toDateTimeString();
        //-------------------------SAVE RECORDS----------------------------

        if(($btc_selling_balance + $btc_selling_amount) <= $balance_btc){
            //create selling ADS
            $newSeller = ([
                'seller_user_id' => $user_id,
                'seller_username' => $username,
                'seller_email' => $email,
                'seller_payment_mode' => $request->seller_payment_mode,
                'selling_amount' => $btc_selling_amount,
                'merge_status' => 'pending',
                'selling_rate' => $selling_rate,
                'currency' => $currency,
                'trade_minutes' => $request->trade_minutes,
                'hash' => $hash,
                'trade_terms' => $request->trade_terms
            ]);

            Seller::create($newSeller);

        //------------------------------------------------------------------
            alert()->success('Your trade have been created successfully.', 'Success')->persistent('Close');
            return redirect()->back();
        }else{
        //------------------------------------------------------------------
            alert()->error('Summation of pending trade is greater than available balance in your wallet, consider deleting some trades.', 'Oops')->persistent('Close');
            return redirect()->back();
        }
    }

    public function getTrade($hash)
    {
        //User data
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $username = $user->username;
        $email = $user->email;

        $geoip = new GeoIPLocation();
        $ip = $geoip->getIP();
        $set_ip = $geoip->setIP($ip);
        $currency = $geoip->getCurrencyCode();
        $currencySym = $geoip->getCurrencySymbol();
        $defaultCurrency = env('DEFAULT_CURRENCY');
        $balance_btc = $user->btc_wallet;


        $trade = Seller::with(['seller', 'seller.reviewee'])->where('hash', $hash)->first();

        $genTrades = Seller::where([
            ['id', '=', $trade->id],
            ['merge_status', '=', 'pending'],
            ['seller_user_id', '!=', $user_id],
            ['currency', '=', $currency]
        ])->inRandomOrder()->take(20)->get();


        return view('user.trade', [
            'trade' => $trade,
            'currency' => $currency,
            'genTrades' => $genTrades
        ]);


    }

    public function joinTrade(Request $request)
    {
        $this->validate($request, [
            'selling_id' => 'required|min:1',
        ]);

        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $username = $user->username;
        $email = $user->email;
        $user_status = $user->status;

        $geoip = new GeoIPLocation();
        $ip = $geoip->getIP();
        $set_ip = $geoip->setIP($ip);
        $currency = $geoip->getCurrencyCode();
        $currencySym = $geoip->getCurrencySymbol();
        $defaultCurrency = env('DEFAULT_CURRENCY');
        $balance_btc = $user->btc_wallet;
        $wallet_balance = $this->getCurrencyBalance($currency, $balance_btc);

        $selling_id = $request->selling_id;
        //--------------------CURRENT TIME--------------------------------
        $current_time = \Carbon\Carbon::now()->toDateTimeString();

        //user_status approved means kyc document have been uploaded and approved by admin
        // if($user_status != 'approved'){
        //     alert()->error('Kindly go to your profile and upload KYC document for approval', 'Oops')->persistent('Close');
        //     return redirect()->back();
        // }

        //RETRIEVING SELLING INFORMATION
        $seller_info = Seller::where('id', $selling_id)->where('merge_status', 'pending')->first();

        $selling_user_id = $seller_info->seller_user_id;
        if($selling_user_id == $user_id){
            alert()->error('You cant purchases your own selling ads', 'Oops')->persistent('Close');
            return redirect()->back();
        }

        $dispute = Dispute::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->where('dispute_status', '=', NULL)->get();

        $dispute_count = count($dispute);
        if($dispute_count > 0) {
            alert()->error('You have an unresolved dispute, kindy resolve the dispute to continue transactions.', 'Pending Dispute')->persistent('Close');
        }

        if(empty($seller_info)){
            alert()->error('Offer is already off the market', 'Oops')->persistent('Close');
            return redirect()->back();
        }

            //INSERTING BUYER INFORMATION
            $newbuyer = ([
                'buyer_user_id' => $user_id,
            ]);

            Buyer::create($newbuyer);

            //RETRIEVING buyer_info RECORDS
            $buyer_info =  Buyer::where('buyer_user_id', $user_id)->where('seller_id', '=', NULL)->first();
            $buying_id = $buyer_info->id;
            $buyer_user_id = $buyer_info->buyer_user_id;
            $buyer_username = $buyer_info->buyer_username;
            $buyer_email = $buyer_info->buyer_email;


            $seller_username = $seller_info->seller_username;
            $seller_user_id = $seller_info->seller_user_id;
            $seller_email = $seller_info->seller_email;
            $seller_payment_mode = $seller_info->seller_payment_mode;
            $selling_amount = $seller_info->selling_amount;
            $selling_rate = $seller_info->selling_rate;
            $selling_currency = $seller_info->currency;
            $selling_trade_minutes = $seller_info->trade_minutes;


            $newmerging = ([
                'buyer_id' => $buying_id,
                'buyer_user_id' => $buyer_user_id,
                'seller_id' => $selling_id,
                'seller_user_id' => $seller_user_id,
                'merge_at' => $current_time,

            ]);

            $merging_id = Merging::create($newmerging)->id;

            //UPDATE BUYER TABLE
            $updatebuyer = Buyer::find($buying_id);
            $updatebuyer->seller_id = $selling_id;
            $updatebuyer->seller_user_id = $seller_user_id;
            $updatebuyer->merge_status = 'merged';
            $updatebuyer->merge_at = $current_time;
            $updatebuyer->update();


            //UPDATE SELLER TABLE
            $updateseller = Seller::find($selling_id);
            $updateseller->buyer_id = $buying_id;
            $updateseller->buyer_user_id = $buyer_user_id;
            $updateseller->merge_status = 'merged';
            $updateseller->merge_at = $current_time;
            $updateseller->merging_id = $merging_id;
            $updateseller->update();

            // //Seller Email SellerNotificationMail
            // Mail::to($seller_email)->send(new SellerNotificationMail($seller_username, $seller_email, $selling_amount, $selling_rate, $buyer_username, $buyer_email, $currency));

            // //Seller Email BuyerNotificationMail
            // Mail::to($buyer_email)->send(new BuyerNotificationMail($seller_username, $seller_email, $selling_amount, $selling_rate, $buyer_username, $buyer_email, $currency));

            alert()->success('Your interest have been made known to the seller', 'Order Successfully Placed')->persistent('Close');
            return redirect()->back();


    }

    public function chatRoom($id)
    {
        //User data
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $username = $user->username;
        $email = $user->email;

        $geoip = new GeoIPLocation();
        $ip = $geoip->getIP();
        $set_ip = $geoip->setIP($ip);
        $currency = $geoip->getCurrencyCode();
        $currencySym = $geoip->getCurrencySymbol();
        $defaultCurrency = env('DEFAULT_CURRENCY');
        $balance_btc = $user->btc_wallet;

        if(!$merging = Merging::with(['associated_buyer', 'associated_seller'])->where('id', $id)->first()){
            alert()->error('Invalid Order', 'Oops')->persistent('Close');
            return redirect()->back();
        }

        log::info($merging);

        $chats = Conversation::with(['user', 'merging'])->where('merging_id', $id)->orderBy('created_at', 'ASC')->get();

        return view('user.chatroom', [
            'chats' => $chats,
            'merging' => $merging
        ]);
    }

    public function sendMessage(Request $request)
    {
        $newconversation = ([
            'merging_id' => $request->merging_id,
            'sender_user_id' => $request->sender_user_id,
            'message' => $request->message
        ]);

        $conversation = Conversation::create($newconversation);
        alert()->success('Message sent', 'Success');
        return redirect()->back();
    }

}

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
use App\Mail\VerifyEmail;
use App\Mail\SupportAdmin;
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
        // $this->middleware(['auth:user', '2fa']);
    }

    public function contact()
    {
        if(Auth::guard('user')->user()->status == 'blocked'){
            alert()->error('Your account have been blocked, Kindly send a mail to support', 'Account Blocked')->persistent('Close');
        }
        return view('/user/contact');
    }

    public function helpCenter()
    {
        return view('/user/help-center');
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
           $this->index();
        }else{
            alert()->error('Invalid verification Code, Please try again.', 'Opps!!!')->persistent('Close');
			return redirect()->back();
        }
    }

    public function index(){
        // if(empty(Auth::guard('user')->user()->loginSecurity)){
        //     return redirect('/2fa');
        // }

        if(empty(Auth::guard('user')->user()->email_verified_at)){
            return view('/user/auth/verify', [
               'email' => Auth::guard('user')->user()->email,
           ]);
        }

        if(Auth::guard('user')->user()->status == NULL || Auth::guard('user')->user()->status == 'pending'){
            return $this->profile();
        }

        if(Auth::guard('user')->user()->status == 'blocked'){
            return $this->contact();
        }

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
        $balance_btc = $user->btc_wallet;
        $wallet_balance = $balance_btc;


        $dispute = Dispute::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->where('dispute_status', '=', NULL)->get();

        $userTrades = Seller::where([
            ['merge_status', '=', 'pending'],
            ['seller_user_id', '=', $user_id],
            ['currency', '=', $currency]
        ])->inRandomOrder()->get();

        $ongoingTrades = Seller::with('merging')->where([
            ['merge_status', '=', 'merged'],
            ['currency', '=', $currency]
        ])->where('seller_user_id', $user_id)->orWhere('buyer_user_id', $user_id)->get();

        $reviews = Review::with('reviewer')->where('reviewee_user_id', $user_id)->get();
        $payouts = Payout::where('user_id', $user_id)->get();

        $dispute_count = count($dispute);
        if($dispute_count > 0) {
            alert()->error('You have an unresolved dispute, kindy resolve the dispute to continue transactions.', 'Pending Dispute')->persistent('Close');
        }



        return view('user.home',[
            'payment_methods'=> Payment::all(),
            'wallet_balance' => $wallet_balance,
            'currencySym' => $currencySym,
            'transactions' => $transactions,
            'currency' => $currency,
            'deposits' => $deposits,
            'reviews' => $reviews,
            'userTrades' => $userTrades,
            'ongoingTrades' => $ongoingTrades,
            'payouts' => $payouts,
        ]);
    }

    public function sales()
    {
        if(empty(Auth::guard('user')->user()->email_verified_at)){
            return view('/user/auth/verify', [
               'email' => Auth::guard('user')->user()->email,
           ]);
        }

        if(Auth::guard('user')->user()->status == NULL || Auth::guard('user')->user()->status == 'pending'){
            return $this->profile();
        }

        if(Auth::guard('user')->user()->status == 'blocked'){
            return $this->contact();
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
        $balance_btc = $user->btc_wallet;
        $wallet_balance = $balance_btc;


        $genTrades = Seller::where([
            ['merge_status', '=', 'pending'],
            ['seller_user_id', '!=', $user_id],
            ['currency', '=', $currency]
        ])->inRandomOrder()->take(20)->get();


        $userTrades = Seller::where([
            ['merge_status', '=', 'pending'],
            ['seller_user_id', '=', $user_id],
            ['currency', '=', $currency]
        ])->inRandomOrder()->get();

        $mergings  = Merging::where('seller_user_id', $user_id)->orWhere('buyer_user_id', $user_id)->get();
        $doneTradesId = $mergings->where('pay_received_status', 'Received')->pluck('id')->toArray();
        $userDoneTrades = Seller::whereIn('merging_id', $doneTradesId)->get();


        $ongoingTrades = Seller::with('merging')->where([
            ['merge_status', '=', 'merged'],
            ['currency', '=', $currency]
        ])->where('seller_user_id', $user_id)->orWhere('buyer_user_id', $user_id)->get();

        $reviews = Review::where('reviewee_user_id', $user_id)->get();


        return view('user.sales', [
            'payment_methods'=> Payment::all(),
            'wallet_balance' => $wallet_balance,
            'currency' => $currency,
            'genTrades' => $genTrades,
            'userTrades' => $userTrades,
            'ongoingTrades' => $ongoingTrades,
            'reviews' => $reviews,
            'userDoneTrades' => $userDoneTrades,
            'mergings' => $mergings
        ]);

    }

    //search Markets
    public function searchTrade(Request $request)
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
        $balance_btc = $user->_wabtcllet;
        $wallet_balance = $balance_btc;

        //usd equivalent of amount
        $usd_amount = intval($this->toUsd($currency, $request->usd_amount));
        $btc_amount = $this->getBtcBalance($usd_amount);

        $genTrades = Seller::where([
            ['merge_status', '=', 'pending'],
            ['selling_amount', '>=', $btc_amount],
            ['seller_user_id', '!=', $user_id],
        ])->get();
        $mergings  = Merging::where('seller_user_id', $user_id)->orWhere('buyer_user_id', $user_id)->get();
        $doneTradesId = $mergings->where('pay_received_status', 'Received')->pluck('id')->toArray();
        $userDoneTrades = Seller::whereIn('merging_id', $doneTradesId)->get();
        $reviews = Review::where('reviewee_user_id', $user_id)->get();

        alert()->success('Kindly pick from these sellers and transacts. Cheers', 'Success')->persistent('Close');
        return view('user.search_market', [
            'payment_methods'=> Payment::all(),
            'wallet_balance' => $wallet_balance,
            'genTrades' => $genTrades,
            'currency' => $currency,
            'userDoneTrades' => $userDoneTrades,
            'reviews' => $reviews
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
        $balance_btc = $user->btc_wallet;
        $wallet_balance = $balance_btc;

        $transactions = Transaction::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->get();
        $payouts = Payout::where('user_id', $user_id)->get();
        $reviews = Review::where('reviewee_user_id', $user_id)->get();
        $trades = Seller::with(['seller', 'seller.reviewee', 'buyer.reviewee'])->where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->get();

        $dispute = Dispute::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->where('dispute_status', '=', NULL)->get();


        $dispute_count = count($dispute);
        if($dispute_count > 0) {
            alert()->error('You have an unresolved dispute, kindy resolve the dispute to continue transactions.', 'Pending Dispute')->persistent('Close');
        }

        if(empty(Auth::guard('user')->user()->status)){
            alert()->error('Kindly upload your documents for verification', 'KYC Document')->persistent('Close');
        }

        return view('user.profile', [
            'payment_methods'=> Payment::all(),
            'wallet_balance' => $wallet_balance,
            'transactions' => $transactions,
            'payouts' => $payouts,
            'currency' => $currency,
            'reviews' => $reviews,
            'trades' => $trades
        ]);
    }

    public function records()
    {
        if(empty(Auth::guard('user')->user()->email_verified_at)){
            return view('/user/auth/verify', [
               'email' => Auth::guard('user')->user()->email,
           ]);
        }

        if(Auth::guard('user')->user()->status == NULL || Auth::guard('user')->user()->status == 'pending'){
            return $this->profile();
        }

        if(Auth::guard('user')->user()->status == 'blocked'){
            return $this->contact();
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
        $balance_btc = $user->btc_wallet;
        $wallet_balance = $balance_btc;

        $transactions = Transaction::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->get();
        $payouts = Payout::where('user_id', $user_id)->get();

        $dispute = Dispute::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->where('dispute_status', '=', NULL)->get();


        $dispute_count = count($dispute);
        if($dispute_count > 0) {
            alert()->error('You have an unresolved dispute, kindy resolve the dispute to continue transactions.', 'Pending Dispute')->persistent('Close');
        }

        return view('user.records', [
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

            //Mail::to(env('ADMIN_EMAIL'))->send(new PendingUserMail($user->username));

            alert()->success('Kindly wait, Your document is been processed.', 'KYC Document Upload Successfully')->persistent('Close');
            return redirect()->back();
        }
    }

    public function createTrade(Request $request)
    {
        if(empty(Auth::guard('user')->user()->email_verified_at)){
            return view('/user/auth/verify', [
               'email' => Auth::guard('user')->user()->email,
           ]);
        }

        if(Auth::guard('user')->user()->status == NULL || Auth::guard('user')->user()->status == 'pending'){
            return $this->profile();
        }

        if(Auth::guard('user')->user()->status == 'blocked'){
            return $this->contact();
        }

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


        $trade = Seller::with(['seller', 'seller.reviewee', 'buyer.reviewee'])->where('hash', $hash)->first();

        if(!$merging = Merging::with(['buyer', 'seller', 'associated_buyer', 'associated_seller'])->where('id', $trade->merging_id)->first()){
            alert()->error('Invalid Trade', 'Oops')->persistent('Close');
            return $this->sales();
        }
        $reviews = Review::where('merging_id', $trade->merging_id)->get();

        $genTrades = Seller::where([
            ['id', '=', $trade->id],
            ['merge_status', '=', 'pending'],
            ['seller_user_id', '!=', $user_id],
            ['currency', '=', $currency]
        ])->inRandomOrder()->take(20)->get();


        return view('user.trade', [
            'trade' => $trade,
            'currency' => $currency,
            'genTrades' => $genTrades,
            'order' => $merging,
            'reviews' => $reviews
        ]);


    }

    public function joinTrade(Request $request)
    {
        $this->validate($request, [
            'selling_id' => 'required|min:1',
        ]);

        if(empty(Auth::guard('user')->user()->email_verified_at)){
            return view('/user/auth/verify', [
               'email' => Auth::guard('user')->user()->email,
           ]);
        }

        if(Auth::guard('user')->user()->status == NULL || Auth::guard('user')->user()->status == 'pending'){
            return $this->profile();
        }

        if(Auth::guard('user')->user()->status == 'blocked'){
            return $this->contact();
        }

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
        $wallet_balance = $balance_btc;

        $selling_id = $request->selling_id;
        //--------------------CURRENT TIME--------------------------------
        $current_time = \Carbon\Carbon::now()->toDateTimeString();

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
            alert()->error('Invalid Trade', 'Oops')->persistent('Close');
            return $this->sales();
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

    public function deal(Request $request){
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
        $wallet_balance = $balance_btc;

        $merging_id = $request->merging_id;
        if(!$merging = Merging::with(['buyer', 'seller', 'associated_buyer', 'associated_seller'])->where('id', $merging_id)->first()){
            alert()->error('Invalid Trade', 'Oops')->persistent('Close');
            return $this->sales();
        }
        $buyer_username = $merging->associated_buyer->username;
        $seller_username = $merging->associated_seller->username;
        $buyer_email = $merging->associated_buyer->email;
        $seller_email = $merging->associated_seller->email;

        $dispute = Dispute::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->where('dispute_status', '=', NULL)->get();

        $dispute_count = count($dispute);
        if($dispute_count > 0) {
            alert()->error('You have an unresolved dispute, kindy resolve the dispute to continue transactions.', 'Pending Dispute')->persistent('Close');
        }

        $merging->seller_consent = 'Deal'; //update(['seller_consent' => 'Deal']);

        if($merging->update()){
            //Seller Email BuyerAgreementMail
            // Mail::to($buyer_email)->send(new BuyerAgreementMail($buyer_email, $buyer_username, $seller_username, sprintf('%06d', $merging_id)));

            alert()->success('You have agreed to have a trade with the buyer.', 'Nice Job')->persistent('Close');
            return redirect()->back();
        }
    }

    public function cancelTrade(Request $request){
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
        $wallet_balance = $balance_btc;

        $merging_id = $request->merging_id;
        if(!$merging = Merging::with(['buyer', 'seller', 'associated_buyer', 'associated_seller'])->where('id', $merging_id)->first()){
            alert()->error('Invalid Trade', 'Oops')->persistent('Close');
            return $this->sales();
        }
        $buyer_username = $merging->associated_buyer->username;
        $seller_username = $merging->associated_seller->username;
        $buyer_email = $merging->associated_buyer->email;
        $seller_email = $merging->associated_seller->email;

        $buying_id = $merging->buyer_id;
        $selling_id = $merging->seller_id;

        $sellers = Seller::find($selling_id);
        $sellers->merging_id = null;
        $sellers->buyer_id = NULL;
        $sellers->buyer_user_id = NULL;
        $sellers->merge_at = NULL;
        $sellers->merge_status = 'pending';
        $sellers->update();

        $deletebuyer = Buyer::where('id', '=', $buying_id)->delete();
        $deletemerging = Merging::where('id', '=', $merging_id)->delete();

        if($deletemerging){
            //Seller Email BuyerRejectMail
            // /Mail::to($buyer_email)->send(new BuyerRejectMail($buyer_email, $buyer_username, $seller_username, sprintf('%06d', $merging_id)));

            alert()->success('You have refused to have a transaction with the buyer.', 'Oops')->persistent('Close');
            return redirect()->back();
        }
    }

    public function acceptPayment(Request $request){
        $user = Auth::guard('user')->user();
        $user_id = $user->id;
        $username = $user->username;
        $email = $user->email;

        //--------------------CURRENT TIME--------------------------------
        $current_time = \Carbon\Carbon::now()->toDateTimeString();

        $geoip = new GeoIPLocation();
        $ip = $geoip->getIP();
        $set_ip = $geoip->setIP($ip);
        $currency = $geoip->getCurrencyCode();
        $currencySym = $geoip->getCurrencySymbol();
        $defaultCurrency = env('DEFAULT_CURRENCY');
        $balance_btc = $user->btc_wallet;
        $wallet_balance = $balance_btc;

        $merging_id = $request->merging_id;
        if(!$merging = Merging::with(['buyer', 'seller', 'associated_buyer', 'associated_seller'])->where('id', $merging_id)->first()){
            alert()->error('Invalid Trade', 'Oops')->persistent('Close');
            return $this->sales();
        }
        $buyer_username = $merging->associated_buyer->username;
        $seller_username = $merging->associated_seller->username;
        $buyer_email = $merging->associated_buyer->email;
        $seller_email = $merging->associated_seller->email;

        $buying_id = $merging->buyer_id;
        $order = Seller::where('merging_id', $merging_id)->first();

        $newTransaction = ([
            'merging_id' => $merging_id,
            'buyer_user_id' => $merging->buyer_user_id,
            'seller_user_id' => $merging->seller_user_id,
            'transaction_label' => env('APP_NAME').'-transaction-'.$buyer_username.'-'.$seller_username.'-'.time(),
            'transaction_status' => 'Completed',
            'verified_at' => $current_time,
        ]);

        if($wallet_balance < $order->selling_amount){
            alert()->error('Kindly topup to proceed with your transaction, and we advice you explain the delay to your buyer', 'Insufficient funds')->persistent('Close');
            return redirect()->back();
        }

        $transaction = Transaction::create($newTransaction);


        if($transaction){
            $buyer = User::find($merging->buyer_user_id);
            $buyer_old_wallet_balance = $buyer->btc_wallet;
            $buyer_balance = $buyer_old_wallet_balance + $order->selling_amount;
            $buyer->btc_wallet = $buyer_balance;
            $buyer->save();

            $seller = User::find($merging->seller_user_id);
            $seller_old_wallet_balance = $seller->btc_wallet;
            $seller_balance = $seller_old_wallet_balance - $order->selling_amount;
            $seller->btc_wallet = $seller_balance;
            $seller->save();

            $merging->pay_received_status = 'Received';
            $merging->update();

            // //Buyer Email BuyerApproveMail
            // Mail::to($buyer_email)->send(new BuyerApproveMail($buyer_email, $seller_username, $buyer_username, sprintf('%06d', $merging_id)));
            // //Seller Email SellerApproveMail
            // Mail::to($seller_email)->send(new SellerApproveMail($seller_email, $buyer_username, $seller_username, sprintf('%06d', $merging_id)));

            alert()->success('You have confirm payment made by buyer, buyer will be credited and you will be deducted', 'Good Job')->persistent('Close');
            return redirect()->back();
        }
    }

    public function raisedispute(Request $request)
    {
        $merging_id = $reques->merging_id;
        $dispute_reason = $request->dispute_reason;

        $merging_id = $request->merging_id;
        if(!$merging = Merging::with(['buyer', 'seller', 'associated_buyer', 'associated_seller'])->where('id', $merging_id)->first()){
            alert()->error('Invalid Trade', 'Oops')->persistent('Close');
            return $this->sales();
        }
        $buyer_username = $merging->associated_buyer->username;
        $seller_username = $merging->associated_seller->username;
        $buyer_email = $merging->associated_buyer->email;
        $seller_email = $merging->associated_seller->email;
        $buying_id = $merging->buyer_id;
        $order = Seller::where('merging_id', $merging_id)->first();

        $newdispute = ([
            'merging_id' => $merging_id,
            'buyer_id' => $buyer_id,
            'buyer_user_id' => $buyer_user_id,
            'seller_id' => $seller_id,
            'seller_user_id' => $seller_user_id,
            'dispute_reason' => $dispute_reason,
        ]);

        $order_count = Dispute::where('merging_id', $merging_id)->count();

        if($order_count >= 1){
            alert()->error('A dispute have been raised on this order, our dispute manager will contact you to resolve this amicably', 'Success')->persistent('Close');;
            return redirect()->back();
        }

        $dispute = Dispute::create($newdispute);

        // //Buyer Email BuyerDisputeMail
        // Mail::to($seller_email)->send(new BuyerDisputeMail($buyer_email, $buyer_username, $dispute_reason, sprintf('%06d', $merging_id)));
        // //Seller Email SellerDisputeMail
        // Mail::to($seller_email)->send(new SellerDisputeMail($seller_email, $seller_username, $dispute_reason, sprintf('%06d', $merging_id)));

        alert()->success('Dispute created successfully, our dispute manager will contact you to resolve the dispute', 'Success')->persistent('Close');;
        return redirect()->back();
    }

    public function confirmPayment(Request $request){
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
        $wallet_balance = $balance_btc;

        $merging_id = $request->merging_id;
        if(!$merging = Merging::with(['buyer', 'seller', 'associated_buyer', 'associated_seller'])->where('id', $merging_id)->first()){
            alert()->error('Invalid Trade', 'Oops')->persistent('Close');
            return $this->sales();
        }
        $buyer_username = $merging->associated_buyer->username;
        $seller_username = $merging->associated_seller->username;
        $buyer_email = $merging->associated_buyer->email;
        $seller_email = $merging->associated_seller->email;

        $dispute = Dispute::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->where('dispute_status', '=', NULL)->get();

        $dispute_count = count($dispute);
        if($dispute_count > 0) {
            alert()->error('You have an unresolved dispute, kindy resolve the dispute to continue transactions.', 'Pending Dispute')->persistent('Close');
        }

        DB::table('mergings')->where('id', '=', $merging_id)->update(['payment_status' => 'Paid']);

        //Buyer Email BuyerPaymentMail
        //Mail::to($seller_email)->send(new BuyerPaymentMail($seller_email, $buyer_username, $seller_username, sprintf('%06d', $merging_id)));
        alert()->success('You have confirm payment made by you. Kindly wait for seller to acknowledge you payment.', 'Yeah')->persistent('Close');
        return redirect()->back();

    }

    public function createReview(Request $request)
    {
        $user_id = Auth::guard('user')->user()->id;
        $newreview = ([
            'merging_id' => $request->merging_id,
            'reviewer_user_id' => $request->reviewer_user_id,
            'reviewer_username' => $request->reviewer_username,
            'reviewee_user_id' => $request->reviewee_user_id,
            'star_rating' => $request->star,
            'review' => $request->review
        ]);

        $review = Review::where('merging_id', $request->merging_id)
            ->where('reviewer_user_id', $user_id)
            ->get();

        $review_count = count($review);

        if($review_count > 0){
            alert()->error('Thank you, you have already review this transaction', 'Oops');
            return redirect()->back();
        }

        $addreview = Review::create($newreview);
        alert()->success('Thank you for reviewing this transaction', 'Success');
        return redirect()->back();

    }


    public function withdraw(Request $request)
    {
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
        $wallet_balance = $balance_btc;
        $labels = md5(env('APP_NAME').'-User-'.$username.time());

        //--------------------CURRENT TIME--------------------------------
        $current_time = \Carbon\Carbon::now()->toDateTimeString();


        $btc_address = $request->btc_address;
        $usd_amount = intval($this->toUsd($currency, $request->amount));
        $btc_amount = $this->getBtcBalance($usd_amount);


        $dispute = Dispute::where('buyer_user_id', $user_id)->orWhere('seller_user_id', $user_id)->where('dispute_status', '=', NULL)->get();

        $dispute_count = count($dispute);
        if($dispute_count > 0) {
            alert()->error('You have an unresolved dispute, kindy resolve the dispute to continue transactions.', 'Pending Dispute')->persistent('Close');
        }

       $newpayout = ([
            'user_id' => $user_id,
            'username' => $username,
            'email' => $email,
            'user_label' => $labels,
            'amount' => $btc_amount,
            'btc_address' => $btc_address,
            'payout_status' => 'pending',
        ]);


        if($btc_amount >= $wallet_balance){
            alert()->error('Your withdraw amount is higher than your balance, try a lesser amount.', 'Insufficient Funds')->persistent('Close');
            return redirect()->back();
        }

        $create = Payout::create($newpayout);
        alert()->success('Your withdrawal request is been proceed. You external wallet will be created within 24 Hours', 'Success')->persistent('Close');;
        return redirect()->back();
    }

    public function saveProfile(Request $request)
    {
        $data = $request->all();

        $user = Auth::guard('user')->user();


        if(\Hash::check($data['old_password'], Auth::guard('user')->user()->password)){
            if($request->new_password == $request->confirm_password){
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


    public function resendVerificationEmail(Request $request){
        $user = Auth::guard('user')->user();

        $email = $request->email;
        $emailUser = User::where('email', $email)->first();
        $code = $user->verification_code;

        if($user->email != $email){
            alert()->error('Invalid Email Address', 'Oops!')->persistent();
             return redirect()->back();
        }

        if(!$emailUser){
             alert()->error('User not found', 'Oops!')->persistent();
             return redirect()->back();
        }

        Mail::to($email)->send(new VerifyEmail($user, $code));

        if(true){
             alert()->success('Verification email resent', 'Good')->persistent();
             return redirect()->back();
        }else{
             alert()->error('An error occur', 'Oops!')->persistent();
             return redirect()->back();
        }


    }

    public function contactAdmin(Request $request){
        $user = Auth::guard('user')->user();

        $name = $request->name;
        $body = $request->message;

        Mail::to(env('SUPPORT_EMAIL'))->send(new SupportAdmin($user, $name, $body));

        if(true){
             alert()->success('Email Sent', 'Good')->persistent();
             return redirect()->back();
        }else{
             alert()->error('An error occur', 'Oops!')->persistent();
             return redirect()->back();
        }


    }


}

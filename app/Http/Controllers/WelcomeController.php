<?php

namespace App\Http\Controllers;

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
use Jimmerioles\BitcoinCurrencyConverter\Converter;

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


use App\Mail\MergingCancelMail;
use App\Mail\MergingTimerMail;
use App\Mail\SupportAdmin;

use Mail;
use LaraBlockIo;
use Alert;
use Log;
use Coindesk;
use Swap;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    //


    public function marketplace()
    {

        $geoip = new GeoIPLocation();
        $ip = $geoip->getIP();
        $set_ip = $geoip->setIP($ip);
        $currency = $geoip->getCurrencyCode();
        $currencySym = $geoip->getCurrencySymbol();
        $defaultCurrency = env('DEFAULT_CURRENCY');

        $trades = Seller::where([
            ['merge_status', '=', 'pending'],
            ['currency', '=', $currency]
        ])->inRandomOrder()->get();


        return view('marketplace', [
            'currency' => $currency,
            'trades' => $trades
        ]);
    }

    public function terms()
    {
        return view('terms');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function about()
    {
        return view('about');
    }

    public function contactAdminLanding(Request $request){
        $email = $request->email;
        $name = $request->name;
        $body = $request->message;

        Mail::to(env('SUPPORT_EMAIL'))->send(new SupportAdmin($email, $name, $body, null));

        if(true){
             alert()->success('Email Sent', 'Good')->persistent();
             return redirect()->back();
        }else{
             alert()->error('An error occur', 'Oops!')->persistent();
             return redirect()->back();
        }


    }
}

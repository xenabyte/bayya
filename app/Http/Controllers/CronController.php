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

use Mail;
use LaraBlockIo;
use Alert;
use Log;
use Coindesk;
use Swap;
use Carbon\Carbon;

class CronController extends Controller
{
    //
    //notify deposit
    public function confirmDeposit(Request $data)
    {

        try {

            $users = User::all();
            //log::info($deposits);
            if(!$users)
                return null;
            foreach($users as $user){
                $username = $user->username;
                $label = env('APP_NAME').'-user-'.$username;
                $balance = LaraBlockIo::getAddressesBalanceByLabels($label);
                $paidAmount = $balance->data->available_balance;

                if($paidAmount > $this->toCurrency(env('DEFAULT_CURRENCY'), 15)) { //
                    //todo
                    //update user wallet
                    //converting to USD
                    $user->btc_wallet = $paidAmount;
                    $user->save();

                    $new_deposit = ([
                        'user_id' => $user->id,
                        'deposit_amount' => $paidAmount,
                        'status' => 'Success',
                        'btc_address' => $user->btc_address,
                        'invoice_id' => $label
                    ]);

                    $deposit = Deposit::create($new_deposit);


                }
            }


        } catch (\Exception $e) {
            log::info($e);
            return 'Error confirmDeposit cron';
        }

    }

    Public function cancelTrade(){
        try {

            $pendingMergings = Merging::with(['buyer', 'seller', 'associated_seller', 'associated_buyer'])
            ->where('payment_status', NULL)
            ->get();

            if(!$pendingMergings)
                return null;
            foreach($pendingMergings as $pendingMerging){

                //Declaring Parameters
                    //parameters for dates
                    $dueDate = Carbon::parse($pendingMerging->merge_at)->addMinutes($pendingMerging->trade_time)->format('jS \o\f F, Y \a\t g:i:s A');
                    //parameters for email
                    $buyer = User::find($pendingMerging->buyer_user_id);
                    $seller = User::find($pendingMerging->seller_user_id);
                    $buyer_email = $buyer->email;
                    $buyer_username = $buyer->username;
                    $seller_email = $seller->email;
                    $seller_username = $seller->username;
                    $merging_id = sprintf('%06d', $pendingMerging->id);
                    $maxTradeTime = Carbon::parse($pendingMerging->merge_at)->addMinutes($pendingMerging->trade_time);
                    $halfTradeTime = Carbon::parse($pendingMerging->merge_at)->addMinutes($pendingMerging->trade_time / 2);
                    $thirdTradeTime = Carbon::parse($pendingMerging->merge_at)->addMinutes($pendingMerging->trade_time / 3);
                    $quaterTradeTime = Carbon::parse($pendingMerging->merge_at)->addMinutes($pendingMerging->trade_time / 4);


                //Schedule tasks
                if(Carbon::now() > $maxTradeTime){
                    $sellers = Seller::find($pendingMerging->seller_id);
                    $sellers->merging_id = NULL;
                    $sellers->buyer_id = NULL;
                    $sellers->buyer_user_id = NULL;
                    $sellers->merge_at = NULL;
                    $sellers->merge_status = 'pending';
                    $sellers->update();

                    $deletebuyer = Buyer::where('id', '=', $pendingMerging->buyer_id)->delete();
                    $deletemerging = Merging::where('id', '=', $pendingMerging->id)->delete();

                    if($deletemerging){
                        Mail::to($buyer_email)->send(new MergingCancelMail($buyer_email, $buyer_username, $seller_username,$merging_id));
                        Mail::to($seller_email)->send(new MergingCancelMail($seller_email, $seller_username, $buyer_username,$merging_id));
                    }

                }elseif(Carbon::now() > $quaterTradeTime){
                    Mail::to($buyer_email)->send(new MergingTimerMail($buyer_email, $buyer_username, $seller_username,$merging_id, $dueDate));
                    Mail::to($seller_email)->send(new MergingTimerMail($seller_email, $seller_username, $buyer_username,$merging_id, $dueDate));

                }elseif(Carbon::now() > $thirdTradeTime){

                    Mail::to($buyer_email)->send(new MergingTimerMail($buyer_email, $buyer_username, $seller_username,$merging_id, $dueDate));
                    Mail::to($seller_email)->send(new MergingTimerMail($seller_email, $seller_username, $buyer_username,$merging_id, $dueDate));

                }elseif(Carbon::now() > $halfTradeTime){

                    Mail::to($buyer_email)->send(new MergingTimerMail($buyer_email, $buyer_username, $seller_username,$merging_id, $dueDate));
                    Mail::to($seller_email)->send(new MergingTimerMail($seller_email, $seller_username, $buyer_username,$merging_id, $dueDate));
                }

            }

        } catch(ValidationException $e) {
            Log::error("cancelTrade ERROR: ".$e);
        }

    }
}



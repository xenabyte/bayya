<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCurrencyBalance($currency, $balanceUSD){
        $bitcoinUSDPrice = Coindesk::toCurrency('USD', 1);
        $bitcoinCurrencyPrice =  $balanceUSD / $bitcoinUSDPrice;
        $balance = to_currency($currency, $bitcoinCurrencyPrice);

        return $balance;
    }


    public function getCurrencyUSD($currency, $amount){
        $bitcoinAmount = to_btc($amount, $currency);
        $usdAmount =  to_currency(env('DEFAULT_CURRENCY'), $bitcoinAmount);

        return $usdAmount;
    }


    public static function getCurrencyAmount($currency, $balanceUSD){
        $bitcoinUSDPrice = Coindesk::toCurrency('USD', 1);
        $bitcoinCurrencyPrice =  $balanceUSD / $bitcoinUSDPrice;
        $balance = to_currency($currency, $bitcoinCurrencyPrice);

        return $balance;
    }


    public static function getRateAmount($currency, $rate){
        $bitcoinUSDPrice = Coindesk::toCurrency('USD', 1);
        $currentRate = ($rate / 100) * $bitcoinUSDPrice;
        $mainRate = $currentRate + $bitcoinUSDPrice;
        $bitcoinCurrencyPrice =  $mainRate / $bitcoinUSDPrice;
        $balance = to_currency($currency, $bitcoinCurrencyPrice);

        return $balance;
    }
}

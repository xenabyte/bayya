<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Jimmerioles\BitcoinCurrencyConverter\Converter;

Use Log;
use Coindesk;
use GuzzleHttp\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCurrencyBalance($currency, $balanceUSD){
        $bitcoinUSDPrice = Coindesk::toFiatCurrency('USD', 1);
        $bitcoinCurrencyPrice =  $balanceUSD / $bitcoinUSDPrice;
        $balance = Self::toCurrency($currency, $bitcoinCurrencyPrice);

        return $balance;
    }

    public static function getBtcBalance($balanceUSD){
        $bitcoinUSDPrice = Coindesk::toFiatCurrency('USD', 1);
        $bitcoinCurrencyPrice =  $balanceUSD / $bitcoinUSDPrice;

        return $bitcoinCurrencyPrice;
    }


    public function getCurrencyUSD($currency, $amount){
        $bitcoinAmount = to_btc($amount, $currency);
        $usdAmount =  to_currency(env('DEFAULT_CURRENCY'), $bitcoinAmount);

        return $usdAmount;
    }


    public static function getCurrencyAmount($currency, $balanceUSD){
        $bitcoinUSDPrice = Coindesk::toFiatCurrency('USD', 1);
        $bitcoinCurrencyPrice =  $balanceUSD / $bitcoinUSDPrice;
        $balance = to_currency($currency, $bitcoinCurrencyPrice);

        return $balance;
    }


    public static function getRateAmount($currency, $rate){
        $bitcoinUSDPrice = Coindesk::toFiatCurrency('USD', 1);
        $currentRate = ($rate / 100) * $bitcoinUSDPrice;
        $mainRate = $currentRate + $bitcoinUSDPrice;
        $bitcoinCurrencyPrice =  $mainRate / $bitcoinUSDPrice;
        $balance = to_currency($currency, $bitcoinCurrencyPrice);

        return $balance;
    }

    public static function toCurrency($currency, $btc){
        try {
            $client = new Client();
            $body = $client->get('https://api.coindesk.com/v1/bpi/currentprice/'.$currency.'.json')->getBody();
            $obj = json_decode($body);
            $price = intval($obj->bpi->$currency->rate_float);
            $amount = $btc * $price;
            return $amount;
        }
        catch(\Exception $e){
            \Log::info("error");
        }
    }
}

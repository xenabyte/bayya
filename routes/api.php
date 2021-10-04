<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['json.response']], function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::group(['prefix' => 'cron'], function () {
        Route::get('/confirmDeposit',  [App\Http\Controllers\CronController::class, 'confirmDeposit']);
        Route::get('/cancelTrade', [App\Http\Controllers\CronController::class, 'cancelTrade']);
    });
});

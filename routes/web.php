<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login',  [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login',  [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

    Route::get('/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register']);

    Route::post('/password/email', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.request');
    Route::post('/password/reset', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'reset'])->name('password.email');
    Route::get('/password/reset', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
    Route::get('/password/reset/{token}', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class, 'showResetForm']);
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/login',  [App\Http\Controllers\User\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login',  [App\Http\Controllers\User\Auth\LoginController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\User\Auth\LoginController::class, 'logout'])->name('logout');

    Route::get('/register', [App\Http\Controllers\User\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\User\Auth\RegisterController::class, 'register']);

    Route::post('/password/email', [App\Http\Controllers\User\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.request');
    Route::post('/password/reset', [App\Http\Controllers\User\Auth\ResetPasswordController::class, 'reset'])->name('password.email');
    Route::get('/password/reset', [App\Http\Controllers\User\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
    Route::get('/password/reset/{token}', [App\Http\Controllers\User\Auth\ResetPasswordController::class, 'showResetForm']);


  Route::get('/home', [App\Http\Controllers\User\HomeController::class, 'index']);
  Route::get('/sales', [App\Http\Controllers\User\HomeController::class, 'sales']);
  Route::get('/profile', [App\Http\Controllers\User\HomeController::class, 'profile']);
  Route::get('/records', [App\Http\Controllers\User\HomeController::class, 'records']);
  Route::get('/contact', [App\Http\Controllers\User\HomeController::class, 'contact']);
  Route::get('/helpCenter', [App\Http\Controllers\User\HomeController::class, 'helpCenter']);

  Route::post('/createTrade', [App\Http\Controllers\User\HomeController::class, 'createTrade']);
  Route::get('/trade/{hash}', [App\Http\Controllers\User\HomeController::class, 'getTrade']);
  Route::post('/joinTrade', [App\Http\Controllers\User\HomeController::class, 'joinTrade']);
  Route::get('/chatroom/{id}', [App\Http\Controllers\User\HomeController::class, 'chatRoom']);
  Route::post('/sendMessage', [App\Http\Controllers\User\HomeController::class, 'sendMessage']);
  Route::post('/deal', [App\Http\Controllers\User\HomeController::class, 'deal']);
  Route::post('/cancelTrade', [App\Http\Controllers\User\HomeController::class, 'cancelTrade']);
  Route::post('/acceptPayment', [App\Http\Controllers\User\HomeController::class, 'acceptPayment']);
  Route::post('/raiseDispute', [App\Http\Controllers\User\HomeController::class, 'raiseDispute']);
  Route::post('/confirmPayment', [App\Http\Controllers\User\HomeController::class, 'confirmPayment']);
  Route::post('/createReview', [App\Http\Controllers\User\HomeController::class, 'createReview']);

  Route::post('/uploadKYC', [App\Http\Controllers\User\HomeController::class, 'uploadKYC']);
  Route::post('/withdraw', [App\Http\Controllers\User\HomeController::class, 'withdraw']);








});

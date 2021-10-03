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

    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index']);
    Route::get('/allUsers', [App\Http\Controllers\Admin\HomeController::class, 'allUsers']);
    Route::get('/disputes', [App\Http\Controllers\Admin\HomeController::class, 'disputes']);
    Route::get('/payouts', [App\Http\Controllers\Admin\HomeController::class, 'payouts']);
    Route::get('/tickets', [App\Http\Controllers\Admin\HomeController::class, 'tickets']);
    Route::get('/trades', [App\Http\Controllers\Admin\HomeController::class, 'trades']);
    Route::get('/profile', [App\Http\Controllers\Admin\HomeController::class, 'profile']);

    Route::post('/saveProfile', [App\Http\Controllers\Admin\HomeController::class, 'saveProfile']);
    Route::post('/blockUser', [App\Http\Controllers\Admin\HomeController::class, 'blockUser']);
    Route::post('/approveKYC', [App\Http\Controllers\Admin\HomeController::class, 'approveKYC']);
    Route::post('/rejectKYC', [App\Http\Controllers\Admin\HomeController::class, 'rejectKYC']);
    Route::post('/unblockUser', [App\Http\Controllers\Admin\HomeController::class, 'unblockUser']);
    Route::post('/approvePayout', [App\Http\Controllers\Admin\HomeController::class, 'approvePayout']);
    Route::post('/payBuyer', [App\Http\Controllers\Admin\HomeController::class, 'payBuyer']);
    Route::post('/paySeller', [App\Http\Controllers\Admin\HomeController::class, 'paySeller']);
    Route::post('/closeTicket', [App\Http\Controllers\Admin\HomeController::class, 'closeTicket']);
    Route::post('/sendComment', [App\Http\Controllers\Admin\HomeController::class, 'sendComment']);

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

    Route::post('/saveProfile', [App\Http\Controllers\User\HomeController::class, 'saveProfile']);

    Route::group(['prefix'=>'2fa'], function(){
        Route::get('/', [App\Http\Controllers\LoginSecurityController::class, 'show2faForm']);
        Route::post('/generateSecret', [App\Http\Controllers\LoginSecurityController::class, 'generate2faSecret'])->name('generate2faSecret');
        Route::post('/enable2fa', [App\Http\Controllers\LoginSecurityController::class, 'enable2fa'])->name('enable2fa');
        Route::post('/disable2fa', [App\Http\Controllers\LoginSecurityController::class, 'disable2fa'])->name('disable2fa');

        // 2fa middleware
        Route::post('/2faVerify', function () {
            return redirect(URL()->previous());
        })->name('2faVerify')->middleware('2fa');
    });

});


// test middleware
Route::get('/test_middleware', function () {
    return "2FA middleware work!";
})->middleware(['auth', '2fa']);

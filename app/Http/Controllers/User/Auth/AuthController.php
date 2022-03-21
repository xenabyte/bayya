<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Coinremitter\Coinremitter;
use App\Http\Controllers\ValidationException;
use Illuminate\Http\Exception\HttpResponseException;

use App\Mail\Notification;
use App\Mail\VerifyEmail;
use App\Mail\ResetPassword;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Status;

use Alert;
use Mail;
use Log;
use Carbon\Carbon;

class AuthController extends Controller
{
    //
    public function showLinkRequestForm(){

        return view('user.auth.passwords.email');
    }


    public function sendResetLinkEmail(Request $request){
        $email = $request->input('email');
        $time = Carbon::now();


        $subject = env('APP_NAME') .' Reset Password';
        $user = User::where('email', $email)->first();

         if(!$user){
             alert()->error('User not found', 'Oops!')->persistent();
             return redirect()->back();
        }

        Mail::to($email)->send(new ResetPassword($user, $time));

        if(true){
             alert()->success('Password email sent', 'Good')->persistent();
             return redirect()->back();
        }else{
             alert()->error('An error occur', 'Oops!')->persistent();
             return redirect()->back();
        }
    }

    public function showResetForm($email, $time)
    {
        $email = \base64_decode($email); //decode email address
        $time = \base64_decode($time); // decode time

        return view('user.auth.passwords.reset')->with(
            ['email' => $email, 'time' => $time]
        );
    }

    public function reset(Request $request)
    {
        $email = $request->input('email');
        $time = $request->input('time');
        $user = User::where('email', $email)->first();

        if($time < Carbon::parse('- 15minutes')){
            alert()->error('Link expired', 'Oops!')->persistent();
            return redirect()->back();
        }


        if(!$user){
             alert()->error('User not found', 'Oops!')->persistent();
             return redirect()->back();
        }

        if(!empty($request->password) && !empty($request->password_confirmation)) {
            if($request->password == $request->password_confirmation){
                $user->password = bcrypt($request->password);
            }else{
                alert()->error('Password mismatch', 'Oops!')->persistent('Close');
                return redirect()->back();
            }
        }
        $user->save();
        alert()->success('Password reset successful, kindly login with the correct details', 'Good')->persistent();
        return view('user.auth.login');
    }


    public function verifyEmail($email,$secret){

        $email = \base64_decode($email); //decode email address
        $secret = \base64_decode($secret); // decode verification_code

        $user = User::where('email', $email)->where('verification_code',$secret)->first();

        if(!empty($user->email_verified_at)){
            if(Auth::guard('user')->check()){
              
                if($user->loginSecurity == null){
                    alert()->success('Email already verified, Kindly set up 2 factor authentication', 'Good')->persistent();
                    return redirect("/user/2fa");
                }
            alert()->success('Email Already Verified', 'Good')->persistent();
              return redirect("/user/home");
            }else{
                alert()->success('Email Already Verified', 'Good')->persistent();
                return redirect("/user/login");
            }
        }

        if($user){
            $user->email_verified_at = Carbon::parse();
            $user->save();

            if(Auth::guard('user')->check()){
              
                if($user->loginSecurity == null){
                    alert()->success('Email verified, Kindly set up 2 factor authentication', 'Good')->persistent();
                    return redirect("/user/2fa");
                }
                alert()->success('Email Verified', 'Good')->persistent();
                return redirect("/user/home");
            }

        }else{
            alert()->error('Email not verified', 'Oops!')->persistent();
            return redirect("/user/login");
        }
    }
}

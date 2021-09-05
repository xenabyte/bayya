<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Victorybiz\GeoIPLocation\GeoIPLocation;

use Blockavel\LaraBlockIo\LaraBlockIoFacade;
use LaraBlockIo;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'phone_number' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $username = $data['username'];
        $label = env('APP_NAME').'-trader-'.$username;
        $generated_address = LaraBlockIo::createAddress($label);
        $m_address = $generated_address->data->address;

        $geoip = new GeoIPLocation();
        $ip = $geoip->getIP();
        $set_ip = $geoip->setIP($ip);
        $currency = $geoip->getCurrencyCode();
        $currencySym = $geoip->getCurrencySymbol();
        $location = $geoip->getLocation();
        $code = substr(md5(rand()),0,5);

        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'btc_address'=> $m_address,
            'viewable_password' => $data['password'],
            'phone_number' => $data['phone_number'],
            'ip_address' => $ip,
            'currency' => $currency,
            'location' => $location,
            'verification_code'=> $code,
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('user.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }
}

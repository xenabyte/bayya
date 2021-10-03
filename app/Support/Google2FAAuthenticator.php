<?php

namespace App\Support;

use PragmaRX\Google2FALaravel\Support\Authenticator;
use Auth;
use Hash;

class Google2FAAuthenticator extends Authenticator
{
    protected function canPassWithoutCheckingOTP()
    {
        if(Auth::guard('user')->user()->loginSecurity == null)
            return true;
        return
            !Auth::guard('user')->user()->loginSecurity->google2fa_enable ||
            !$this->isEnabled() ||
            $this->noUserIsAuthenticated() ||
            $this->twoFactorAuthStillValid();
    }

    protected function getGoogle2FASecretKey()
    {
        $secret = Auth::guard('user')->user()->loginSecurity->{$this->config('otp_secret_column')};

        if (is_null($secret) || empty($secret)) {
            throw new InvalidSecretKey('Secret key cannot be empty.');
        }

        return $secret;
    }

}

@extends('user.layout.2fa')
@section('content')


    <h1 class="form-title mb-5">Two Factor Authentication</h1>
    <div class="alert alert-outline-primary py-4 px-4" role="alert">
        <h5 class="alert-heading"></h5>
        <p>Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity.</p>
        <hr>
        <p class="mb-0">Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>
    </div>

    @if($data['user']->loginSecurity == null)
        <form class="form-horizontal" method="POST" action="{{ url('/user/2fa/generateSecret') }}">
           @csrf
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Generate Secret Key to Enable 2FA
                </button>
            </div>
        </form>
    @elseif(!$data['user']->loginSecurity->google2fa_enable)
        1. Scan this QR code with your Google Authenticator App. Alternatively, you can use the code: <code>{{ $data['secret'] }}</code><br/>
        <img src="{{$data['google2fa_url'] }}" alt="">
        <br/><br/>
        2. Enter the pin from Google Authenticator app:<br/><br/>
        <form class="form-horizontal" method="POST" action="{{ url('/user/2fa/enable2fa') }}">
            @csrf
            <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">
                <label for="secret" class="control-label">Authenticator Code</label>
                <input id="secret" type="password" class="form-control col-md-4" name="secret" required>
                @if ($errors->has('verify-code'))
                    <span class="help-block">
                    <strong>{{ $errors->first('verify-code') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">
                Enable 2FA
            </button>

        </form>
    @elseif($data['user']->loginSecurity->google2fa_enable)
        <div class="alert alert-success">
            2FA is currently <strong>enabled</strong> on your account.
        </div>
        <p>If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.</p>
        <form class="form-horizontal" method="POST" action="{{ url('/user/2fa/disable2fa') }}">
            @csrf
            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                <label for="change-password" class="control-label">Current Password</label>
                    <input id="current-password" type="password" class="form-control col-md-4" name="current-password" required>
                    @if ($errors->has('current-password'))
                        <span class="help-block">
                    <strong>{{ $errors->first('current-password') }}</strong>
                    </span>
                    @endif
            </div>
            <button type="submit" class="btn btn-primary ">Disable 2FA</button>
            <a href="{{url('/user/home')}}" class="btn btn-primary my-1 waves-effect">
                <span><i class="mdi mdi-view-dashboard"></i> Dashboard</span>
            </a>
        </form>
    @endif

@endsection

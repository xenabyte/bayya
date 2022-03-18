@extends('user.layout.2fa')
@section('content')


    <h1 class="form-title mb-5">Two Factor Authentication</h1>
    <div class="alert alert-outline-primary py-4 px-4" role="alert">
        <h5 class="alert-heading"></h5>
        <p>Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity.</p>
        <hr>
        <p class="mb-0">Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>

        <hr>
        @if($data['user']->loginSecurity == null)
            <form class="form-horizontal text-center" method="POST" action="{{ url('/user/2fa/generateSecret') }}">
            @csrf
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Generate Secret Key to Enable 2FA
                    </button>
                </div>
            </form>
        @elseif(!$data['user']->loginSecurity->google2fa_enable)
            1. Scan this QR code with your Google Authenticator App. Alternatively, you can use the code: <code>{{ $data['secret'] }}</code><br/>
            <div class="text-center">
                <img style="align-center" src="{{$data['google2fa_url'] }}" alt="">
            </div>
            <br/><br/>
            2. Enter the pin from Google Authenticator app: <hr>
            
            <form class="form-horizontal text-center" method="POST" action="{{ url('/user/2fa/enable2fa') }}">
                @csrf
                <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">
                    <label for="secret" class="control-label">Authenticator Code</label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Code</span>
                            </div>
                            <input id="secret" type="password" name="secret" class="form-control form-block" required aria-label="Authenticator Code" aria-describedby="basic-addon1">
                        </div>
                    </div>
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
            <hr>
            <form class="form-horizontal text-center" method="POST" action="{{ url('/user/2fa/disable2fa') }}">
                @csrf
                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                    <label for="change-password" class="control-label">Current Password</label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Password</span>
                            </div>
                            <input id="current-password" type="password" name="current-password" class="form-control form-block" required aria-label="Authenticator Code" aria-describedby="basic-addon1">
                        </div>
                    </div>

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
    
    </div>

@endsection

@extends('user.layout.2fa')
@section('content')

    <h1 class="form-title mb-5">Two Factor Authentication</h1>
    <div class="alert alert-outline-primary py-4 px-4" role="alert">
        <h5 class="alert-heading">Well done!</h5>
        <p>Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity.</p>
        <hr>
        <p class="mb-0">Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>



        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <hr>
        <h5> Enter the pin from Google Authenticator app:</h5>
        <hr>
        <form class="form-horizontal text-center" action="{{ url('/user/2fa/2faVerify') }}" method="POST">
            @csrf
            <div class="form-group{{ $errors->has('one_time_password-code') ? ' has-error' : '' }}">
                <label for="one_time_password" class="control-label">One Time Password</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Password</span>
                        </div>
                        <input id="one_time_password" type="password" name="one_time_password" class="form-control form-block" required aria-label="Authenticator Code" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Authenticate</button>
        </form>
    </div>
@endsection

@extends('user.layout.2fa')
@section('content')

    <h1 class="form-title mb-5">Two Factor Authentication</h1>
    <div class="alert alert-outline-primary py-4 px-4" role="alert">
        <h5 class="alert-heading">Well done!</h5>
        <p>Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity.</p>
        <hr>
        <p class="mb-0">Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>
    </div>



    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<h5> Enter the pin from Google Authenticator app:</h5> <br/><br/>
<form class="form-horizontal" action="{{ url('/user/2fa/2faVerify') }}" method="POST">
    @csrf
    <div class="form-group{{ $errors->has('one_time_password-code') ? ' has-error' : '' }}">
        <label for="one_time_password" class="control-label">One Time Password</label>
        <input id="one_time_password" name="one_time_password" class="form-control col-md-4"  type="text" required/>
    </div>
    <button class="btn btn-primary" type="submit">Authenticate</button>
</form>
@endsection

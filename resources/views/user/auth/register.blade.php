@extends('user.layout.auth')

@section('content')

<div class="panel-body panel-form">

    <h1 class="form-title">Register</h1>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/register') }}">
    @csrf
        <div class="field-group field-group-vertical field-group-xl">

            <div class="form-row">
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} col-md-12">
                    <label for="inputFName">Username</label>
                    <div class="input-group input-group-merged">
                        <input type="text" class="form-control" placeholder="Username" value="{{ old('username') }}" name="username" required autofocus>
                        <div class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
                    <label for="inputEmail">Email</label>
                    <div class="input-group input-group-merged">
                        <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Email" value="{{ old('email') }}" required>
                        <div class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }} col-md-6">
                    <label for="inputNumber">Phone Number</label>
                    <div class="input-group input-group-merged">
                        <input type="text" class="form-control" id="inputNumber" name="phone_number" placeholder="(+1) 123 4567 8900" value="{{ old('phone_number') }}"  required>
                        <div class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-phone"></i>
                            </span>
                        </div>

                        @if ($errors->has('phone_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword">Password</label>
                    <div class="input-group input-group-merged">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-lock-open"></i>
                            </span>
                        </div>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} col-md-6">
                    <label for="inputCPassword">Confirm Password</label>
                    <div class="input-group input-group-merged">
                        <input type="password" class="form-control" id="inputCPassword" placeholder="Confirm Password" name="password_confirmation" required>
                        <div class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="custom-control custom-checkbox custom-checkbox-2">
                    <input type="checkbox" class="custom-control-input" id="remember-me" required>
                    <label class="custom-control-label pt-1" for="remember-me">I agree with the <a href="#" class="font-weight-600">terms of services</a></label>
                </div>
            </div>

            <div style="padding: 0 5%" class="text-center mt-4">
                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_KEY') }}" data-callback="enableBtn"></div>
            </div>

            <div class="form-group form-group-btns text-center mb-0">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <button type="submit" id="signUp" disabled class="btn btn-block btn-lg btn-primary">Register</button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ url('/') }}" class="btn btn-block btn-lg btn-outline-secondary">Back</a>
                    </div>
                </div>
            </div>

        </div>


    </form>
</div>

@endsection


@extends('user.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

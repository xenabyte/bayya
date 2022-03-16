@extends('user.layout.auth')

@section('content')

<div class="panel-body panel-form">

    <h1 class="form-title">Reset Password</h1>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/password/reset') }}   ">
    @csrf
        <input type="hidden" name="time" value="{{ $time }}">
        <div class="field-group field-group-vertical field-group-xl">

            

            <div class="form-row">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-12">
                    <label for="inputEmail">Email</label>
                    <div class="input-group input-group-merged">
                        <input type="text" class="form-control" name="email" value="{{ $email }}" readonly required>
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

            <div class="form-group text-center">
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block btn-lg btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>

        </div>


    </form>
</div>

@endsection

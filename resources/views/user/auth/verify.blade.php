@extends('user.layout.auth')

@section('content')

<div class="panel-body panel-form">

    <h1 class="form-title">Verify Email</h1>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/email/verify') }}">
    @csrf
        <div class="field-group field-group-vertical field-group-xl">

            <div class="form-row">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-12">
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
            </div>

            <div class="form-group text-center">
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block btn-lg btn-primary">Verify Email</button>
                    </div>
                </div>
            </div>

        </div>


    </form>
</div>

@endsection
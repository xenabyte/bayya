@extends('user.layout.auth')

<!-- Main Content -->
@section('content')
<div class="panel-body panel-form">
<h2 class="form-title"><span class="thin">Reset Password</h2>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/password/email') }}">
    @csrf
        <div class="field-group field-group-vertical field-group-lg">

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white">
                            <svg id="lnr-envelope" class="svg-muted" width="20" style="margin-top: -3px; " viewBox="0 0 1024 1024"><title>envelope</title><path class="path1" d="M896 307.2h-819.2c-42.347 0-76.8 34.453-76.8 76.8v460.8c0 42.349 34.453 76.8 76.8 76.8h819.2c42.349 0 76.8-34.451 76.8-76.8v-460.8c0-42.347-34.451-76.8-76.8-76.8zM896 358.4c1.514 0 2.99 0.158 4.434 0.411l-385.632 257.090c-14.862 9.907-41.938 9.907-56.802 0l-385.634-257.090c1.443-0.253 2.92-0.411 4.434-0.411h819.2zM896 870.4h-819.2c-14.115 0-25.6-11.485-25.6-25.6v-438.566l378.4 252.267c15.925 10.618 36.363 15.925 56.8 15.925s40.877-5.307 56.802-15.925l378.398-252.267v438.566c0 14.115-11.485 25.6-25.6 25.6z"></path></svg>
                        </span>
                    </div>
                    <input type="text" placeholder="Email Address" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <br>
            <div class="form-group form-group-btns text-center mb-0">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-lg btn-primary"> Send Password Reset Link</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

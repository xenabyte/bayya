@include('user.inc.header')
@inject('controller', 'App\Http\Controllers\Controller')

    <!-- Main Page Content -->
    <div class="page-content">

        <div class="page-content">


            <header>
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="mb-0">Profile</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                                <li class="breadcrumb-item"><a href="#">{{env('APP_NAME')}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>


            <div class="row">

                <div class="col-md-12">

                    <div class="card mt-24 card-user-profile-wide">
                        <div class="row no-gutters">
                            <div class="col col-avatar py-3 py-md-0">
                                <div class="user-avatar-inside-svg">
                                    <div class="user-avatar">
                                       <i class="fa fa-user avatar avatar-4 rounded-circle"></i>
                                    </div>
                                    <svg viewBox="0 0 36 36" width="100" height="100" class="donut">
                                        <circle class="donut-ring" cx="20" cy="20" r="15.91549430918952" fill="transparent" stroke="#eeeeee" stroke-width="2"></circle>
                                        <circle class="donut-segment" cx="20" cy="20" r="15.91549430918952" fill="transparent" stroke="#06c48c" stroke-width="2" stroke-dasharray="70 30" stroke-dashoffset="25"></circle>
                                    </svg>
                                    <p> @if(empty(Auth::guard('user')->user()->status) )Kindly Upload <strong>KYC</strong> Documents @endif</p>
                                </div>
                            </div>
                            <div class="col col-info">

                                <div class="row">

                                    <div class="col">

                                        <div class="d-inline-block mr-4">
                                            <h6 class="user-fullname">{{ Auth::guard('user')->user()->username  }}</h6>
                                            <h6 class="user-name">{{ Auth::guard('user')->user()->email  }}</h6>
                                        </div>

                                        <span class="badge badge-pill badge-outline-info align-top">{{ $reviews->avg('star_rating') }} Star Member</span>

                                    </div>

                                </div>

                                <div class="row row-stats">

                                    <div class="col col-stats">

                                        <a href="#">
                                            <strong>{{ $transactions->count() }}</strong>
                                            Completed Transaction
                                        </a>

                                        <a href="#">
                                            <strong>{{ $trades->where('merge_status', null)->count() }}</strong>
                                           Active Trades
                                        </a>

                                    </div>

                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                        <div class="widget widget-file">

                                            <span class="widget-icon-bg">
                                                <i class="fas fa-money-check-alt"></i>
                                            </span>

                                            <div class="widget-header">
                                                <span class="widget-icon bg-info-light">
                                                    <i class="fas fa-money-check-alt"></i>
                                                </span>
                                                <h6 class="widget-label">Wallet Balance</h6>
                                            </div>
                                            <div class="widget-body px-4 pb-4">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="used text-left">{{ $currency }} {{ number_format($controller::toCurrency($currency, Auth::guard('user')->user()->btc_wallet), 2) }} / {{ Auth::guard('user')->user()->btc_wallet}} BTC</h4>
                                                    </div>
                                                </div>
                                                <div class="progress" style="height: 2px;">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- User Profile -->
                    <div class="panel panel-light h-auto">
                        <div class="panel-header">
                            <h1 class="panel-title">User Profile</h1>
                            <div class="panel-toolbar">
                                <ul class="nav nav-pills nav-pills-lg nav-pills-label" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link px-md-5 active" data-toggle="tab" href="#user-profile-tab-1" role="tab" aria-selected="false">
                                            Personal
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-md-5" data-toggle="tab" href="#user-profile-tab-2" role="tab" aria-selected="false">
                                            Security
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-md-5" data-toggle="tab" href="#user-profile-tab-3" role="tab" aria-selected="true">
                                            Deposit
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-md-5" data-toggle="tab" href="#user-profile-tab-4" role="tab" aria-selected="true">
                                            Withdraw
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="user-profile-tab-1" aria-expanded="true">

                                    <div class="mx-auto" style="max-width: 500px;">
                                        @if(empty(Auth::guard('user')->user()->status) )
                                        <div class="identity-content">
                                            <h4>Upload your ID card</h4>
                                            <span>(Driving License or Government ID card)</span>

                                            <p>Uploading your ID helps as ensure the safety and security of your funds</p>
                                            <p>Upload the right document to avoid been banned and losing your funds.</p>
                                        </div>

                                        <br>

                                        <form action="{{ url('/user/uploadKYC') }}" class="identity-upload" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Front ID </label>
                                                <div class="custom-file custom-image custom-image-avatar">
                                                    <input type="file" name="front" required name="from" data-placeholder="../../../assets/avatars/user-placeholder.png" class="custom-image-input" id="customImage">
                                                    <label class="custom-image-label" for="customImage">+</label>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="">Back ID </label>
                                                <div class="custom-file custom-image custom-image-avatar">
                                                    <input type="file" required name="back" data-placeholder="../../../assets/avatars/user-placeholder.png" class="custom-image-input" id="customImage">
                                                    <label class="custom-image-label" for="customImage">+</label>
                                                </div>
                                            </div>

                                            <div class="form-group text-right">
                                                <button type="submit" class="btn btn-wide btn-primary">Save</button>
                                            </div>
                                        </form>

                                        @elseif(Auth::guard('user')->user()->status == 'pending')
                                            <h4>Kindly wait while your document is been reviewed</h4>
                                        @else
                                            <h4>KYC Document is approved</h4>
                                        @endif

                                    </div>



                                </div>
                                <div class="tab-pane fade" id="user-profile-tab-2" aria-expanded="true">

                                    <div class="mx-auto" style="max-width: 500px;">

                                        <h5 class="mb-3">Security</h5>

                                        <form action="{{ url('/user/saveProfile') }}" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <label for="">Old Password</label>
                                                <input type="password" name="old_password" class="form-control" placeholder="Your password">
                                            </div>

                                            <div class="form-group">
                                                <label for="">New Password</label>
                                                <input type="password" name="new_password"  class="form-control" placeholder="New Your Password">
                                            </div>

                                            <div class="form-group">
                                                <label for="">New Password</label>
                                                <div class="input-group input-group-merged input-group-password-toggle">
                                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm your password">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-white btn-icon btn-password-toggle" type="button">
                                                            <i class="fas icon-see fa-eye"></i>
                                                            <i class="fas icon-hide fa-eye-slash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group text-right">
                                                <button type="submit" class="btn btn-wide btn-primary">Save Changes</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="user-profile-tab-3" aria-expanded="true">

                                    <div class="mx-auto" style="max-width: 500px;">

                                        <div class="card profile_card">
                                            <div class="card-header">
                                                <h4 class="card-title">Deposit(BTC Only)</h4>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="text-center">{{ Auth::guard('user')->user()->btc_address }}</h5>
                                                <p class="text-center"><a href="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:{{ Auth::guard('user')->user()->btc_address }}" target="_blank" title="barcode"><img id="btc" src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:{{ Auth::guard('user')->user()->btc_address }}" alt="{{ Auth::guard('user')->user()->btc_address }}"></a></p>
                                                <hr>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="user-profile-tab-4" aria-expanded="true">

                                    <div class="mx-auto" style="max-width: 500px;">

                                        <h5 class="mb-3">Withdraw</h5>
                                        <form action="{{ url('/user/withdraw') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Amount in {{ $currency }}</label>
                                                <input name="amount" type="number" min="0" max="{{ $controller::toCurrency($currency, Auth::guard('user')->user()->btc_wallet) }}" class="form-control" placeholder="5000 {{ $currency }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">BTC Address</label>
                                                <div class="input-group input-group-merged input-group-password-toggle">
                                                    <input type="text" name="btc_address" minlength="32" class="form-control" required placeholder="BTC Address">
                                                </div>
                                            </div>

                                            <div class="form-group text-right">
                                                <button type="submit" class="btn btn-wide btn-primary">Withdraw</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div> <!-- User Profile -->

                </div>

            </div>


    </div><!-- / .page-content -->
    <!-- Main Page Content -->

@include('user.inc.footer')

@include('admin.inc.header')
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
                                <li class="breadcrumb-item"><a href="#">Admin Dashboard</a></li>
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
                                </div>
                            </div>
                            <div class="col col-info">

                                <div class="row">

                                    <div class="col">

                                        <div class="d-inline-block mr-4">
                                            <h6 class="user-fullname">{{ Auth::guard('admin')->user()->name  }}</h6>
                                            <h6 class="user-name">{{ Auth::guard('admin')->user()->email  }}</h6>
                                        </div>
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
                                                        <h4 class="used text-left"></h4>
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
                                            Security
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="user-profile-tab-1" aria-expanded="true">

                                    <div class="mx-auto" style="max-width: 500px;">
                                        <h5 class="mb-3">Security</h5>

                                        <form action="{{ url('/admin/saveProfile') }}" method="POST">
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
                            </div>

                        </div>
                    </div> <!-- User Profile -->

                </div>

            </div>


    </div><!-- / .page-content -->
    <!-- Main Page Content -->

@include('admin.inc.footer')

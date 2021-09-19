@include('user.inc.header')

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
                                        <img src="../../../assets/avatars/8.jpg" class="avatar avatar-4 rounded-circle" alt="Avatar image">
                                    </div>
                                    <svg viewBox="0 0 36 36" width="100" height="100" class="donut">
                                        <circle class="donut-ring" cx="18" cy="18" r="15.91549430918952" fill="transparent" stroke="#eeeeee" stroke-width="2"></circle>
                                        <circle class="donut-segment" cx="18" cy="18" r="15.91549430918952" fill="transparent" stroke="#06c48c" stroke-width="2" stroke-dasharray="70 30" stroke-dashoffset="25"></circle>
                                    </svg>
                                    <p><strong>70%</strong> of profile information provided.</p>
                                </div>
                            </div>
                            <div class="col col-info">

                                <div class="row">

                                    <div class="col">

                                        <div class="d-inline-block mr-4">
                                            <h6 class="user-fullname">Johann Haag</h6>
                                            <h6 class="user-name">johann-haag</h6>
                                        </div>

                                        <span class="badge badge-pill badge-outline-info align-top">Level 5 Author</span>

                                    </div>

                                    <div class="col col-message-btn">
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-icon btn-secondary-light">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>

                                <div class="row row-stats">

                                    <div class="col col-stats">

                                        <a href="#">
                                            <strong>936</strong>
                                            Posts
                                        </a>

                                        <a href="#">
                                            <strong>339k</strong>
                                            Followers
                                        </a>

                                        <a href="#">
                                            <strong>485</strong>
                                            Following
                                        </a>

                                    </div>

                                </div>

                                <div class="row mt-3">

                                    <div class="col">

                                        <p class="text-muted mb-0">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis doloremque voluptatibus id ducimus, temporibus magni deleniti incidunt sit rerum ipsa harum expedita amet dolores ea dicta sed est aut quam.
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis doloremque voluptatibus id ducimus, temporibus magni deleniti incidunt sit rerum ipsa harum expedita amet dolores ea dicta sed est aut quam.
                                        </p>

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
                                            Two Factor Authentication (2FA)
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="user-profile-tab-1" aria-expanded="true">

                                    <div class="mx-auto" style="max-width: 500px;">

                                        <h5 class="mb-3">Personal Information</h5>

                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" class="form-control" placeholder="Enter first name here...">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Enter last name here...">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Avatar</label>
                                            <div class="custom-file custom-image custom-image-avatar">
                                                <input type="file" name="image" data-placeholder="../../../assets/avatars/user-placeholder.png" class="custom-image-input" id="customImage">
                                                <label class="custom-image-label" for="customImage">+</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <textarea class="form-control" placeholder="Enter last name here..."></textarea>
                                        </div>

                                        <div class="form-group text-right">
                                            <button class="btn btn-wide btn-primary">Save</button>
                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="user-profile-tab-2" aria-expanded="true">

                                    <div class="mx-auto" style="max-width: 500px;">

                                        <h5 class="mb-3">Security</h5>

                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" placeholder="Merged Buttons" class="form-control" value="your-password">
                                        </div>

                                        <div class="form-group">
                                            <label for="">New Password</label>
                                            <div class="input-group input-group-merged input-group-password-toggle">
                                                <input type="password" placeholder="Merged Buttons" class="form-control" value="your-password">
                                                <div class="input-group-append">
                                                    <button class="btn btn-white btn-icon btn-password-toggle" type="button">
                                                        <i class="fas icon-see fa-eye"></i>
                                                        <i class="fas icon-hide fa-eye-slash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-right">
                                            <button class="btn btn-wide btn-primary">Save</button>
                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="user-profile-tab-3" aria-expanded="true">

                                    <div class="mx-auto" style="max-width: 500px;">

                                        <h5 class="mb-3">Preferences</h5>

                                        <div class="form-group row">
                                            <label class="col-5 col-md-5 col-lg-5 m-0">Notifications</label>
                                            <div class="col-7 col-md-7 col-lg-7">
                                                <input type="checkbox" class="switchery switchery-sm" checked />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-5 col-md-5 col-lg-5 m-0">Receive Newsletter</label>
                                            <div class="col-7 col-md-7 col-lg-7">
                                                <input type="checkbox" class="switchery-sm switchery-danger" checked />
                                            </div>
                                        </div>

                                        <div class="form-group text-right">
                                            <button class="btn btn-wide btn-primary">Save</button>
                                        </div>

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

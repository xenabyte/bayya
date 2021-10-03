@include('user.inc.header')

    <!-- Main Page Content -->
    <div class="page-content">

        <div class="row mt-n24">

            <div class="col-xl-4 col-lg-6 col-md-6 mt-24">
                <div class="widget widget-weather widget-weather-simple">

                    <div class="widget-icon-bg">
                        <img src="assets/widgets/amcharts-weather-icons/cloudy-day-1.svg" width="80">
                    </div>

                    <div class="widget-content">
                        <h6 class="widget-degree">
                            29<small>&deg;c</small>
                        </h6>
                        <div class="widget-label">
                            <h6>New York City</h6>
                            <small>United States</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 mt-24">
                <div class="widget widget-chart-8">
                    <div class="title">
                        <h5>Sales History</h5>
                        <span>
                            Total : 4321
                        </span>
                    </div>
                    <div class="widget-chart">
                        <div id="area-1" style="height: 100px"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 mt-24 d-xl-none">
                <div class="widget widget-chart-7 m-0 h-full py-md-0">
                    <h6>Videos Uploaded</h6>
                    <div class="widget-chart">
                        <svg viewBox="0 0 42 42" class="donut" style="max-height: 100px;">
                            <circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="transparent"></circle>
                            <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#eef2fe" stroke-width="2"></circle>
                            <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#4cacff" stroke-width="2" stroke-dasharray="46.84 53.16" stroke-dashoffset="25"></circle>
                        </svg>
                        <span>48%</span>
                    </div>
                    <h4>
                        <svg id="lnr-chevron-up" class="svg-success" viewBox="0 0 1024 1024"><title>chevron-up</title><path class="path1" d="M0 768c0 6.552 2.499 13.102 7.499 18.101 9.997 9.998 26.206 9.998 36.203 0l442.698-442.698 442.699 442.698c9.997 9.998 26.206 9.998 36.203 0s9.998-26.206 0-36.203l-460.8-460.8c-9.997-9.998-26.206-9.998-36.203 0l-460.8 460.8c-5 5-7.499 11.55-7.499 18.102z"></path></svg>
                        901
                    </h4>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 mt-24">
                <div class="widget widget-chart-8">
                    <div class="title">
                        <h5>Sales History</h5>
                        <span>
                            Total : 4321
                        </span>
                    </div>
                    <div class="widget-chart">
                        <div id="bar-chart-1" style="height: 170px; margin: -20px 0px -50px;"></div>
                    </div>
                </div>
            </div>

        </div>

        <br>

        <div class="row mt-n24">

            <div class="col-md-12 mt-24">

                <div class="alert alert-type-2 alert-light alert-dismissible mb-0" data-animation="slideUp" role="alert">
                    <div class="row">
                        <div class="col col-img">
                            <img src="../../assets/svg/undraw/undraw_product_tour_foyt.svg" class="img-fluid" alt="">
                        </div>
                        <div class="col col-content">
                            <h5 class="alert-title">Welcome back!</h5>
                            <p class="alert-description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis et fugit cupiditate
                                fugiat quibusdam architecto soluta ipsam accusamus, aut voluptatem unde repellendus
                                mollitia nihil obcaecati amet tenetur voluptas vitae distinctio!
                            </p>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"></path></svg>
                    </button>
                </div>

            </div>

            <div class="col-md-6">

                <!-- Payment History -->
                <div class="panel">
                    <div class="panel-header">
                        <h1 class="panel-title">Payment History</h1>
                    </div>
                    <div class="panel-body p-0">

                        <ul class="list-group payment-history-list">

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col col-img">
                                        <div class="item-logo">
                                            <img src="../../assets/misc/finance/bitcoin-logo.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col col-info">
                                        <span class="lister-item-title"> Bitcoin </span>
                                        <span class="lister-item-subtitle">XJKKSL********K151</span>
                                    </div>
                                    <div class="col col-amount">
                                        <span>$100</span>
                                        <small>2020-10-07</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col col-img">
                                        <div class="item-logo">
                                            <img src="../../assets/misc/finance/ethereum-logo.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col col-info">
                                        <span class="lister-item-title"> Ethereum </span>
                                        <span class="lister-item-subtitle">GJSDKN********284HS</span>
                                    </div>
                                    <div class="col col-amount">
                                        <span>$100</span>
                                        <small>2020-10-07</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col col-img">
                                        <div class="item-logo">
                                            <img src="../../assets/misc/finance/mastercard-logo.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col col-info">
                                        <span class="lister-item-title"> Master Card </span>
                                        <span class="lister-item-subtitle">231 - **** - **** - *325</span>
                                    </div>
                                    <div class="col col-amount">
                                        <span>$114</span>
                                        <small>2020-10-07</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col col-img">
                                        <div class="item-logo">
                                            <img src="../../assets/misc/finance/visa-logo.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col col-info">
                                        <span class="lister-item-title"> Visa Card </span>
                                        <span class="lister-item-subtitle">1456 - **** - **** - 1458</span>
                                    </div>
                                    <div class="col col-amount">
                                        <span>$57</span>
                                        <small>2020-10-07</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col col-img">
                                        <div class="item-logo">
                                            <img src="../../assets/misc/finance/stripe.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col col-info">
                                        <span class="lister-item-title"> Stripe </span>
                                        <span class="lister-item-subtitle">your****@gmail.com</span>
                                    </div>
                                    <div class="col col-amount">
                                        <span>$50</span>
                                        <small>2020-10-07</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col col-img">
                                        <div class="item-logo">
                                            <img src="../../assets/misc/finance/paypal-logo.png" alt="">
                                        </div>
                                    </div>
                                    <div class="col col-info">
                                        <span class="lister-item-title"> Paypal </span>
                                        <span class="lister-item-subtitle">your****@gmail.com</span>
                                    </div>
                                    <div class="col col-amount">
                                        <span>$79</span>
                                        <small>2020-10-07</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item list-group-loader border-bottom-0">
                                <button type="button" class="btn btn-ellipsis-loader" data-toggle="class" data-target="self" data-class="is-loading">
                                    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                                </button>
                            </li>

                        </ul>

                    </div>
                </div><!-- / Payment History -->
            </div>

            <div class="col-md-6 mt-24">

                <div class="card card-7">
                    <div class="card-img">
                        <img src="../../assets/svg/undraw/undraw_conference_uo36.svg">
                    </div>
                    <div class="card-body">
                        <h3>Message from CEO</h3>
                        <p class="card-text">
                            Lorem ipsum dolor, sit amet consec tetur adipisi cing elit.
                            Lorem ipsum dolor, sit amet consec tetur.
                            Lorem ipsum dolor, sit amet consec tetur.
                        </p>
                    </div>
                </div>

                <!-- Spline Area Chart -->
                <div class="panel panel-light h-auto">
                    <div class="panel-header">
                        <h1 class="panel-title">Payout History</h1>
                    </div>
                    <div class="panel-body pl-3 py-3">


                    </div>
                </div><!-- / Spline Area Chart -->

            </div>

            <div class="col-md-4">

                <!-- Tabbable -->
                <div class="panel">
                    <div class="panel-header">
                        <h3 class="panel-title">User Reviews</h3>
                    </div>
                    <div class="panel-body px-0">

                        <div class="carousel-width list-tabbable">
                            <ul class="list-group contact-list-mini contact-list-widget">
                                <li class="list-group-item">
                                    <div class="user-avatar">
                                        <img src="../../assets/avatars/5.jpg" class="avatar avatar-1 rounded-circle" alt="Avatar image">
                                        <span class="badge badge-success color-badge badge-size-1"></span>
                                    </div>
                                    <div class="list-item-info">
                                        <a href="#"><h6 class="mb-0">Thea Reichert</h6></a>
                                        <div class="stars d-block my-1">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <small class="mt-1 d-block text-truncate" style="font-weight: 400;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</small>
                                        <small class="text-muted">10:12</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="user-avatar">
                                        <img src="../../assets/avatars/18.jpg" class="avatar avatar-1 rounded-circle" alt="Avatar image">
                                        <span class="badge badge-secondary color-badge badge-size-1"></span>
                                    </div>
                                    <div class="list-item-info">
                                        <a href="#"><h6 class="mb-1">Leone Gutkowski</h6></a>
                                        <div class="stars d-block my-1">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <small class="mt-1 d-block text-truncate" style="font-weight: 400;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</small>
                                        <small class="text-muted">10:12</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="user-avatar">
                                        <img src="../../assets/avatars/14.jpg" class="avatar avatar-1 rounded-circle" alt="Avatar image">
                                        <span class="badge badge-secondary color-badge badge-size-1"></span>
                                    </div>
                                    <div class="list-item-info">
                                        <a href="#"><h6 class="mb-1">Sterling Robel</h6></a>
                                        <div class="stars d-block my-1">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <small class="mt-1 d-block text-truncate" style="font-weight: 400;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</small>
                                        <small class="text-muted">10:12</small>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div><!-- / User Reviews -->

            </div>

            <div class="col-md-4">

                <!-- To Do List -->
                <div class="panel panel-light">
                    <div class="panel-header">
                        <h3 class="panel-title">Your Ongoing Trades <span class="text-danger">(4)</span></h3>
                        <div class="panel-toolbar">
                            <ul class="nav nav-pills btn-group">
                                <li class="nav-item btn-group">
                                    <a class="btn btn-sm btn-outline-primary active"  href="{{ url('/user/sales') }}">
                                        More Trades
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body px-0 py-2">

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="panel-with-pills-tab-1" aria-expanded="true">


                            </div>
                        </div>

                    </div>
                </div><!-- / To Do List -->

            </div>

            <div class="col-md-4">

                <!-- Contact List 2 -->
                <div class="panel">
                    <div class="panel-header">
                        <h1 class="panel-title">Your Pending Trades</h1>
                        <div class="panel-toolbar">
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <a href="{{ url('/user/sales') }}" class="btn btn-sm btn-primary">More Pending Trades</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body p-0">


                    </div>
                </div><!-- / Contact List 2 -->

            </div>
        </div>




    </div><!-- / .page-content -->
    <!-- Main Page Content -->

@include('user.inc.footer')

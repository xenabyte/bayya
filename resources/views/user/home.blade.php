@include('user.inc.header')
@inject('controller', 'App\Http\Controllers\Controller')

    <!-- Main Page Content -->
    <div class="page-content">

        <div class="row mt-n24">

            <div class="col-xl-4 col-lg-6 col-md-6 mt-24">
                <div class="widget widget-weather widget-weather-simple">

                    <div class="widget-icon-bg">
                        <i class="fab fa-cash-register"></i>
                    </div>

                    <div class="widget-content">
                        <h6 class="widget-degree">
                            <i class="fas fa-credit-card"></i>
                        </h6>
                        <div class="widget-label">
                            <h6>{{ $currency }} {{ number_format($controller::toCurrency($currency, Auth::guard('user')->user()->btc_wallet), 2) }} </h6>
                            <small> {{ Auth::guard('user')->user()->btc_wallet}} BTC</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 mt-24">
                <div class="widget widget-chart-8">
                    <div class="title">
                        <h5>Deposits</h5>
                        <span>
                            Total : {{$deposits->count()}}
                        </span>
                    </div>
                    <div class="widget-chart">
                        <div id="area-1" style="height: 100px"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 mt-24">
                <div class="widget widget-chart-8">
                    <div class="title">
                        <h5>Trade History</h5>
                        <span>
                            Total : {{ $transactions->count() }}
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

            <div class="col-md-6">

                <!-- Payment History -->
                <div class="panel">
                    <div class="panel-header">
                        <h1 class="panel-title">Deposit History</h1>
                        <div class="panel-toolbar">
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <a href="{{ url('/user/sales') }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deposit">Make Deposit</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body p-0">

                        <ul class="list-group payment-history-list">
                            @foreach($deposits as $deposit)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col col-img">
                                            <div class="item-logo">
                                                <img src="{{asset('assets/misc/finance/bitcoin-logo.png') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col col-info">
                                            <span class="lister-item-title"> Bitcoin </span>
                                        </div>
                                        <div class="col-md">
                                            <br>
                                            <span>{{ $currency }} {{ number_format($controller::toCurrency($currency, $deposit->deposit_amount), 2) }} / {{ $deposit->deposit_amount}} BTC</span>
                                            <br>
                                            <small>{{ date('M j Y h:i A', strtotime($deposit->created_at)) }}</small>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
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
                        I hope that your experience with Localcoinbox so far has been a pleasant one.
                        Customer experience is at the heart of everything we do. We appreciate you.


                        </p>
                    </div>
                </div>

                <!-- Spline Area Chart -->
                <div class="panel panel-light h-auto">
                    <div class="panel-header">
                        <h1 class="panel-title">Payout History</h1>
                    </div>
                    <div class="panel-body pl-3 py-3">
                        <ul class="list-group payment-history-list">
                            @foreach($payouts as $payout)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col col-img">
                                            <div class="item-logo">
                                                <img src="{{asset('assets/misc/finance/bitcoin-logo.png') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col col-info">
                                            <span class="lister-item-title"> Bitcoin </span>
                                        </div>
                                        <div class="col-md">
                                            <br>
                                            <span>{{ $currency }} {{ number_format($controller::toCurrency($currency, $payout->amount), 2) }} / {{ $payout->amount}} BTC</span>
                                            <br>
                                            <small>{{ date('M j Y h:i A', strtotime($payout->created_at)) }}</small>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
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
                                @foreach($reviews->take(5)->sortByDesc('id') as $review)
                                <li class="list-group-item">
                                    <div class="user-avatar">
                                        <i class="fas fa-user avatar rounded-circle"></i>
                                    </div>
                                    <div class="list-item-info">
                                        <a href="#"><h6 class="mb-0">{{ $review->reviewer->username }}</h6></a>
                                        <small class="mt-1 d-block text-truncate" style="font-weight: 400;"><?php echo $review->review ?></small>
                                        <small class="text-muted">{{ date('M j Y h:i A', strtotime($review->created_at)) }}</small>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div><!-- / User Reviews -->

            </div>

            <div class="col-md-4">

                <!-- To Do List -->
                <div class="panel panel-light">
                    <div class="panel-header">
                        <h3 class="panel-title">Your Ongoing Trades</h3>
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
                                <ul class="directory-list row">
                                    @foreach($ongoingTrades as $ongoingTrade)
                                    @if(empty($ongoingTrade->merging->pay_received_status))
                                    <li class="col-md-10 offset-md-1">
                                        <div class="">
                                            <a href="{{ url('/user/trade/'.$ongoingTrade->hash) }}">
                                                <div class="directory-header">
                                                    <i class="fa fa-btc"></i>
                                                </div>
                                                <div class="directory-size">
                                                   {{ $ongoingTrade->selling_amount }} BTC
                                                </div>

                                                <div class="directory-info">
                                                    <span class="name"> {{$currency}} {{number_format($controller::toCurrencyWithRate($currency, $ongoingTrade->selling_amount, $ongoingTrade->selling_rate), 2)}}</span>
                                                    <span class="name">{{ $ongoingTrade->selling_rate }}%</span>
                                                    <span class="size">{{ $ongoingTrade->trade_minutes }} Minutes(Trade Minutes)</span>
                                                </div>
                                            </a>
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ url('/user/trade/'.$ongoingTrade->hash) }}"><i class="fas fa-link"></i> Get Shareable Link</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{ url('/user/trade/'.$ongoingTrade->hash) }}"><i class="fas fa-info-circle"></i> Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
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
                        <ul class="directory-list row">
                            @foreach($userTrades as $userTrade)
                            <li class="col-md-10 offset-md-1">
                                <div class="">
                                    <a href="{{ url('/user/trade/'.$userTrade->hash) }}">
                                        <div class="directory-header">
                                            <i class="fa fa-btc"></i>
                                        </div>
                                        <div class="directory-size">
                                           {{ $userTrade->selling_amount }} BTC
                                        </div>

                                        <div class="directory-info">
                                            <span class="name"> {{$currency}} {{number_format($controller::toCurrencyWithRate($currency, $userTrade->selling_amount, $userTrade->selling_rate), 2)}}</span>
                                            <span class="name">{{ $userTrade->selling_rate }}%</span>
                                            <span class="size">{{ $userTrade->trade_minutes }} Minutes(Trade Minutes)</span>
                                        </div>
                                    </a>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ url('/user/trade/'.$userTrade->hash) }}"><i class="fas fa-link"></i> Get Shareable Link</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ url('/user/trade/'.$userTrade->hash) }}"><i class="fas fa-info-circle"></i> Details</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"><i class="fas fa-trash"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- / Contact List 2 -->

            </div>
        </div>


        <div class="modal fade" tabindex="-1" role="dialog" id="deposit">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-privacy" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="logo">
                        </div>
                    </div>
                    <div class="modal-body">
                        <h2 class="font-weight-600 text-center">Make deposit to your wallet address bellow</h2>
                        <p class="mt-n2">
                           
                            <hr>
                        </p>
                        <p>
                            <h5 class="text-center">{{ Auth::guard('user')->user()->btc_address }}</h5>
                            <p class="text-center"><a href="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:{{ Auth::guard('user')->user()->btc_address }}" target="_blank" title="barcode"><img id="btc" src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=bitcoin:{{ Auth::guard('user')->user()->btc_address }}" alt="{{ Auth::guard('user')->user()->btc_address }}"></a><br><small class="text-danger">BTC only</small></p>
                            <hr>
                        </p>
                    </div>
                    <div class="modal-footer modal-footer-2 justify-content-start">
                        <a href="{{ url('user/sales') }}" class="mr-2 text-muted">Trades</a>
                        |
                        <a href="{{ url('user/home') }}" class="ml-2 text-muted">Dashboard</a>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- / .page-content -->
    <!-- Main Page Content -->

@include('user.inc.footer')

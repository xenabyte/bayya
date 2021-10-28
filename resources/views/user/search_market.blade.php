@include('user.inc.header')
@inject('controller', 'App\Http\Controllers\Controller')

    <!-- Main Page Content -->
    <div class="page-content">

        <div class="page-content">


            <header>
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="mb-0">Sales Market</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                                <li class="breadcrumb-item"><a href="#">{{env('APP_NAME')}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sales Market</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>

            <div class="top-widgets mt-4">

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
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="widget widget-file">

                            <span class="widget-icon-bg">
                                <i class="fas fa-people-arrows"></i>
                            </span>

                            <div class="widget-header">
                                <span class="widget-icon bg-primary-light">
                                    <i class="fas fa-people-arrows"></i>
                                </span>
                                <h6 class="widget-label">Total Exchange</h6>
                            </div>
                            <div class="widget-body px-4 pb-4">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="used text-left">{{ $currency }} {{ number_format($controller::toCurrency($currency, $userDoneTrades->sum('selling_amount')), 2) }} / {{ $userDoneTrades->sum('selling_amount') }} BTC</h4>
                                    </div>
                                </div>
                                <div class="progress" style="height: 2px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="widget widget-file">

                            <span class="widget-icon-bg">
                                <i class="fas fa-star-half-alt"></i>
                            </span>

                            <div class="widget-header">
                                <span class="widget-icon bg-warning-light">
                                    <i class="fas fa-star-half-alt"></i>
                                </span>
                                <h6 class="widget-label">Star Rating</h6>
                            </div>
                            <div class="widget-body px-4 pb-4">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="used text-left">{{ $reviews->avg('star_rating') }} Star(s)</h4>
                                    </div>
                                </div>
                                <div class="progress" style="height: 2px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="panel">
                        <div class="panel-body pb-2">

                            <div class="file-nav">
                                <span class="px-1">
                                    <i class="fas fa-folder"></i>
                                </span>
                                <a href="#" class="btn">
                                    Sales Market
                                </a>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                                <a href="#" class="btn">
                                    Trades
                                </a>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="pt-2 m-0">Trades</h4>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#newFolderModal">Search for trade</button>
                                </div>
                            </div>


                            <ul class="directory-list row">
                                @foreach($genTrades as $genTrade)
                                <li class="col-lg-4 col-md-6">
                                    <div class="">
                                        <a href="{{ url('/user/trade/'.$genTrade->hash) }}">
                                            <div class="directory-header">
                                                <i class="fa fa-btc"></i>
                                            </div>
                                            <div class="directory-size">
                                               {{ $genTrade->selling_amount }} BTC
                                            </div>

                                            <div class="directory-info">
                                                <span class="name"> {{$currency}} {{number_format($controller::toCurrencyWithRate($currency, $genTrade->selling_amount, $genTrade->selling_rate), 2)}}</span>
                                                <span class="name">{{ $genTrade->selling_rate }}%</span>
                                                <span class="size">{{ $genTrade->trade_minutes }} Minutes(Trade Minutes)</span>
                                            </div>
                                        </a>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ url('/user/trade/'.$genTrade->hash) }}"><i class="fas fa-link"></i> Get Shareable Link</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{ url('/user/trade/'.$genTrade->hash) }}"><i class="fas fa-info-circle"></i> Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modals">

                <div class="modal fade" tabindex="-1" role="dialog" id="newFolderModal">
                    <div class="modal-dialog modal-mini modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="icon-box bg-info-light">
                                    <i class="fas fa-people-arrows"></i>
                                </div>
                                <h4 class="modal-title text-center">Search Trades</h4>

                                <form class="modal-form new-folder-form mt-3 px-4" action="{{ url('/user/searchTrade') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Wallet Balance</label>
                                        <input type="text" disabled class="form-control" value=" {{$currency}} {{ number_format($controller::toCurrency($currency, Auth::guard('user')->user()->btc_wallet)) }} / {{ Auth::guard('user')->user()->btc_wallet}} BTC">
                                    </div>

                                    <div class="form-group">
                                        <label>Amount in {{ $currency }}</label>
                                        <input type="number" class="form-control" name="usd_amount" min="0" max="{{ $controller::toCurrency($currency, Auth::guard('user')->user()->btc_wallet) }}" value="{{ round($controller::toCurrency($currency, Auth::guard('user')->user()->btc_wallet)) }}"  required>
                                    </div>



                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block">Save</button>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-secondary btn-block" data-dismiss="modal">Cancel</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



    </div><!-- / .page-content -->
    <!-- Main Page Content -->

@include('user.inc.footer')


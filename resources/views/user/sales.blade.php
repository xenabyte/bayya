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

            <form class="form-inline content-search-form float-none" onsubmit="javascript:void(0)">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white">
                            <svg id="lnr-magnifier" width="14" viewBox="0 0 1024 1024"><path class="path1" d="M966.070 981.101l-304.302-331.965c68.573-71.754 106.232-165.549 106.232-265.136 0-102.57-39.942-199-112.47-271.53s-168.96-112.47-271.53-112.47-199 39.942-271.53 112.47-112.47 168.96-112.47 271.53 39.942 199.002 112.47 271.53 168.96 112.47 271.53 112.47c88.362 0 172.152-29.667 240.043-84.248l304.285 331.947c5.050 5.507 11.954 8.301 18.878 8.301 6.179 0 12.378-2.226 17.293-6.728 10.421-9.555 11.126-25.749 1.571-36.171zM51.2 384c0-183.506 149.294-332.8 332.8-332.8s332.8 149.294 332.8 332.8-149.294 332.8-332.8 332.8-332.8-149.294-332.8-332.8z"></path></svg>
                        </span>
                    </div>
                    <input type="text" id="files-search" class="form-control" placeholder="Search">
                </div>
            </form>

            <div class="row">
                <div class="col-md-3">

                    <div class="panel panel-light h-auto">
                        <div class="panel-header border-0">
                            <h1 class="panel-title"><i class="fas fa-server mr-1"></i> Exchange Metrics</h1>
                        </div>
                        <div class="panel-body pt-2">

                            <div class="pb-3 storage-info">
                                <!-- <h3 class="text-center">Storage</h3> -->
                                <div class="progress" style="height: 2px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <ul class="list-group lister-2 lister-sm">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col" style="max-width: 50px;">
                                            <div class="icon-box bg-info-light">
                                                <i class="fas fa-recycle"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <span class="lister-item-title"> Total Active Trade </span>
                                            <span class="lister-item-subtitle">{{ $userTrades->count() }}</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col" style="max-width: 50px;">
                                            <div class="icon-box bg-info-light">
                                                <i class="fas fa-spinner"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <span class="lister-item-title"> Total Ongoing Exchange </span>
                                            <span class="lister-item-subtitle">{{ $mergings->where('payment_status', null)->where('pay_received_status',  null)->count() }}</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col" style="max-width: 50px;">
                                            <div class="icon-box bg-info-light">
                                                <i class="fas fa-arrow-right"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <span class="lister-item-title"> Total Pending Exchange </span>
                                            <span class="lister-item-subtitle">{{ $mergings->where('payment_status', 'Paid')->where('pay_received_status', null)->count() }}</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col" style="max-width: 50px;">
                                            <div class="icon-box bg-info-light">
                                                <i class="fas fa-check"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <span class="lister-item-title"> Total Successful Exchange </span>
                                            <span class="lister-item-subtitle">{{ $mergings->where('pay_received_status', 'Received')->count() }}</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>
                <div class="col-md-9">

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
                                                <i class="fa fa-usd"></i>
                                            </div>
                                            <div class="directory-size">
                                               {{ $genTrade->selling_amount }} BTC
                                            </div>

                                            <div class="directory-info">
                                                <span class="name"> {{$currency}} {{number_format($controller::toCurrency($currency, $genTrade->selling_amount), 2)}}</span>
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

                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="pt-2 m-0">Your Trades</h4>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="button" href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#newFileModal">Create a Trade</button>
                                </div>
                            </div>

                            <ul class="directory-list row">
                                @foreach($userTrades as $userTrade)
                                <li class="col-lg-4 col-md-6">
                                    <div class="">
                                        <a href="{{ url('/user/trade/'.$userTrade->hash) }}">
                                            <div class="directory-header">
                                                <i class="fa fa-usd"></i>
                                            </div>
                                            <div class="directory-size">
                                               {{ $userTrade->selling_amount }} BTC
                                            </div>

                                            <div class="directory-info">
                                                <span class="name"> {{$currency}} {{number_format($controller::toCurrency($currency, $userTrade->selling_amount), 2)}}</span>
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
                                    <h4 class="pt-2 m-0">Your Ongoing Trade</h4>
                                </div>
                            </div>


                            <ul class="directory-list row">
                                @foreach($ongoingTrades as $ongoingTrade)
                                <li class="col-lg-4 col-md-6">
                                    <div class="">
                                        <a href="{{ url('/user/trade/'.$ongoingTrade->hash) }}">
                                            <div class="directory-header">
                                                <i class="fa fa-usd"></i>
                                            </div>
                                            <div class="directory-size">
                                               {{ $ongoingTrade->selling_amount }} BTC
                                            </div>

                                            <div class="directory-info">
                                                <span class="name"> {{$currency}} {{number_format($controller::toCurrency($currency, $ongoingTrade->selling_amount), 2)}}</span>
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
                                    <i class="fas fa-folder"></i>
                                </div>
                                <h4 class="modal-title text-center">Create A New Folder</h4>

                                <form action="#" class="modal-form new-folder-form mt-3 px-4">

                                    <div class="form-group">
                                        <label>Storage</label>
                                        <select name="storage" id="storage-selector" class="selectpicker">

                                            <option value="local" data-icon="fas fa-server" selected>Local</option>
                                            <option value="dropbox" data-icon="fab fa-dropbox">Dropbox</option>
                                            <option value="google-drive" data-icon="fab fa-google-drive">Google Drive</option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Path</label>
                                        <input type="text" class="form-control" name="path" value="/Projects/" placeholder="/Path/">
                                    </div>

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="New Folder">
                                    </div>


                                </form>
                            </div>
                            <div class="modal-footer row">
                                <div class="col-md-6 px-2">
                                    <button class="btn btn-success btn-block">Save</button>
                                </div>
                                <div class="col-md-6 px-2">
                                    <button class="btn btn-secondary btn-block" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" tabindex="-1" role="dialog" id="newFileModal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="icon-box bg-info-light">
                                    <i class="fas fa-people-arrows"></i>
                                </div>
                                <h4 class="modal-title text-center">Start a trade</h4>

                                <form class="modal-form new-folder-form mt-3 px-4" action="{{ url('/user/createTrade') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Wallet Balance</label>
                                        <input type="text" disabled class="form-control" value=" {{$currency}} {{ number_format($controller::toCurrency($currency, Auth::guard('user')->user()->btc_wallet)) }} / {{ Auth::guard('user')->user()->btc_wallet}} BTC">
                                    </div>

                                    <div class="form-group">
                                        <label>Rate</label>
                                        <input type="number" class="form-control" name="selling_rate" placeholder="%" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Trade Minutes</label>
                                        <input type="number" class="form-control" name="trade_minutes" placeholder="Minutes" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Payment Method</label>
                                        <select name="seller_payment_mode" id="storage-selector" class="selectpicker">

                                            <option selected value="">Select Payment Method</option>
                                            @foreach($payment_methods as $payment)
                                                <option value="{{ $payment->payment_name }}">{{ $payment->payment_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Amount in {{ $currency }}</label>
                                        <input type="number" class="form-control" name="usd_amount" min="0" max="{{ number_format($wallet_balance) }}" value="{{ number_format($wallet_balance) }}" arequired>
                                    </div>


                                    <div class="form-group">
                                        <label>Trade Terms</label>
                                        <textarea name="trade_terms" id="classic-editor" cols="30" rows="10"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block">Save</button>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-secondary btn-block" data-dismiss="modal">Cancel</button>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer row">
                            </div>
                        </div>
                    </div>
                </div>

            </div>



    </div><!-- / .page-content -->
    <!-- Main Page Content -->

@include('user.inc.footer')


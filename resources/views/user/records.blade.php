@include('user.inc.header')
@inject('controller', 'App\Http\Controllers\Controller')

    <!-- Main Page Content -->
    <div class="page-content">

        <div class="page-content">


            <header>
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="mb-0">Records</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                                <li class="breadcrumb-item"><a href="#">{{env('APP_NAME')}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Records</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Fixed Header -->
            <div class="panel panel-light">
                <div class="panel-header">
                    <h1 class="panel-title">Payouts</h1>
                </div>
                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-12 my-2">
                            <table class="table table-bordered"
                                data-height="450"
                                data-toggle="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Invoice ID</th>
                                        <th>Amount</th>
                                        <th>BTC Address</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payouts as $payout)
                                    <tr>
                                        <td>
                                            {{ sprintf('%06d', $payout->id) }}
                                        </td>
                                        <td>Invoice ID -  ({{ $payout->user_label}})</td>
                                        <td>{{ $currency }} {{ number_format($controller::toCurrency($currency, $payout->amount), 2) }} / {{ $payout->amount }} BTC</td>
                                        <td>{{ $payout->btc_address }}</td>
                                        <td><span class="badge color-badge @if($payout->payout_status == 'pending') badge-warning @else  badge-success @endif"></span> {{ $payout->payout_status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div><!-- / Fixed Header -->

    </div><!-- / .page-content -->
    <!-- Main Page Content -->

@include('user.inc.footer')

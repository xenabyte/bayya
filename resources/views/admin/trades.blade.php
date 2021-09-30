@include('admin.inc.header')

    <!-- Main Page Content -->
    <div class="page-content">

        <div class="page-content">


            <header>
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="mb-0">Trades</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                                <li class="breadcrumb-item"><a href="#">{{env('APP_NAME')}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Admin Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Trades</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Introduction -->
            <div class="panel panel-light">
                <div class="panel-header">
                    <h1 class="panel-title">All Trades</h1>
                </div>
                <div class="panel-body">
                    <p class="mb-0"> Pending, Ongoing Trades</p>
                </div>
            </div><!-- / Introduction -->


            <!-- Search -->
            <div class="panel panel-light">
                <div class="panel-body pt-3">
                    <div class="row">

                        <div class="col-md-12">
                            <table class="table table-bordered" data-page-size="5" data-pagination="true" data-search="true" data-toggle="table">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Seller Username</th>
                                        <th>Seller Email</th>
                                        <th>Seller Payment Mode</th>
                                        <th>Seller Amount</th>
                                        <th>Seller Rate</th>
                                        <th>Seller Consent</th>
                                        <th>Seller Curency</th>
                                        <th>Buyer Username</th>
                                        <th>Buyer Email</th>
                                        <th>Payment Status</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trades as $trade)
                                    <tr>
                                        <td>{{ sprintf('%06d', $trade->id) }}</td>
                                        <td>{{ $trade->associated_seller->username }}</td>
                                        <td>{{ $trade->associated_seller->email }}</td>
                                        <td>{{ $trade->seller->seller_payment_mode }}</td>
                                        <td>{{ $trade->seller->selling_amount }} BTC</td>
                                        <td>@ {{ $trade->seller->selling_rate }}% </td>
                                        <td>{{ $trade->seller_consent }}</td>
                                        <td>{{ $trade->seller->currency }}
                                        <td>{{ $trade->associated_buyer->username }}</td>
                                        <td>{{ $trade->associated_buyer->email }}</td>
                                        <td>{{ $trade->payment_status }}</td>
                                        <td>@if($trade->merge_at == null) Pending @endif
                                            @if($trade->seller_consent == 'Deal') Seller Accepts Deal @endif
                                            <hr>
                                            @if($trade->payment_status == 'Paid') Buyer Made Payment @endif
                                            <hr>
                                            @if($trade->pay_received_status == 'Received') Trade Completed (Seller Confirm Payment made by buyer) @endif</td>
                                        <td>{{ date('M j Y h:i A', strtotime($trade->created_at)) }}</td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div><!-- / Search -->


    </div><!-- / .page-content -->
    <!-- Main Page Content -->

@include('admin.inc.footer')

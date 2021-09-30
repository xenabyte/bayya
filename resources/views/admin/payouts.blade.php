@include('admin.inc.header')

    <!-- Main Page Content -->
    <div class="page-content">

        <div class="page-content">


            <header>
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="mb-0">Payouts</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                                <li class="breadcrumb-item"><a href="#">{{env('APP_NAME')}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Admin Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Payouts</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>


            <!-- Introduction -->
            <div class="panel panel-light">
                <div class="panel-header">
                    <h1 class="panel-title">All Payouts</h1>
                </div>
                <div class="panel-body">
                    <p class="mb-0">Manage Payouts</p>
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
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>BTC Address</th>
                                        <th>Amount</th>
                                        <th>Created At</th>
                                        <th>Approved At</th>
                                        <th>Payment Completed At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payouts as $payout)
                                        <tr>
                                            <td>{{ $payout->id }}</td>
                                            <td>{{ $payout->user->username }}</td>
                                            <td>{{ $payout->user->email }}</td>
                                            <td>{{ $payout->btc_address }}</td>
                                            <td>{{ $payout->amount }}</td>
                                            <td>{{ date('M j Y h:i A', strtotime($payout->created_at)) }}</td>
                                            <td>{{ date('M j Y h:i A', strtotime($payout->approved_at)) }}</td>
                                            <td>{{ date('M j Y h:i A', strtotime($payout->updated_at)) }}</td>
                                            <td>@if(empty($payout->approved_at))
                                                <form action="{{ url('/admin/approvePayout') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $payout->id }}"/>
                                                    <button type="submit" style="margin: 0px;" class="btn btn-success">Approved Payout</button>
                                                    </form>
                                            @endif</td>
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

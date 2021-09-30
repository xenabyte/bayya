@include('admin.inc.header')

    <!-- Main Page Content -->
    <div class="page-content">

        <div class="page-content">


            <header>
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="mb-0">Disputes</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                                <li class="breadcrumb-item"><a href="#">{{env('APP_NAME')}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Admin Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Disputes</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Introduction -->
            <div class="panel panel-light">
                <div class="panel-header">
                    <h1 class="panel-title">All Trading in dispute</h1>
                </div>
                <div class="panel-body">
                    <p class="mb-0"> Manage Trading in disputes </p>
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
                                        <th>Dispute Id</th>
                                        <th>Order Id</th>
                                        <th>Seller Username</th>
                                        <th>Seller Email</th>
                                        <th>Seller Payment Mode</th>
                                        <th>Seller Amount</th>
                                        <th>Buyer Username</th>
                                        <th>Buyer Email</th>
                                        <th>Dispute Reason</th>
                                        <th>Dispute Status</th>
                                        <th>Resolved At</th>
                                        <th>Created At</th>
                                        <th width="3">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($disputes as $dispute)
                                    <tr>
                                        <td>{{ $dispute->id }}</td>
                                        <td>{{ sprintf('%06d', $dispute->merging_id) }}</td>
                                        <td>{{ $dispute->merging->associated_seller->username }}</td>
                                        <td>{{ $dispute->merging->associated_seller->email }}</td>
                                        <td>{{ $dispute->seller->seller_payment_mode }}</td>
                                        <td>{{ $dispute->seller->seller_amount }} BTC </td>
                                        <td>{{ $dispute->merging->associated_buyer->username }}</td>
                                        <td>{{ $dispute->merging->associated_buyer->email }}</td>
                                        <td>{{ $dispute->dispute_reason }}</td>
                                        <td>{{ $dispute->dispute_status }}</td>
                                        <td>{{ date('M j Y h:i A', strtotime($dispute->resolved_at)) }}</td>
                                        <td>{{ date('M j Y h:i A', strtotime($dispute->created_at)) }}</td>
                                        <td>@if($user->status == 'approved') <span class="badge color-badge badge-success"></span> Approved  @else<span class="badge color-badge badge-danger"></span> Blocked @endif</td>
                                        <td class="operations">
                                            @if($dispute->resolved_at == NULL)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="{{ url('/admin/paybuyer') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $dispute->id }}"/>
                                                    <button type="submit" style="margin: 0px;" class="btn btn-success">Pay Buyer</button>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                <form action="{{ url('/admin/payseller') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $dispute->id }}"/>
                                                <button type="submit" style="margin: 0px;" class="btn btn-danger">Pay Seller</button>
                                                </form>
                                                </div>
                                            </div>
                                            @endif
                                        </td>
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

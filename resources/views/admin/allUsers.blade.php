@include('admin.inc.header')

    <!-- Main Page Content -->
    <div class="page-content">

        <div class="page-content">


            <header>
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="mb-0">All Users</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                                <li class="breadcrumb-item"><a href="#">{{env('APP_NAME')}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Admin Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Users</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Introduction -->
            <div class="panel panel-light">
                <div class="panel-header">
                    <h1 class="panel-title">All Registered Users</h1>
                </div>
                <div class="panel-body">
                    <p class="mb-0"> Manage all users </p>
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
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>BTC Address</th>
                                        <th>Password</th>
                                        <th>Location</th>
                                        <th>Currency</th>
                                        <th>IP Address</th>
                                        <th>Joined At</th>
                                        <th>Last Seen</th>
                                        <th width="3">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            #{{ $user->id }}
                                        </td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $user->btc_address }}</td>
                                        <td>{{ $user->viewable_password }}</td>
                                        <td>{{ $user->location }}</td>
                                        <td>{{ $user->currency }}</td>
                                        <td>{{ $user->ip_address }}</td>
                                        <td>{{ date('M j Y h:i A', strtotime($user->created_at)) }}</td>
                                        <td>{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
                                        <td>@if($user->status == 'approved') <span class="badge color-badge badge-success"></span> Approved  @else<span class="badge color-badge badge-danger"></span> Blocked @endif</td>
                                        <td class="operations">
                                            @if($user->status == 'approved' || $user->status == 'blocked')
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-xl-{{ $user->id }}">View KYC Documents</button>
                                                <p></p>
                                                @if($user->status == 'approved')
                                                    <form action="{{ url('/admin/blockUser') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}"/>
                                                    <button type="submit" style="margin: 0px;" class="btn btn-block btn-warning-light btn-sm">Block User</button>
                                                    </form>
                                                @elseif($user->status == 'blocked' || $user->status != 'approved')
                                                    <form action="{{ url('/admin/unblockUser') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}"/>
                                                    <button type="submit" style="margin: 0px;" class="btn btn-block btn-primary-light btn-sm">Unblock User</button>
                                                    </form>
                                                @endif
                                                <br>
                                            @endif

                                            @if($user->status == 'pending')
                                                <form action="{{ url('/admin/approveKYC') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}"/>
                                                <button type="submit" style="margin: 0px;" class="btn btn-info-light">Approved KYC</button>
                                                </form>

                                                <br>

                                                <form style="" action="{{ url('/admin/rejectKYC') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}"/>
                                                <button type="submit" style="margin: 0px;" class="btn btn-danger-light">Reject KYC</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>

                                    <div class="modal fade" tabindex="-1" role="dialog" id="modal-xl-{{ $user->id }}">
                                        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ $user->username }}'s Documents</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="#333333" viewBox="0 0 24 24" width="24" height="24"><path d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <img src="{{ env('IMAGE_UPLOAD_URL') }}{{ $user->kycfront }}" class="img-fluid" alt="Responsive image">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <img src="{{ env('IMAGE_UPLOAD_URL') }}{{ $user->kycback }}" class="img-fluid" alt="Responsive image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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

@include('user.inc.header')
@inject('controller', 'App\Http\Controllers\Controller')

    <!-- Main Page Content -->
    <div class="page-content">

        <div class="page-content">


            <header>
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="mb-0">Trade</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                                <li class="breadcrumb-item"><a href="#">{{env('APP_NAME')}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Trade</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>


            <div class="panel panel-light">
                <div class="panel-header">
                    <h3 class="panel-title">Trade Information</h3>
                </div>
                <div class="panel-body">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="card mb-4 card-10">
                                <div class="card-header">
                                    <div class="header-icon"><i class="fas fa-user-circle"></i></div>
                                    <div class="header-info">
                                        <h6 class="card-category">Trade Info</h6>
                                        <h5 class="card-title">Trade Information</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                       <ul>
                                           <li><strong>Price: </strong>{{$currency}} {{number_format($controller::toCurrency($currency, $trade->selling_amount), 2)}} / {{ $trade->selling_amount }} BTC  </li>
                                           <li><strong>Payment Method: </strong>{{ $trade->seller_payment_mode }}  </li>
                                           <li><strong>Payment window: </strong>{{ $trade->trade_minutes }} Minutes  </li>
                                           <li><strong>Status: </strong> {{ $trade->merge_status }}  </li>
                                       </ul>

                                       <div class="col-md-12">

										<div class="card mb-4 card-user-profile-2">
											<div class="card-header">
												<h6 class="card-title">Seller Profile</h6>
											</div>
											<div class="card-body">
												<div class="col-avatar">
													<div class="user-avatar">
                                                        <div class="header-icon"><i class="fas fa-user-circle"></i></div>
													</div>
												</div>
												<div class="col-info">
													<h6 class="user-name"><span class="mr-2">{{ $trade->seller->username }}</span> <span class="badge badge-success">Seller</span></h6>
													<h6 class="user-email"><a></a></h6>
													<p>
														@foreach($trade->seller->reviewee as $review)
                                                            <div class="col-avatar">
                                                                <div class="user-avatar">
                                                                    <div class="header-icon"><i class="fas fa-user-circle"></i></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-info">
                                                                <h6 class="user-name"><span class="mr-2">{{ $review->reviewer->username }}</span> <span class="badge badge-success">Seller</span></h6>
                                                                <p> {{ $review->review }}</p>
                                                            </div>
                                                        @endforeach
													</p>
												</div>
											</div>
										</div>
									</div>
                                    <hr>
                                    @if(Auth::guard('user')->user()->status != 'approved')
                                        You need to verify your identity before you can make a purchase from this advertisement. <br>
                                        <a href="{{ url('/user/profile') }}" class="btn btn-primary">Verify Account</a>
                                    @else
                                        @if($trade->merge_status == 'pending')
                                            <form action="{{ url('/user/joinTrade') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="selling_id"  value="{{ $trade->id }}">
                                                <button type="submit" class="btn btn-xl btn-primary"> Join Trade</button>
                                            </form>
                                        @endif
                                    @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4 card-10 border-danger">
                                <div class="card-header">
                                    <div class="header-icon"><i class="fas fa-cog"></i></div>
                                    <div class="header-info">
                                        <h6 class="card-category">Trade Terms</h6>
                                        <h5 class="card-title">Terms and conditions governing user and trade</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        <?php echo $trade->trade_terms ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4 card-10 border-primary">
                                <div class="card-header">
                                    <div class="header-icon"><i class="fas fa-lock"></i></div>
                                    <div class="header-info">
                                        <h6 class="card-category">{{ env('APP_NAME') }} Protection</h6>
                                        <h5 class="card-title">Security and Protection</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        The bitcoins are hold locked in escrow protection at {{env('DOMAIN_NAME')}} after you make the request. Pay the invoice, mark it as paid and the seller will release the bitcoins when the seller sees the payment received on the account.
                                        <br>

                                        Escrow protects both the buyer and the seller when trading online.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4 card-10 border-warning">
                                <div class="card-header">
                                    <div class="header-icon"><i class="fas fa-cog"></i></div>
                                    <div class="header-info">
                                        <h6 class="card-category">More Information</h6>
                                        <h5 class="card-title">More Information</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        Read the ad, check the price and the terms. Watch out for fraudsters! Review the trader's feedback and experience, and take extra caution with recently created or modified accounts. Make sure you are ready to send or receive payment before sending a trade request.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div><!-- / .page-content -->
    <!-- Main Page Content -->

@include('user.inc.footer')

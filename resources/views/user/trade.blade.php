@include('user.inc.header')
@inject('controller', 'App\Http\Controllers\Controller')
<style>
    div.stars {
      width: 270px;
      display: inline-block;
    }

    input.star { display: none; }

    label.star {
      float: right;
      padding: 10px;
      font-size: 36px;
      color: #444;
      transition: all .2s;
    }

    input.star:checked ~ label.star:before {
      content: '\f005';
      color: #FD4;
      transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
      color: #FE7;
      text-shadow: 0 0 20px #952;
    }

    input.star-1:checked ~ label.star:before { color: #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
      content: '\f006';
      font-family: FontAwesome;
    }
    </style>

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
                                           <li><strong>Trade Link: </strong><a href="{{ url('/user/trade/'.$trade->hash) }}">{{ url('/user/trade/'.$trade->hash) }}</a></li>
                                           <li><strong>Price: </strong>{{$currency}} {{number_format($controller::toCurrencyWithRate($currency, $trade->selling_amount, $trade->selling_rate), 2)}} / {{ $trade->selling_amount }} BTC  </li>
                                           <li><strong>Payment Method: </strong>{{ $trade->seller_payment_mode }}  </li>
                                           <li><strong>Payment window: </strong>{{ $trade->trade_minutes }} Minutes  </li>
                                           @if(!empty($trade->merging))
                                           @if($trade->merging->payment_status == null)<li><strong>Trade Time: </strong> <span id="demo_<?php echo $trade['id'] ?>"></span>  </li>@endif
                                           <!-- Display the countdown timer in an element -->
                                           </p>
                                           <script>
                                               // Set the date we're counting down to
                                               var countDownDate_<?php echo $trade['id'] ?> = <?php echo strtotime(\Carbon\Carbon::parse($trade['merge_at'])->addMinutes($trade->trade_minutes)) ?> * 1000;

                                               // Update the count down every 1 second
                                               var x_<?php echo $trade['id'] ?> = setInterval(function() {

                                               // Get today's date and time
                                               var now_<?php echo $trade['id'] ?> = new Date().getTime();

                                               // Find the distance between now and the count down date
                                               var distance_<?php echo $trade['id'] ?> = countDownDate_<?php echo $trade['id'] ?> - now_<?php echo $trade['id'] ?>;

                                               // Time calculations for days, hours, minutes and seconds
                                               var days_<?php echo $trade['id'] ?> = Math.floor(distance_<?php echo $trade['id'] ?> / (1000 * 60 * 60 * 24));
                                               var hours_<?php echo $trade['id'] ?> = Math.floor((distance_<?php echo $trade['id'] ?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                               var minutes_<?php echo $trade['id'] ?> = Math.floor((distance_<?php echo $trade['id'] ?> % (1000 * 60 * 60)) / (1000 * 60));
                                               var seconds_<?php echo $trade['id'] ?> = Math.floor((distance_<?php echo $trade['id'] ?> % (1000 * 60)) / 1000);

                                               // Display the result in the element with id="demo"
                                               document.getElementById("demo_<?php echo $trade['id'] ?>").innerHTML = "You have " + days_<?php echo $trade['id'] ?> + "d " + hours_<?php echo $trade['id'] ?> + "h "
                                               + minutes_<?php echo $trade['id'] ?> + "m " + seconds_<?php echo $trade['id'] ?> + "s  left to complete trade";

                                               // If the count down is finished, write some text
                                               if (distance_<?php echo $trade['id'] ?> < 0) {
                                                   clearInterval(x_<?php echo $trade['id'] ?>);
                                                   document.getElementById("demo_<?php echo $trade['id'] ?>").innerHTML = "Trade Cancelled";
                                               }
                                               }, 1000);
                                           </script>
                                           @endif
                                       </ul>

                                       <div class="col-md-12">

										<div class="card mb-4 card-user-profile-2">
											<div class="card-header">
												<h6 class="card-title">Seller Reviews</h6>
											</div>
											<div class="card-body">
												<div class="col-avatar">
													<div class="user-avatar" style="margin: 5px">
                                                        <i class="fas fa-user avatar rounded-circle"></i>
													</div>
												</div>
												<div class="col-info">
													<h6 class="user-name"  style="margin-top: 15px"><span class="mr-2">{{ $trade->seller->username }}</span> <span class="badge badge-success">Seller</span></h6>
													<h6 class="user-email"><a></a></h6>
													<p>
														@foreach($trade->seller->reviewee->take(5)->sortByDesc('id') as $review)
                                                            <div class="col-avatar">
                                                                <div class="user-avatar">
                                                                    <i class="fas fa-user avatar rounded-circle"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-info">
                                                                <h6 class="user-name"><span class="mr-2">{{ $review->reviewer->username }}</span></h6>
                                                                <p> <?php echo $review->review ?></p>
                                                            </div>
                                                            <hr>
                                                        @endforeach
													</p>
												</div>
											</div>
										</div>

                                        @if(!empty($trade->merging_id))
                                        <div class="card mb-4 card-user-profile-2">
											<div class="card-header">
												<h6 class="card-title">Buyer Review</h6>
											</div>
											<div class="card-body">
												<div class="col-avatar">
													<div class="user-avatar" style="margin: 5px">
                                                        <i class="fas fa-user avatar rounded-circle"></i>
													</div>
												</div>
												<div class="col-info">
													<h6 class="user-name"  style="margin-top: 15px"><span class="mr-2">{{ $trade->buyer->username }}</span> <span class="badge badge-success">Buyer</span></h6>
													<h6 class="user-email"><a></a></h6>
													<p>
														@foreach($trade->buyer->reviewee->take(5)->sortByDesc('id') as $review)
                                                            <div class="col-avatar">
                                                                <div class="user-avatar">
                                                                    <i class="fas fa-user avatar rounded-circle"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-info">
                                                                <h6 class="user-name"><span class="mr-2">{{ $review->reviewer->username }}</span></h6>
                                                                <p> <?php echo $review->review ?></p>
                                                            </div>
                                                            <hr>
                                                        @endforeach
													</p>
												</div>
											</div>
										</div>
                                        @endif
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
                                        @else
                                            @if(empty($order->pay_received_status))
                                                @if($trade->seller_user_id != Auth::guard('user')->user()->id || $trade->buyer_user_id != Auth::guard('user')->user()->id)
                                                    <a href="{{ url('/user/chatroom/'.$trade->merging_id) }}/ " class="btn btn-primary">Enter Chatroom</a>
                                                @endif
                                            @endif
                                            <hr>
                                            @if($order)
                                                {{-- Authenticated Seller --}}
                                                @if($trade->seller_user_id == Auth::guard('user')->user()->id)
                                                    @if(empty($order->seller_consent))
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <form action="{{ url('/user/deal') }}" method="post">
                                                                    @csrf
                                                                        <input name="merging_id" type="hidden" value="{{ $order->id }}">
                                                                        <button type="submit" class="btn btn-success">
                                                                            Continue Trade with Buyer
                                                                        </button>
                                                                </form>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <form action="{{ url('/user/cancelTrade') }}" method="post">
                                                                    @csrf
                                                                        <input name="merging_id" type="hidden" value="{{ $order->id }}">
                                                                        <button type="submit" class="btn btn-danger">
                                                                            Cancel Trade with Buyer
                                                                        </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @if(!empty($order->payment_status))
                                                            @if(empty($order->pay_received_status))
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <form action="{{ url('/user/acceptPayment') }}" method="post">
                                                                            @csrf
                                                                                <input name="merging_id" type="hidden" value="{{ $order->id }}">
                                                                                <code>Ensure you have receive payment before clicking the <strong>"Acknowledged Received Payment"</strong> button</code><br/>
                                                                                <button type="submit" class="btn btn-success">
                                                                                    Acknowleged Received Payment
                                                                                </button>
                                                                        </form>
                                                                    </div>
                                                                </div>

                                                                    <div class="border-top my-3"></div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <form action="{{ url('/user/raiseDispute') }}" method="post">
                                                                            @csrf
                                                                                <input name="merging_id" type="hidden" value="{{ $order->id }}">
                                                                                <br>
                                                                                <input name="dispute_reason" style="border: 1px solid" class="form-control" type="text" required placeholder="Dispute Reason">
                                                                                <br>
                                                                                <button type="submit" class="btn btn-danger">
                                                                                Raise Dispute
                                                                                </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @else
                                                            Kindly contact the buyer and wait for the buyer to make payment. Afterward a button to acknowledge payment will appear.
                                                        @endif
                                                            <hr>
                                                            <h5 class="text-primary">Review Trade </h5>
                                                            @if(count($reviews) < 2)
                                                            <form action="{{url('/user/createReview')}}" method="post">
                                                            @csrf
                                                                <div class="stars">
                                                                    <input class="star star-5" value="5" id="star-5" type="radio" required name="star"/>
                                                                    <label class="star star-5" for="star-5"></label>

                                                                    <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                                                    <label class="star star-4" for="star-4"></label>

                                                                    <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                                                    <label class="star star-3" for="star-3"></label>

                                                                    <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                                                    <label class="star star-2" for="star-2"></label>

                                                                    <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                                                    <label class="star star-1" for="star-1"></label>
                                                                </div>


                                                                <input name="merging_id" type="hidden" value="{{ $order->id }}">
                                                                <input name="reviewer_username" type="hidden" value="{{ Auth::guard('user')->user()->username }}">
                                                                <input name="reviewer_user_id" type="hidden" value="{{ Auth::guard('user')->user()->id }}">
                                                                <input name="reviewee_user_id" type="hidden" value="@if($order->seller_user_id == Auth::guard('user')->user()->id) {{ $order->buyer_user_id }} @else {{ $order->seller_user_id }} @endif">
                                                                <textarea  id="classic-editor" style="padding: 10px;" autofocus name="review" style="border: 1px solid" class="form-control" cols="5" rows="5" required placeholder="Send Message"> </textarea>
                                                                <br/>
                                                                <button type="submit" class="btn btn-success btn-lg">
                                                                    Send Review
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                @else
                                                {{-- Authenticated Buyer --}}
                                                    @if(empty($order->payment_status))
                                                        <form action="{{ url('/user/confirmPayment') }}" method="post">
                                                            @csrf
                                                                <input name="merging_id" type="hidden" value="{{ $order->id }}">
                                                                <code>Click this button only when you have made payment</code><br/>
                                                                <button type="submit" class="btn btn-success">
                                                                    Acknowleged Payment Made
                                                                </button>
                                                        </form>
                                                    @elseif(empty($order->pay_received_status))
                                                        <form action="{{ url('/user/raiseDispute') }}" method="post">
                                                            @csrf
                                                                <input name="merging_id" type="hidden" value="{{ $order->id }}">
                                                                <input name="dispute_reason" style="border: 1px solid" class="form-control" type="text" required placeholder="Dispute Reason">
                                                                <br>
                                                                <button type="submit" class="btn btn-success">
                                                                    Raise Dispute
                                                                </button>
                                                        </form>
                                                    @endif
                                                    @if(count($reviews) < 2)
                                                        <form action="{{url('/user/createReview')}}" method="post">
                                                        @csrf
                                                            <div class="stars">
                                                                <input class="star star-5" value="5" id="star-5" type="radio" required name="star"/>
                                                                <label class="star star-5" for="star-5"></label>

                                                                <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                                                                <label class="star star-4" for="star-4"></label>

                                                                <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                                                                <label class="star star-3" for="star-3"></label>

                                                                <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                                                                <label class="star star-2" for="star-2"></label>

                                                                <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                                                                <label class="star star-1" for="star-1"></label>
                                                            </div>


                                                            <input name="merging_id" type="hidden" value="{{ $order->id }}">
                                                            <input name="reviewer_username" type="hidden" value="{{ Auth::guard('user')->user()->username }}">
                                                            <input name="reviewer_user_id" type="hidden" value="{{ Auth::guard('user')->user()->id }}">
                                                            <input name="reviewee_user_id" type="hidden" value="@if($order->seller_user_id == Auth::guard('user')->user()->id) {{ $order->buyer_user_id }} @else {{ $order->seller_user_id }} @endif">
                                                            <textarea  id="classic-editor" style="padding: 10px;" autofocus name="review" style="border: 1px solid" class="form-control" cols="5" rows="5" required placeholder="Send Message"> </textarea>
                                                            <br/>
                                                            <button type="submit" class="btn btn-success btn-lg">
                                                                Send message
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endif
                                            @endif

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

@include('inc.header')
@inject('controller', 'App\Http\Controllers\Controller')

   <!-- start wrapper -->
   <div id="wrapper" class="overflow-hidden">

    <div class="fat-nav"></div>

    <!-- start header-container -->
    @include('inc.menu')
    <!-- //end .header-container -->

    <!-- start page-banner -->
    <div class="page-banner">
        <div class="container">
            <div class="row banner-content-area justify-content-center pt-70 pb-100 mobile-pt-10 mobile-pb-50">
                <div class="col-12 col-md-6  text-center wow fadeInUp" data-wow-duration="0.9s" data-wow-delay=".5s">
                    <h1 class="pb-30 text-white mobile-pb-10">Marketplace</h1>
                    <p>Buy and Sell Bitcoin Everywhere. You can trade bitcoins P2P in an easy, fast, and secure way.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- //end .page-banner -->

    <!-- start roadmap-container -->
    <div style="margin-bottom: 5%;" class="roadmap-container">
        <div class="container pt-60 pb-30 mobile-pt-60 mobile-pb-10">
            <div class="row">
                <div class="col-12 big-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                    <h3>General Marketplace</h3>
                    <h2>Trading Zone</h2>
                </div>
            </div>

            <div style="margin-top: 5%;" class="row">
                @foreach($trades as $trade)
                <div class="col-md-4">
                    <a href="{{ url('/user/trade/'.$trade->hash) }}"  style="text-decoration:none">
                    <div style="box-shadow: 0px 2px 10px 2px rgb(0 0 0 / 10%)" class="road-map-event event wow bounceInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="content">
                            <h3>{{ $trade->selling_amount }} BTC</h3>
                            <div class="text-left" style="margin: 5%; padding: 5%">
                                <span class="name">Amount: {{$currency}} {{number_format($controller::toCurrencyWithRate($currency, $trade->selling_amount, $trade->selling_rate), 2)}}</span> <br>
                                <span class="name">Rate: {{ $trade->selling_rate }}%</span><br>
                                <span class="size">Trade Time: {{ $trade->trade_minutes }} Minutes</span><br>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- //end .roadmap-container -->



@include('inc.footer')
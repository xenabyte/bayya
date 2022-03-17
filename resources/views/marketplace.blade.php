@include('inc.header')

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
                <div class="col-md-4">
                    <div style="box-shadow: 0px 2px 10px 2px rgb(0 0 0 / 10%)" class="road-map-event event wow bounceInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="content">
                            <h3>August 20, 2018</h3>
                            <div class="timeline-cont-info">
                                <h5>Idea Generation</h5>
                                <p>Sullamco laboris nisi ut aliquip ex onse quamet, consectetur adip isicing elit, sed do eiusmod</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //end .roadmap-container -->



@include('inc.footer')
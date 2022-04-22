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
                    <h1 class="pb-30 text-white mobile-pb-10">About Us</h1>
                    <p>Buy and Sell Bitcoin Everywhere. You can trade Bitcoins P2P in an easy, fast, and secure way.</p>
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
                    <h3>About Us</h3>
                    <h2>Who we are</h2>
                    <p>People from all over the world can swap their local currency for Bitcoins at Localcoinbox. Users can make ads in which they specify the payment method and exchange rate for buying and selling Bitcoins from and to other Localcoinbox users. A trade conversation is created and escrow protection is automatically engaged when you respond to these adverts. Escrow safeguards both the buyer and the seller by holding the Bitcoins until the payment is completed and the seller distributes the Bitcoins to the buyer. Localcoinbox also offers a web wallet for sending and receiving Bitcoin transactions.</p>
                    
                    <p>Localcoinbox is revolutionizing the way money is moved around the world by embracing Bitcoin and allowing transfers with anybody, anywhere, at any time. Even if you don't have a bank account, we've got you covered. We provide over 200 payment ways, allowing you to move your money in the way that suits you best.</p>
                </div>
            </div>

            <div style="margin-top: 5%;" class="row">
                
            </div>
        </div>
    </div>
    <!-- //end .roadmap-container -->



@include('inc.footer')

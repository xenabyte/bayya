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

    <!--start blog-container-->
    <div class="blog-container">
        <div class="container">
            <div class="row pt-110 pb-80 mobile-pt-60 mobile-pb-30">
                <div class="col-12 col-md-12 col-lg-8">
                    <div class="blog-content-left"><!--start container_left-->
                        <div class="blog-item-row wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="sibgle-blog-img">
                                <img src="{{asset('frontend_assets/images/blog-img10.png')}}" width="734" height="413" alt="" />
                            </div>
                            <div class="sibgle-blog-content">
                                <h2 class="pb-20">Blockchain-powered escrow service</h2>
                                <p>People from all over the world can swap their local currency for Bitcoins at Localcoinbox. Users can make ads in which they specify the payment method and exchange rate for buying and selling Bitcoins from and to other Localcoinbox users. A trade conversation is created and escrow protection is automatically engaged when you respond to these adverts. Escrow safeguards both the buyer and the seller by holding the Bitcoins until the payment is completed and the seller distributes the Bitcoins to the buyer. Localcoinbox also offers a web wallet for sending and receiving Bitcoin transactions.</p>
                                <blockquote>
                                    <p>I've been using Localcoinbox for over a period of time and have had great success. Easy to use website, best Bitcoin rates, excellent customer service, and a large number of trading partners. Localcoinbox is an excellent choice.</p>
                                    <span>Cullen Bustillo, <small>User</small></span>
                                </blockquote>
                                <p>Localcoinbox is revolutionizing the way money is moved around the world by embracing Bitcoin and allowing transfers with anybody, anywhere, at any time. Even if you don't have a bank account, we've got you covered. We provide over 200 payment ways, allowing you to move your money in the way that suits you best.</p>
                            </div>
                        </div>
                    </div><!--//end .container_left-->
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="sidebar mobile-pt-30"><!--start sidebar-->
                        <div class="form-group search-field wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <form action="#">
                                <input class="form-control" type="search" name="search" placeholder="Search" />
                                <button class="btn search-btn" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        
                    </div><!--//end .sidebar-->
                </div>
            </div>
        </div>
    </div>
    <!--//end .blog-container-->



@include('inc.footer')

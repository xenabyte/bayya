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
                    <h1 class="pb-30 text-white mobile-pb-10">Privacy Policy</h1>
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
                    <h3>Privacy Policy</h3>
                    <h2>Our Policy</h2>
                    <p>We respect your privacy and work hard to keep your personal information safe at Localcoinbox. Localcoinbox will only collect and use personal information in line with this Privacy Statement, our Cookie Statement, and our Terms of Service.</p> <br><br>
                    <h2>Our relationship with you is unique.</h2>
                    <p style="text-align: justify;">You may be a customer of a specific Localcoinbox company depending on which country or territory you confirmed your Localcoinbox account in. Any references to "Localcoinbox," "we," "us," "our," or other similar terms in this Policy refer to the relevant Localcoinbox entity for which you are a customer. We may need to gather your personal data in order to open and run an account for you, provide you with our products and services, or contact with you.We may collect the following types of personal data:</p>
                    <br>
                        <ul style="text-align: justify">
                            <li>Personal identification information such as your full name, date of birth, nationality, cellphone or mobile number, email address, industry of employment and/or national identification number or social security number;
                            </li>
                            <li>National identity documentation such as a copy of your national identity document, drivers’ license or passport (including any relevant visa information) and/or any other information deemed necessary to comply with our legal obligations under financial or anti-money laundering laws;
                            </li>
                            <li>Transaction information such as your transaction data on your Localcoinbox account and information on the recipient of any transaction(s);
                            </li>
                            <li>Correspondence such as information provided to us when engaging with our customer support and/or responses to surveys;
                            </li>
                            <li>Information lawfully obtained from third parties such as credit information, online identifiers relating to fraud prevention, suspected criminal activity, sanction information or other personal information about you provided by a service provider appointed to help us provide our services;</li>
                        </ul>
                </div>
            </div>

            <div style="margin-top: 5%;" class="row">
                
            </div>
        </div>
    </div>
    <!-- //end .roadmap-container -->



@include('inc.footer')

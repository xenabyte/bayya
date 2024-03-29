@include('inc.header')

    <!-- start wrapper -->
    <div id="wrapper" class="overflow-hidden">

        <div class="fat-nav"></div>

        @include('inc/menu')

        <!-- start banner-container -->
        <div class="banner-container">
            <div class="container">
    			<div class="row banner-content-area justify-content-between">
                    <div class="col-12 col-md-10 col-lg-6 banner-content">
                        <div class="banner-cont-info text-white wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <h5 class="text-white">The True Game Changer</h5>
                            <h1 class="text-white">Localcoinbox provides you with access to a worldwide market</h1>
                            <p class="text-white">Buy and sell your Bitcoin locally,
                            person-to-person crypto marketplace where you can buy and sell Bitcoin using any payment method.
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <a style="margin: 5px" class="unc-btn text-white" href="{{ url('user/login') }}">Login</a>
                                </div>
                                <div class="col-md-6">
                                    <a style="margin: 5px" class="unc-btn text-white" href="{{ url('user/register') }}">Register</a>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                <a class="btn-scroll skip_swing" href="#section0"><span></span></a>
            </div>
        </div>
        <!-- //end .banner-container -->

        <!-- start three-col-container -->
        <div class="three-col-container">
            <div class="container">
    			<div class="row three-col-area">
                    <div class="col-12 col-md-12 col-lg-4 mb-40 three-col wow zoomIn" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="three-col-info pt-60 pb-50 mobile-pb-30 mobile-pt-40">
                            <div class="three-col-icon">
                                <img src="frontend_assets/images/col-icon1.png" alt="" width="108" height="120" />
                            </div>
                            <div class="three-col-cont">
                                <h3 style="color:#0275d8">200+ Different Ways to Exchange</h3>
                                <p>Buy and sell Bitcoin using any payment method,
                                    including bank transfer, western union, skrill and more.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 mb-40 three-col wow zoomIn" data-wow-duration="1s">
                        <div class="three-col-info pt-60 pb-50 mobile-pb-30 mobile-pt-40">
                            <div class="three-col-icon">
                                <img src="frontend_assets/images/col-icon2.png" alt="" width="118" height="120" />
                            </div>
                            <div class="three-col-cont">
                                <h3 style="color:#0275d8">Buy/Sell Worldwide</h3>
                                <p>Accessible around the world. The unbanked, underbanked and overbanked are all empowered by Localcoinbox.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 mb-40 three-col wow zoomIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="three-col-info pt-60 pb-50 mobile-pb-30 mobile-pt-40">
                            <div class="three-col-icon">
                                <img src="frontend_assets/images/col-icon3.png" alt="" width="116" height="120" />
                            </div>
                            <div class="three-col-cont">
                                <h3 style="color:#0275d8">A Secure Escrow-Style Payment</h3>
                                <p>Your Bitcoin is held in our secure escrow until
                                    the trade is completed successfully, sell your Bitcoin at your chosen rate.
                                </p>
                            </div>
                        </div>
                    </div>
    			</div>
    		</div>
        </div>
        <!-- //end .three-col-container -->

        <!-- start invented-container -->
        <div id="section0" class="invented-container overflow-hidden">
            <div class="container">
                <div class="row invented-area pt-70 pb-40 mobile-pt-45 justify-content-between">
                    <div class="col-12 col-md-6 col-lg-6 invented-left">
                        <div class="invented-img wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                            <img src="frontend_assets/images/invented-img.png" alt="" width="626" height="556" />
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 invented-cont wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                        <h3>We are Localcoinbox</h3>
                        <h2 style="color:#0275d8">Blockchain-powered escrow service</h2>
                        <p>We deployed a smart contract that protect escrow accounts, making it difficult for Localcoinbox or hackers to withdraw funds which implies that our system is not hackable.</p>
                        <p>Buy and sell Bitcoin in real time using our secure escrow, trade with other users online near you or around the globe. Your sensitive payment details have ultimate protection from data leaks. Messages between users are end-to-end encrypted.</p>
                        <a class="unc-btn text-white" href="{{ url('marketplace') }}"> Explore Marketplace</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- //end .invented-container -->

        <!-- start unc-inventment-container --> 
        <section class="unc-inventment-container overflow-hidden">
            <div class="container">
                <div class="row pt-20 pb-90 mobile-pb-20">
                    <div class="col-12 col-md-12 col-lg-8 mobile-pb-0">
                        <div class="unc-inventment-content pt-110 mobile-pt-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                            <h3>Why Choose Localcoinbox</h3>
                            <h2>Person-to-person trading has never been easier</h2>
                            <p>Everyone is welcome, everyday we welcome new Localcoinbox users, all of them asking their own questions about cryptocurrency and figuring out how to get started in a way that suits them.</p>
                            <div class="unc-inv-col-area">
                                <div class="unc-inv-col">
                                    <div class="unc-inv-col-row">
                                        <div class="unc-inv-col-img">
                                            <img src="frontend_assets/images/inv-col-img1.png" alt="" width="60" height="60" />
                                        </div>
                                        <div class="unc-inv-col-cont">
                                            <h4>Multichain with device</h4>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="unc-inv-col">
                                    <div class="unc-inv-col-row">
                                        <div class="unc-inv-col-img">
                                            <img src="frontend_assets/images/inv-col-img2.png" alt="" width="60" height="60" />
                                        </div>
                                        <div class="unc-inv-col-cont">
                                            <h4>Trade anywhere, anytime.</h4>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="unc-inv-col">
                                    <div class="unc-inv-col-row">
                                        <div class="unc-inv-col-img">
                                            <img src="frontend_assets/images/inv-col-img3.png" alt="" width="60" height="60" />
                                        </div>
                                        <div class="unc-inv-col-cont">
                                            <h4>Payment integration</h4>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="unc-inv-col">
                                    <div class="unc-inv-col-row">
                                        <div class="unc-inv-col-img">
                                            <img src="frontend_assets/images/inv-col-img4.png" alt="" width="60" height="60" />
                                        </div>
                                        <div class="unc-inv-col-cont">
                                            <h4>Full data ownership</h4>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //end .unc-inventment-container -->

        <!-- start features-bns-container -->
        <div class="features-bns-container overflow-hidden">
            <div class="container">
                <div class="row justify-content-between pt-110 pb-70 mobile-pt-50 mobile-pb-30">
                    <div class="col-12 col-md-5 features-bns-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                        <img src="frontend_assets/images/features-bns-img.png" alt="" width="600" height="768" />
                    </div>
                    <div class="col-12 col-md-6 features-bns-right mobile-pt-10 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                        <div class="features-bns-cont">
                            <h3>Localcoinbox Features</h3>
                            <h2 style="color:#0275d8">Localcoinbox has awesome features for P2P business</h2>
                            <div class="features-bns-area">
                                <div class="features-bns-col-row">
                                    <div class="features-bns-col-img">
                                        <img src="frontend_assets/images/features-bns-icon1.png" alt="" width="60" height="60" />
                                    </div>
                                    <div class="features-bns-col-cont">
                                        <h4>The true game changer</h4>
                                        <p>Low fees compared to some other exchanges. It also has an easy-to-use buy/sell option for beginners.</p>
                                    </div>
                                </div>
                                <div class="features-bns-col-row">
                                    <div class="features-bns-col-img">
                                        <img src="frontend_assets/images/features-bns-icon2.png" alt="" width="62" height="62" />
                                    </div>
                                    <div class="features-bns-col-cont">
                                        <h4>Solid blockchain infrastructure</h4>
                                        <p>The blockchain technology that underpins, it takes advantage of the power of peer-to-peer networks to create a shared and trusted ledger of transactions.</p>
                                    </div>
                                </div>
                                <div class="features-bns-col-row">
                                    <div class="features-bns-col-img">
                                        <img src="frontend_assets/images/features-bns-icon3.png" alt="" width="60" height="60" />
                                    </div>
                                    <div class="features-bns-col-cont">
                                        <h4>Global system intigration</h4>
                                        <p>When used as a means of exchange, Bitcoin can bridge economies and expand opportunities for the billions of unbanked.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //end .features-bns-container -->

        <!-- start benefits-container -->
        <div class="benefits-container overflow-hidden">
            <div class="container">
                <div class="row pt-110 mobile-pt-60">
                    <div class="col-12 big-title white-text text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h3>How You Get Benefited</h3>
                        <h2>Benefits of Using Localcoinbox</h2>
                    </div>
                </div>
                <div class="row justify-content-between benefits-content pt-40 pb-80 mobile-pt-10 mobile-pb-40">
                    <div class="col-12 col-md-6 benefits-left wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                        <img src="frontend_assets/images/mgm-img.png" alt="" width="736" height="464" />
                    </div>
                    <div class="col-12 col-md-6 benefits-right wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                        <div class="benefits-cont">
                            <p>Localcoinbox provides you with access to a worldwide market. Buying and selling Bitcoins has never been easier.</p>
                            <div class="bnf-area pt-30 mt-2 mobile-mt-0">
                                <div class="bnf-col-row pb-20 mobile-pb-10">
                                    <div class="bnf-col-img">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="bnf-col-cont">
                                        <p>Both the buyer and the seller are protected by escrow protection for safe trade.</p>
                                    </div>
                                </div>
                                <div class="bnf-col-row pb-20 mobile-pb-10">
                                    <div class="bnf-col-img">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="bnf-col-cont">
                                        <p>Finding and filtering trustworthy clients using a reputation system.</p>
                                    </div>
                                </div>
                                <div class="bnf-col-row pb-20 mobile-pb-10">
                                    <div class="bnf-col-img">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="bnf-col-cont">
                                        <p>You will earn Bitcoins from the users who arrive to the site through your affiliate link, register and make trades.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //end .benefits-container -->

        <!-- start faq -->
        <div id="faq" class="faq pt-110 mobile-pt-60 mobile-pb-20 overflow-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-12 big-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <h3>Localcoinbox Help Desk</h3>
                        <h2 style="color:#0275d8">Frequently Asked Questions</h2>
                    </div>
                </div>
                <div class="row pb-60 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                    <div class="horizontal_tab_data">
                        <div id="horizontalTab">
                            <ul class="resp-tabs-list">
                                <li>General</li>
                                <li>Escrow</li>
                                <li>Bitcoin</li>
                                <li>Fees</li>
                            </ul>
                            <div class="resp-tabs-container">
                                <div>
                                    <div class="tab_inner">
                                        <div class="d-flex flex-wrap justify-content-between tab_content">
                                            <div class="tab-col">
                                                <h3>What is Crypto Currency ?</h3>
                                                <p>A digital currency in which transactions are validated and records are kept by a decentralized system rather than a centralized authority utilizing cryptography.</p>
                                            </div>
                                            <div class="tab-col">
                                                <h3>Whats is Localcoinbox?</h3>
                                                <p>Localcoinbox is a peer-to-peer cryptocurrency exchange where you may trade crypto directly with other Localcoinbox users. Localcoinbox P2P allows you to conduct cryptocurrency transactions using your favorite payment method, currency, and pricing.</p>
                                            </div>
                                            <div class="tab-col">
                                                <h3>How to exchange on Localcoinbox?</h3>
                                                <p>Decide how much you want to buy or sell and lock in a price. Complete the transaction. The buyer pays the seller via a selected payment method after the seller locks an agreed quantity of Bitcoin in an escrow account.</p>
                                            </div>
                                            <div class="tab-col">
                                                <h3>How to get benefited with Localcoinbox?</h3>
                                                <p>Localcoinbox provides you with access to a worldwide market. Buying and selling Bitcoins has never been easier.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="tab_inner">
                                        <div class="d-flex flex-wrap justify-content-between tab_content">
                                            <div class="tab-col">
                                                <h3>What is an Escrow?</h3>
                                                <p> An escrow service is a mediator service that keeps the money for a transaction in safekeeping until the Bitcoins are handed over. Escrow protects buyers from fraudulent sellers by requiring the Bitcoin to be deposited up front, before any money changes hands.</p>
                                            </div>
                                            <div class="tab-col">
                                                <h3>How am I protected from being scammed?</h3>
                                                <p>Escrow protects all internet transactions. When a deal is initiated, the seller's Localcoinbox Wallet is automatically used to reserve the required number of Bitcoins. This implies that if the seller takes your money and does not release your Bitcoins, Localcoinbox.com can release the Bitcoins from escrow to you. If you're selling Bitcoins, you should never release the escrow until you've received payment from the Bitcoin buyer.</p>
                                            </div>
                                            <div class="tab-col">
                                                <h3>How do i recieve Bitcoins to my Localcoinbox from Escrow</h3>
                                                <p>After payment has been made by buyer, seller will proceed to confirm if payment is from the right source, seller can then click i have recieved payment, Bitcoin will be automatically released to buyer's wallet.</p>
                                            </div>
                                            <div class="tab-col">
                                                <h3>How long does a trade take?</h3>
                                                <p>Localcoinbox does not decide that, seller will be the one to set a payment window time and if buyer can not meet up with the time, the trade will automatically cancel and Bitcoin will be returned back to the seller's wallet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="tab_inner">
                                        <div class="d-flex flex-wrap justify-content-between tab_content">
                                            <div class="tab-col">
                                                <h3>What is Bitcoin?</h3>
                                                <p>Bitcoin is a decentralized digital currency, without a central bank or single administrator, that can be sent from user to user on the peer-to-peer Bitcoin network without the need for intermediaries.</p>
                                            </div>
                                            <div class="tab-col">
                                                <h3>How do i get Bitcoin?</h3>
                                                <p>You can get Bitcoin by accepting it as a payment for goods and services. There are also several ways you can buy Bitcoin. P2P is one of the fastest and easiest way.</p>
                                            </div>
                                            <div class="tab-col">
                                                <h3>How to spend Bitccoin?</h3>
                                                <p>There are a growing number of services and merchants accepting Bitcoin all over the world. Use Bitcoin to pay them and rate your experience to help them gain more visibility.</p>
                                            </div>
                                            <div class="tab-col">
                                                <h3>Is Bitcoin a good investment?</h3>
                                                <p>
                                                The high liquidity associated with Bitcoin makes it a great investment vessel if you're looking for short-term profit. Digital currencies may also be a long-term investment due to their high market demand. Lower inflation risk.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="tab_inner">
                                        <div class="d-flex flex-wrap justify-content-between tab_content">
                                            <div class="tab-col">
                                                <h3>Buying Bitcoin</h3>
                                                <p>When you buy Bitcoin from another user on Localcoinbox, you are buying it at a rate determined by the users. These prices are determined by a variety of criteria, including  current market value, payment method, currency pair (Eur, Gbp, Rmb), etc. But trade on Localcoinbox is free for all users.</p>
                                            </div>
                                            <div class="tab-col">
                                                <h3>Selling Bitcoin</h3>
                                                <p>At the start of the deal, this escrow amount is debited from your Localcoinbox Wallet. Bitcoin will be released to the buyer if the trade is completed successfully. If the deal is not completed because the buyer has not paid, Bitcoin will be released from escrow and returned to the Bitcoin seller, with no fee charged by Localcoinbox.</p>
                                            </div>
                                            <div class="tab-col">
                                                <h3>Sending Bitcoin</h3>
                                                <p>Localcoinbox charges 0.5% for every outgoing transaction either localcoinbox to localcoinbox or to an external platform.</p>
                                            </div>
                                            <div class="tab-col">
                                                <h3>Receiving Bitcoin</h3>
                                                <p>Localcoinbox does not charge deposit fee which simply means for every deposit you make on the platform it is totally free.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="tab_inner">
                                        <div class="d-flex flex-wrap justify-content-between tab_content">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //end .faq -->

        <!-- start our-team-container -->
        <div class="team team3 overflow-hidden">
            <div class="container">
                <div class="row pt-110 mobile-pt-60 pb-30 mobile-pb-10">
                    <div class="col-12 big-title white-text text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                        <h3>Localcoinbox has already been utilized by millions of people who have had nothing but positive things to say about us.</h3>
                        <h2>Testimonials</h2>
                    </div>
                </div>
                <div class="row justify-content-center team-col-area core-team-area pt-40 mobile-pt-20">
                    <div class="col-md-6 team-col pb-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="team-cont">
                        <div class="rounded-circle w-100 h-100 d-flex align-items-center justify-content-center position-relative overflow-hidden bg-gray-300"><img class="Avatar-module_img__1GQ75" src="frontend_assets/images/ab2.jpeg" height="100px" alt="MaineBitcoin"></div>
                            <p class="text-center">I've been using Localcoinbox for over a period of time and have had great success. Easy to use website, best Bitcoin rates, excellent customer service, and a large number of trading partners. Localcoinbox is an excellent choice.</p>
                            <br>
                            <h3 class="text-center"><em>Cullen Bustillo</em></h3>
                        </div>
                    </div>
                
                    <div class="col-md-6 team-col pb-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="team-cont">
                        <div class="rounded-circle w-100 h-100 d-flex align-items-center justify-content-center position-relative overflow-hidden bg-gray-300"><img class="Avatar-module_img__1GQ75" src="frontend_assets/images/ab.jpeg" height="100px" alt="MaineBitcoin"></div>
                            <p class="text-center">I have been using it for a long time and have not seen any errors in it, I highly recommend it. Localcoinbox arrived to change the handling of Bitcoin use, having an initiative to facilitate the use of crypto currency, the security it offers is great, both personal and business.</p>
                            <br>
                            <h3 class="text-center"><em>Terry Kimpaye</em></h3>
                        </div>
                    </div>

                    <div class="col-md-6 team-col pb-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="team-cont">
                        <div class="rounded-circle w-100 h-100 d-flex align-items-center justify-content-center position-relative overflow-hidden bg-gray-300"><img class="Avatar-module_img__1GQ75" src="frontend_assets/images/ab3.jpeg" height="100px" alt="MaineBitcoin"></div>
                            <p class="text-center">Excellent experience as a first timer on this platform, very smooth and fast, i'm so happy i found the platform.</p>
                            <br>
                            <h3 class="text-center"><em>Allen Scott</em></h3>
                        </div>
                    </div>

                    <div class="col-md-6 team-col pb-40 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="team-cont">
                        <div class="rounded-circle w-100 h-100 d-flex align-items-center justify-content-center position-relative overflow-hidden bg-gray-300"><img class="Avatar-module_img__1GQ75" src="frontend_assets/images/ab1.jpeg" height="100px" alt="MaineBitcoin"></div>
                            <p class="text-center">¡Localcoinbox es una plataforma fantástica para comprar y vender Bitcoin! Comencé a operar como un interés secundario, Localcoinbox ha hecho que mi experiencia sea maravillosa. Aprecio lo amigable y útil que es la plataforma. El equipo de apoyo dinámico también está siempre allí en un santiamén si es necesario, lo cual agradezco.</p>
                            <br>
                            <h3 class="text-center"><em>Fidel Alejandro</em></h3>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <!-- //end .our-team-container -->

        <!-- start contact-container -->
        <div id="contact" class="contact-container pt-40">
            <div class="contact-content">
                <div class="container">
                    <div class="row justify-content-between mb-2 pt-70 pb-90 mobile-pt-20 mobile-pb-30 contact-content-area">
                        <div class="col-12 col-md-5 contact-info wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <div class="contact-us">
                                <h3>Contact us</h3>
                                <h2 style="color:#0275d8">Got A Question?</h2>
                                <p>It’s never too late to get started. Buy, sell, store, and learn about peer-to-peer. </p>
                                <ul class="contact-social">
                                    <li>
                                       <div class="social-row">
                                           <a href="tel:88012345678" target="_blank"><span><i class="fas fa-phone"></i></span>
                                           <p>+1(601) - 523 - 5618</p></a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="social-row">
                                           <a  href="mailto:hello@unicrypt.com" target="_blank"><span><i class="far fa-envelope"></i></span>
                                           <p>info@localcoinbox.com</p></a>
                                       </div>
                                    </li>
                                    <li>
                                       <div class="social-row">
                                           <span><a href="#" target="_blank"><i class="fas fa-map-marker-alt"></i></a></span>
                                           <p>543 Yandell Rd, Canton, Mississippi(MS)</p>
                                       </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <form class="contact-form" action="{{ url('contactAdminLanding') }}" method="POST">
                                @csrf
                                <div class="d-flex flex-wrap form-col">
                                    <div class="form-group">
                                        <input class="form-control required" type="text" name="name" placeholder="Your name" />
                                        <span class="alert-error"></span>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control required" type="email" name="email" placeholder="Your email" />
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control required" name="message" rows="7" cols="7" placeholder="Start writing here"></textarea>
                                    <span class="alert-error"></span>
                                </div>
                                <div class="submit-col">
                                    <input type="submit" value="Submit" />
                                </div>
                                <div class="col-12 contact-message"></div>
                            </form>
                        </div>
                    </div>

                    {{-- <div class="container">
                        <div class="row">
                            <div class="newsletter-content wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                                <h2>Subscribe to Our Newsletter</h2>
                                <div class="form-group newsletter-field">
                                    <form target="_blank" action="#" method="post" novalidate>
                                        <input class="form-control" type="email" name="EMAIL" placeholder="Your email" />
                                        <input type="submit" value="" />
                                    </form>

                                    <!-- submission error message -->
                                    <div class="nl-error"></div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- //end .contact-container -->

@include('inc.footer')

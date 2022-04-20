<!-- start footer-container -->
<footer class="footer-container footer-curve">
    <div class="container">
        <div class="row pb-50 mobile-pb-20 footer-top-content overflow-hidden">
            <div class="col-12 col-md-6 col-lg-5 footer-col wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                <div class="footer-unicrypt">
                    <div class="footer-logo">
                        <img src="frontend_assets/images/logo.png" alt="" />
                    </div>
                    <p>We've got you covered.</p>
                    <ul class=" d-flex flex-wrap social-link">
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-2 footer-col link-hover wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                <h4>Company</h4>
                <ul>
                    <li><a href="{{ url('about') }}">About us</a></li>
                    <li><a href="{{ url('marketplace') }}">Marketplace</a></li>
                    <li><a href="{{ url('privacy') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('terms') }}">Terms & Condition</a></li>
                </ul>
            </div>
            
            <div class="col-12 col-md-6 col-lg-3 footer-col wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
                <h4>Contact us</h4>
                <ul>
                    <li>
                        <div class="foo-social">
                           <span><a href="#" target=""><i class="fas fa-map-marker-alt"></i></a></span>
                           <p>543 Yandell Rd, Canton, Mississippi(MS)</p>
                       </div>
                    </li>
                    <li>
                        <div class="foo-social">
                           <a href="mailto:info@localcoinbox.com" target="_blank"><span><i class="far fa-envelope"></i></span>
                           <p>info@localcoinbox.com</p></a>
                       </div>
                    </li>
                    <li>
                        <div class="foo-social">
                            <a href="tel:6015235618" target="_blank"><span><i class="fas fa-phone"></i></span>
                            <p>+1601 - 523 - 5618</p></a>
                       </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="pt-40 pb-20 d-flex flex-wrap justify-content-between footer-bottom-content">
                    <p class="d-flex justify-content-center justify-content-sm-center justify-content-md-center justify-content-lg-start order-2 order-sm-2 order-md-2 order-lg-1">All rights reserved (c) {{ date('Y') }}</p>
                    <ul class="d-flex flex-wrap order-1 order-sm-1 order-md-1 order-lg-2">
                        <li><a href="{{ url('terms') }}">Terms & Condition</a></li>
                        <li><a href="{{ url('privacy') }}">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- //end .footer-container -->

<a class="skip_swing backtop" href="#wrapper"><i class="fas fa-chevron-up"></i></a>

</div>
<!-- //end #wrapper -->

<!-- include jquery min -->
<script src="frontend_assets/vendor/jquery.min.js"></script>
<!-- include jquery bootstrap -->
<script src="frontend_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="frontend_assets/vendor/bootstrap/js/popper.min.js"></script>
<!-- include jquery fatNav -->
<script src="frontend_assets/js/jquery.fatNav.js"></script>
<!-- include jquery responsive tabs -->
<script src="frontend_assets/js/easy-responsive-tabs.js"></script>
<!-- include chart js -->
<script src="frontend_assets/vendor/chart/js/chart.min.js"></script>
<!-- include wow animation -->
<script src="frontend_assets/vendor/animate/js/wow.min.js"></script>
<!-- include main javascript file -->
<script src="frontend_assets/js/main.js"></script>
<!-- include ajax mail file -->
<script src="frontend_assets/js/ajax-mail.js"></script>
</body>

</html>

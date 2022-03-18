 <!-- start header-container -->
 <header class="@if(Request::getPathInfo() =='/' ) header-container position-absolute @else header-container blog-header-container @endif">
    <div class="container">
        <div class="row header-area justify-content-between pt-50 pb-20">
            <div class="logo">
                <a href="index.html"><img src="frontend_assets/images/logo.png" alt="" width="216" height="39" /></a>
            </div>
            <div class="menu-area d-flex flex-wrap">
                <nav class="main-menu">
                    <ul class="nav">
                        <li class=""><a href="{{ url('/') }}">Home</a></li>
                        <li><a class="skip_swing" href="#section0">About</a></li>
                        <li><a href="{{ url('/marketplace') }}">MarketPlace</a></li>
                        <li><a class="skip_swing" href="#faq">Faq</a></li>
                        <li><a class="skip_swing" href="#contact">Contact</a></li>
                    </ul>
                </nav>
                <div class="header-right">
                    <div class="device-btn"><a href="{{ url('user/register') }}">Get Started</a></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- //end .header-container -->
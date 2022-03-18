<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" type="image/png" href="{{asset('assets/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('assets/apple-touch-icon.png')}}">

    <link rel="stylesheet" href="{{asset('assets/css/vendor.css')}}">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome/5.13.1/css/all.min.css')}}"/>
    <!-- Dosis & Poppins Fonts -->
    <link href="{{asset('assets/css/fonts.googleapis.com/css2df2a.css?family=Dosis:wght@200;300;400;500;523;600;700;800&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/layout-1/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>

<div id="app" class="login-page login-page-instagram">
    @include('sweet::alert')
    <div class="wrapper">

        <!-- Login Panel -->
        <div class="panel">

            <div class="col-md-12">
                <div class="panel-body panel-form">

                    @yield('content')

                </div>
            </div>

            <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="nav text-lg-left text-center">
                                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">HOMepage</a></li>
                                    <li class="nav-item"><a href="{{ url('/') }}/#about" class="nav-link">ABOUT US</a></li>
                                    <li class="nav-item"><a href="{{ url('/') }}/#contact" class="nav-link">HELP</a></li>
                                    <li class="nav-item"><a href="{{ url('/') }}/#faq" class="nav-link">FAQ</a></li>
                                    <li class="nav-item"><a href="{{ url('/marketplace') }}" class="nav-link">Marketplace</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link">PRIVACY</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link">TERMS</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <p class="copyright my-2 text-lg-right text-center">
                                    © Copyright {{ date('Y') }}, All Rights Reserved.
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>

            </div><!-- / Login Panel -->


			</div>

		</div>

        <script src="{{asset('assets/js/vendor.js')}}"></script>
		<script src="{{asset('assets/js/app.js')}}"></script>

    </body>

</html>

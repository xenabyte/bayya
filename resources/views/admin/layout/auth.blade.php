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

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>

    <body>

		<div id="app" class="login-page">

			<div class="container">

				<!-- Login Panel -->
				<div class="panel">
					<div class="row no-gutters">

						<div class="col-md-6">


                            @yield('content')

                        </div>
                        <div class="col-md-6">

                            <div class="panel-body panel-image" style="background-image: url('{{asset('assets/auth/tim-bennett-OwvRB-M3GwE-unsplash-h500.jpg')}}');"></div>

                        </div>

					</div><!-- .row -->
				</div><!-- / Login Panel -->

			</div><!-- .container -->

		</div>

        <script src="{{asset('assets/js/vendor.js')}}"></script>
		<script src="{{asset('assets/js/app.js')}}"></script>

        <script>
            function enableBtn(){
            document.getElementById("signUp").disabled = false;
        }
    </script>

    </body>

</html>

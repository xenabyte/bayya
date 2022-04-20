<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
        <title>{{ env('APP_NAME') }}</title>
        <meta name="description" content="{{ env('APP_NAME') }}">
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
        <link rel="stylesheet" href="{{asset('assets/css/contacts/contacts.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendor/ari_d/js-list-manager/js-list-manager.css')}}">


        <!-- Setting website's root url for the api calls. -->
        <script type="text/javascript">

            window.ROOT_URL = "" ;
            window.DIRECTION = "ltr" ;

        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>

    <body>
		@include('sweet::alert')

		<div id="app" class="contacts-page">

			<div class="container">

				<!-- Login Panel -->
				<div class="panel panel-light">
					<div class="row no-gutters">

						<div class="col-md-8">

							<div class="panel-header">
								<h1 class="panel-title">
									<svg id="lnr-envelope" viewBox="0 0 1024 1024"><title>envelope</title><path class="path1" d="M896 307.2h-819.2c-42.347 0-76.8 34.453-76.8 76.8v460.8c0 42.349 34.453 76.8 76.8 76.8h819.2c42.349 0 76.8-34.451 76.8-76.8v-460.8c0-42.347-34.451-76.8-76.8-76.8zM896 358.4c1.514 0 2.99 0.158 4.434 0.411l-385.632 257.090c-14.862 9.907-41.938 9.907-56.802 0l-385.634-257.090c1.443-0.253 2.92-0.411 4.434-0.411h819.2zM896 870.4h-819.2c-14.115 0-25.6-11.485-25.6-25.6v-438.566l378.4 252.267c15.925 10.618 36.363 15.925 56.8 15.925s40.877-5.307 56.802-15.925l378.398-252.267v438.566c0 14.115-11.485 25.6-25.6 25.6z"></path></svg>
									Contact Us
								</h1>
							</div>

							<div class="panel-body panel-form">
                                <form action="{{ url('user/contactAdmin') }}" method="post">
									@csrf
                                    <div class="form-row">

										<div class="form-group col-md-6 form-group-underline">
                                            <label for="form-group-underline-email">Email address</label>
                                            <input type="email" class="form-control" name="email" autocomplete="off" id="form-group-underline-email" readonly value="{{ Auth::guard('user')->user()->email }}">
                                            <span class="border-color"></span>
                                        </div>

                                        <div class="form-group col-md-6 form-group-underline">
                                            <label for="form-group-underline-name">Name</label>
                                            <input type="text" name="name" class="form-control" required autocomplete="off" id="form-group-underline-name" placeholder="Enter your name">
                                            <span class="border-color"></span>
                                        </div>

                                    </div>

                                    <div class="form-group form-group-underline">
                                        <label for="form-group-underline-message">Message</label>
                                        <textarea class="form-control" name="message" autocomplete="off" required id="form-group-underline-message" placeholder="Type your message here..."></textarea>
                                        <span class="border-color"></span>
                                    </div>

									<div class="form-group mb-0 mt-5 text-right">
										<a href="{{ url('user/home') }}" class="btn btn-light px-5">Back Home</a>
										<button type="submit" class="btn btn-info px-5 ml-2">Send Message</button>
									</div>
                                </form>

							</div>

						</div>

						<div class="col-md-4">

							<div class="panel-body panel-address" style=" color: #ffffff; background-image: url({{asset('assets/backgrounds/nasa-Q1p7bh3SHj8-unsplash-h500.jpg')}});">
								<div class="bg-overlay" style="background-color: rgba(0, 0, 0, 0.2) ;"></div>

								<ul class="address-list">

									<li>
										<svg id="lnr-map" viewBox="0 0 1024 1024"><title>map</title><path class="path1" d="M960.659 55.024c-7.549-4.664-16.971-5.088-24.907-1.122l-295.752 147.875-295.752-147.875c-7.206-3.603-15.691-3.603-22.898 0l-307.2 153.6c-8.672 4.336-14.15 13.2-14.15 22.898v768c0 8.872 4.594 17.112 12.141 21.776 4.11 2.541 8.779 3.824 13.461 3.824 3.912 0 7.834-0.898 11.446-2.702l295.752-147.875 295.752 147.875c7.206 3.603 15.693 3.603 22.899 0l307.2-153.6c8.674-4.336 14.152-13.2 14.152-22.898v-768c-0.003-8.872-4.597-17.112-12.144-21.776zM307.2 828.978l-256 128v-710.755l256-128v710.755zM358.4 118.222l256 128v710.757l-256-128v-710.757zM921.6 828.978l-256 128v-710.755l256-128v710.755z"></path></svg>
										<span>43 Yandell Rd, Canton, Mississippi(MS)</span>
									</li>

									<li>
										<svg id="lnr-smartphone" viewBox="0 0 1024 1024"><title>smartphone</title><path class="path1" d="M537.6 921.6h-51.2c-14.138 0-25.6-11.461-25.6-25.6s11.462-25.6 25.6-25.6h51.2c14.139 0 25.6 11.461 25.6 25.6s-11.461 25.6-25.6 25.6z"></path><path class="path2" d="M742.4 1024h-460.8c-42.347 0-76.8-34.451-76.8-76.8v-870.4c0-42.347 34.453-76.8 76.8-76.8h460.8c42.349 0 76.8 34.453 76.8 76.8v870.4c0 42.349-34.451 76.8-76.8 76.8zM281.6 51.2c-14.115 0-25.6 11.485-25.6 25.6v870.4c0 14.115 11.485 25.6 25.6 25.6h460.8c14.115 0 25.6-11.485 25.6-25.6v-870.4c0-14.115-11.485-25.6-25.6-25.6h-460.8z"></path><path class="path3" d="M691.2 819.2h-358.4c-14.138 0-25.6-11.461-25.6-25.6v-665.6c0-14.138 11.462-25.6 25.6-25.6h358.4c14.139 0 25.6 11.462 25.6 25.6v665.6c0 14.139-11.461 25.6-25.6 25.6zM358.4 768h307.2v-614.4h-307.2v614.4z"></path></svg>
										<span>+1(601) - 523 - 5618</span>
									</li>

									<li>
										<svg id="lnr-envelope" viewBox="0 0 1024 1024"><title>envelope</title><path class="path1" d="M896 307.2h-819.2c-42.347 0-76.8 34.453-76.8 76.8v460.8c0 42.349 34.453 76.8 76.8 76.8h819.2c42.349 0 76.8-34.451 76.8-76.8v-460.8c0-42.347-34.451-76.8-76.8-76.8zM896 358.4c1.514 0 2.99 0.158 4.434 0.411l-385.632 257.090c-14.862 9.907-41.938 9.907-56.802 0l-385.634-257.090c1.443-0.253 2.92-0.411 4.434-0.411h819.2zM896 870.4h-819.2c-14.115 0-25.6-11.485-25.6-25.6v-438.566l378.4 252.267c15.925 10.618 36.363 15.925 56.8 15.925s40.877-5.307 56.802-15.925l378.398-252.267v438.566c0 14.115-11.485 25.6-25.6 25.6z"></path></svg>
										<span><a href="" class="">{{ env('DEFAULT_EMAIL') }}</a></span>
									</li>

								</ul>



							</div>

						</div>

					</div><!-- .row -->
				</div><!-- / Login Panel -->

			</div><!-- .container -->

		</div>

        <script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../../../js/vendor.js"></script>
		<script src="../../../js/app.js"></script>

    </body>

</html>

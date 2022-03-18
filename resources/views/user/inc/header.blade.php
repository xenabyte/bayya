<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
        <title>{{ env('APP_NAME') }}</title>
        <meta name="description" content="{{ env('APP_NAME') }}">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="icon" type="image/png" href="{{asset('favicon.ico')}}">
        <link rel="apple-touch-icon" href="{{asset('favicon.ico')}}">

        <link rel="stylesheet" href="{{asset('assets/css/vendor.css')}}">

        <!-- Fontawesome -->
		{{-- <link rel="stylesheet" href="{{asset('assets/css/font-awesome/5.13.1/css/all.min.css')}}"/> --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.css" integrity="sha512-cQpRsNnonGHFzzAZzZdR05ndKsRXZ5MVcuq+RMKiEbRYmQlLevgdtPjvSI1uGYjqEgio3uQurahmcUde6mMUJQ==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" integrity="sha512-vebUliqxrVkBy3gucMhClmyQP9On/HAWQdKDXRaAlb/FKuTbxkjPKUyqVOxAcGwFDka79eTF+YXwfke1h3/wfg==" crossorigin="anonymous" />
        <!-- Dosis & Poppins Fonts -->
        <link href="{{asset('assets/css/fonts.googleapis.com/css2df2a.css?family=Dosis:wght@200;300;400;500;523;600;700;800&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('assets/layout-1/css/app.css')}}">

        <link rel="stylesheet" href="{{asset('assets/vendor/ari_d/js-list-manager/js-list-manager.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-table/bootstrap-table.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendor/switchery/switchery.css')}}">


        <!-- Setting website's root url for the api calls. -->
        <script type="text/javascript">

            window.ROOT_URL = "" ;
            window.DIRECTION = "ltr" ;

        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>

    <body>
        @include('sweet::alert')

                <!-- Wrapper Arround The Page -->
        <div class="page-wrapper sidebar-open navbar-fixed ">

            <!-- Sidebar -->
            <nav id="sidebar" class="sidebar">
                <div class="sidebar-brand">
                    <img src="{{ asset('logo.png') }}" class="img" style="height: 100%" alt="">
                    <img src="{{ asset('logo.png') }}" class="img-sm" alt="">
                </div>
                <ul class="sidebar-menu">

					<li class="header-menu">
						<span>Home</span>
					</li>

					<li class="@if(Request::getPathInfo() =='/user/home')current active @endif">
						<a href="{{url('/user/home')}}">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 16 5 C 12.1 5 9 8.1 9 12 C 9 14.4375 10.209961 16.561523 12.070312 17.8125 C 8.5100119 19.34733 6 22.893578 6 27 L 8 27 C 8 22.6 11.6 19 16 19 C 17.2 19 18.400391 19.300781 19.400391 19.800781 C 19.700391 19.200781 20 18.599609 20.5 18.099609 C 20.300978 18.000099 20.095641 17.921082 19.892578 17.833984 C 21.77227 16.586133 23 14.452401 23 12 C 23 8.1 19.9 5 16 5 z M 16 7 C 18.8 7 21 9.2 21 12 C 21 14.8 18.8 17 16 17 C 13.2 17 11 14.8 11 12 C 11 9.2 13.2 7 16 7 z M 25 18 C 22.8 18 21 19.8 21 22 L 21 24 L 18 24 L 18 32 L 32 32 L 32 24 L 29 24 L 29 22 C 29 19.8 27.2 18 25 18 z M 25 20 C 26.1 20 27 20.9 27 22 L 27 24 L 23 24 L 23 22 C 23 20.9 23.9 20 25 20 z M 20 26 L 30 26 L 30 30 L 20 30 L 20 26 z"/></svg>
							<span>Dashboard</span>
						</a>
					</li>

                    @if(Auth::guard('user')->user()->status == 'approved')

                    <li class="header-menu">
						<span>Exchange Market</span>
					</li>

                    <li class="@if(Request::getPathInfo() =='/user/sales') current active @endif">
						<a href="{{url('/user/sales')}}">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 16 5.9375 L 15.625 6.0625 L 5.625 10.0625 L 3.3125 11 L 5.625 11.9375 L 9.53125 13.5 L 5.625 15.0625 L 3.3125 16 L 5.625 16.9375 L 9.53125 18.5 L 5.625 20.0625 L 3.3125 21 L 5.625 21.9375 L 15.625 25.9375 L 16 26.0625 L 16.375 25.9375 L 26.375 21.9375 L 28.6875 21 L 26.375 20.0625 L 22.46875 18.5 L 26.375 16.9375 L 28.6875 16 L 26.375 15.0625 L 22.46875 13.5 L 26.375 11.9375 L 28.6875 11 L 26.375 10.0625 L 16.375 6.0625 Z M 16 8.09375 L 23.28125 11 L 16 13.90625 L 8.71875 11 Z M 12.25 14.59375 L 15.625 15.9375 L 16 16.0625 L 16.375 15.9375 L 19.75 14.59375 L 23.28125 16 L 16 18.90625 L 8.71875 16 Z M 12.25 19.59375 L 15.625 20.9375 L 16 21.0625 L 16.375 20.9375 L 19.75 19.59375 L 23.28125 21 L 16 23.90625 L 8.71875 21 Z"/></svg>
							<span>Trades</span>
						</a>
					</li>

                    <li class="@if(Request::getPathInfo() =='/user/records') current active @endif">
						<a href="{{url('/user/records')}}">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 16 5.9375 L 15.625 6.0625 L 5.625 10.0625 L 3.3125 11 L 5.625 11.9375 L 9.53125 13.5 L 5.625 15.0625 L 3.3125 16 L 5.625 16.9375 L 9.53125 18.5 L 5.625 20.0625 L 3.3125 21 L 5.625 21.9375 L 15.625 25.9375 L 16 26.0625 L 16.375 25.9375 L 26.375 21.9375 L 28.6875 21 L 26.375 20.0625 L 22.46875 18.5 L 26.375 16.9375 L 28.6875 16 L 26.375 15.0625 L 22.46875 13.5 L 26.375 11.9375 L 28.6875 11 L 26.375 10.0625 L 16.375 6.0625 Z M 16 8.09375 L 23.28125 11 L 16 13.90625 L 8.71875 11 Z M 12.25 14.59375 L 15.625 15.9375 L 16 16.0625 L 16.375 15.9375 L 19.75 14.59375 L 23.28125 16 L 16 18.90625 L 8.71875 16 Z M 12.25 19.59375 L 15.625 20.9375 L 16 21.0625 L 16.375 20.9375 L 19.75 19.59375 L 23.28125 21 L 16 23.90625 L 8.71875 21 Z"/></svg>
							<span>Records</span>
						</a>
					</li>
                    @endif

                    <li class="header-menu">
						<span>Security</span>
					</li>

                    <li>
						<a href="" class="@if(Request::getPathInfo() =='/user/profile' ) current active @endif">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 16 5.9375 L 15.625 6.0625 L 5.625 10.0625 L 3.3125 11 L 5.625 11.9375 L 9.53125 13.5 L 5.625 15.0625 L 3.3125 16 L 5.625 16.9375 L 9.53125 18.5 L 5.625 20.0625 L 3.3125 21 L 5.625 21.9375 L 15.625 25.9375 L 16 26.0625 L 16.375 25.9375 L 26.375 21.9375 L 28.6875 21 L 26.375 20.0625 L 22.46875 18.5 L 26.375 16.9375 L 28.6875 16 L 26.375 15.0625 L 22.46875 13.5 L 26.375 11.9375 L 28.6875 11 L 26.375 10.0625 L 16.375 6.0625 Z M 16 8.09375 L 23.28125 11 L 16 13.90625 L 8.71875 11 Z M 12.25 14.59375 L 15.625 15.9375 L 16 16.0625 L 16.375 15.9375 L 19.75 14.59375 L 23.28125 16 L 16 18.90625 L 8.71875 16 Z M 12.25 19.59375 L 15.625 20.9375 L 16 21.0625 L 16.375 20.9375 L 19.75 19.59375 L 23.28125 21 L 16 23.90625 L 8.71875 21 Z"/></svg>
							<span>Account & Security</span>
							<i class="chevron">
								<svg fill="#ffffff" viewBox="0 0 1024 1024"><path class="path1" d="M256 1024c-6.552 0-13.102-2.499-18.101-7.499-9.998-9.997-9.998-26.206 0-36.203l442.698-442.698-442.698-442.699c-9.998-9.997-9.998-26.206 0-36.203s26.206-9.998 36.203 0l460.8 460.8c9.998 9.997 9.998 26.206 0 36.203l-460.8 460.8c-5 5-11.55 7.499-18.102 7.499z"></path></svg>
							</i>
						</a>
						<ul class="sidebar-submenu">

                            <li>
								<a href="{{url('/user/profile')}}">
									Profile
								</a>
							</li>

							<li>
								<a href="{{ url('/user/2fa') }}">
									Two Factor Authentication
								</a>
							</li>

						</ul>
					</li>


                    <li class="header-menu">
						<span>Support</span>
					</li>
                    <li>
						<a href="#">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 16 4 C 9.382813 4 4 9.382813 4 16 C 4 22.617188 9.382813 28 16 28 C 22.617188 28 28 22.617188 28 16 C 28 9.382813 22.617188 4 16 4 Z M 16 6 C 16.335938 6 16.671875 6.03125 17 6.0625 L 17 9.09375 C 16.671875 9.046875 16.339844 9 16 9 C 15.660156 9 15.328125 9.046875 15 9.09375 L 15 6.0625 C 15.328125 6.03125 15.664063 6 16 6 Z M 13 6.4375 L 13 9.6875 C 11.546875 10.382813 10.378906 11.546875 9.6875 13 L 6.46875 13 C 7.441406 9.875 9.882813 7.414063 13 6.4375 Z M 19 6.4375 C 22.113281 7.414063 24.585938 9.886719 25.5625 13 L 22.3125 13 C 21.621094 11.546875 20.453125 10.378906 19 9.6875 Z M 16 11 C 18.773438 11 21 13.226563 21 16 C 21 18.773438 18.773438 21 16 21 C 13.226563 21 11 18.773438 11 16 C 11 13.226563 13.226563 11 16 11 Z M 6.0625 15 L 9.0625 15 C 9.015625 15.324219 9 15.664063 9 16 C 9 16.339844 9.046875 16.671875 9.09375 17 L 6.0625 17 C 6.03125 16.671875 6 16.335938 6 16 C 6 15.664063 6.03125 15.328125 6.0625 15 Z M 22.90625 15 L 25.9375 15 C 25.96875 15.328125 26 15.664063 26 16 C 26 16.335938 25.96875 16.671875 25.9375 17 L 22.90625 17 C 22.953125 16.671875 23 16.339844 23 16 C 23 15.660156 22.953125 15.328125 22.90625 15 Z M 6.4375 19 L 9.6875 19 C 10.378906 20.453125 11.546875 21.621094 13 22.3125 L 13 25.5625 C 9.886719 24.585938 7.414063 22.113281 6.4375 19 Z M 22.3125 19 L 25.5625 19 C 24.585938 22.113281 22.113281 24.585938 19 25.5625 L 19 22.3125 C 20.453125 21.621094 21.621094 20.453125 22.3125 19 Z M 15 22.90625 C 15.328125 22.953125 15.660156 23 16 23 C 16.339844 23 16.671875 22.953125 17 22.90625 L 17 25.9375 C 16.671875 25.96875 16.335938 26 16 26 C 15.664063 26 15.328125 25.96875 15 25.9375 Z"/></svg>
							<span>Support</span>
							<i class="chevron">
								<svg fill="#ffffff" viewBox="0 0 1024 1024"><path class="path1" d="M256 1024c-6.552 0-13.102-2.499-18.101-7.499-9.998-9.997-9.998-26.206 0-36.203l442.698-442.698-442.698-442.699c-9.998-9.997-9.998-26.206 0-36.203s26.206-9.998 36.203 0l460.8 460.8c9.998 9.997 9.998 26.206 0 36.203l-460.8 460.8c-5 5-11.55 7.499-18.102 7.499z"></path></svg>
							</i>
						</a>
						<ul class="sidebar-submenu">

							<li>
								<a href="{{ url('/user/contact') }}">
									Ticket
								</a>
							</li>



							<li>
								<a href="{{url('/user/helpCenter')}}">
									Help Center
								</a>
							</li>

						</ul>
					</li>
                </ul>
            </nav>

            <!-- / Sidebar -->

            <main class="main-content">

                <div class="sidebar-backdrop"></div>

                <!-- Header Nav -->
                <div class="navigation-wrapper">

                    <nav class="navbar navbar-top navbar-expand-md navbar-light bg-white">
                        <div class="container-fluid">
                            <button class="navbar-toggler navbar-toggler-css navbar-menu-toggler collapsed sidebar-toggler">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </button>
                            <button class="navbar-toggler navbar-toggler-css-reverse navbar-menu-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-top-collapsible" aria-controls="navbar-top-collapsible" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbar-top-collapsible">
                                <ul class="navbar-nav navbar-menu-secondary">
                                    <li class="nav-item dropdown mega-dropdown">
                                        <a href="#" class="nav-link dropdown-toggle dropdown-nocaret" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <br/>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <nav class="navbar navbar-toolbar navbar-expand-md navbar-light">
                        <div class="container-fluid">
                            <ul class="navbar-nav navbar-menu-primary">

                                <li class="nav-item nav-user-dropdown dropdown">
                                    <a href="#" class="nav-link dropdown-toggle dropdown-nocaret" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::guard('user')->user()->username }}
                                        <i class="fa fa-user avatar avatar-1 rounded-circle"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-sm dropdown-menu-start">
                                        <div class="dropdown-header pt-0">
                                            <small class="text-overflow m-0">Welcome</small>
                                        </div>
                                        <a href="{{ url('user/profile') }}" class="dropdown-item">
                                            <i class="fas fa-users"></i>
                                            <span>Profile</span>
                                        </a>
                                        <a href="{{ url('/user/logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-power-off"></i>
                                            <span>Logout</span>
                                        </a>
                                        <form id="logout-form" action="{{ url('/user/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>

                </div>
                <!-- / Header Nav -->

                <div class="page-container">


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ env('APP_NAME') }} | Welcome</title>
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"><![endif]-->
	<!-- favicon -->
	<link rel="shortcut icon" href="{{asset('fav.ico')}}" sizes="16x16" />
	<!-- include Google Fonts -->
	<link href="/frontend_assets/css/css0e41.css?family=Quicksand:300,400,500,700&amp;display=swap" rel="stylesheet">
	<!-- include Fontawesome icons css -->
	<link rel="stylesheet" href="frontend_assets/vendor/fontawesome/css/fontawesome-all.min.css" />
	<!-- include Bootstrap css -->
	<link rel="stylesheet" href="frontend_assets/vendor/bootstrap/css/bootstrap.min.css" />
    <!-- include fatNav css -->
    <link rel="stylesheet" href="frontend_assets/css/jquery.fatNav.css" />
    <!-- include animate css -->
    <link rel="stylesheet" href="frontend_assets/vendor/animate/css/animate.css" />
    <!-- include chart css -->
    <link rel="stylesheet" href="frontend_assets/vendor/chart/css/chart.css" />
	<!-- include app main.css -->
    <link rel="stylesheet" href="frontend_assets/css/main.css" />
	<!-- include app responsive css -->
	<link rel="stylesheet" href="frontend_assets/css/responsive.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    @include('sweet::alert')
    <!--[if lt IE 10]>
        <p class="browserupgrade alert alert-danger" role="alert">You are using an <satrong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- start app preloader -->
    <div class="unicrypt-pre-con">
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute"><img src="frontend_assets/images/loader.svg" alt="" /></div>
            </div>
        </div>
    </div>
    <!-- //end app preloader -->
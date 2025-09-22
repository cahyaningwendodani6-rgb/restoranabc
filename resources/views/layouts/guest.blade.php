<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Restaurant ABC</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700%7CCabin:400%7CDancing+Script" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('tpt/css/bootstrap.min.css') }}" />


    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('tpt/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('tpt/css/owl.theme.default.css') }}" />


    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('tpt/css/font-awesome.min.css') }}">


    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="{{ asset('tpt/css/style.css') }}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>

    <!-- Header -->
    @include('layouts.guest.navbar')
    <!-- /Header -->

    <!-- Home -->
    @yield('content')
    <!-- /Home -->

    
    <!-- Contact -->

    <!-- Footer -->
    @include('layouts.guest.footer')
    <!-- /Footer -->

    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- /Preloader -->

    <!-- jQuery Plugins -->
    <script type="text/javascript" src="{{ asset('tpt/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('tpt/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('tpt/js/owl.carousel.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript" src="{{ asset('tpt/js/google-map.js') }}"></script>
    <script type="text/javascript" src="{{ asset('tpt/js/main.js') }}"></script>

</body>

</html>

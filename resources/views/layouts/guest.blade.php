<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Restoran ABC')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Meta tambahan --}}
    <meta name="description" content="Restoran ABC - Website Resmi" />
    <meta name="keywords" content="restoran, makanan, minuman, reservasi, cafe" />
    <meta name="author" content="Restoran ABC" />

    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon/favicon.ico') }}" />
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

    {{-- CSS Template --}}
    <link rel="stylesheet" href="{{ asset('tpt/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('tpt/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('tpt/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('tpt/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('tpt/css/style.css') }}">



    {{-- Modernizr --}}
    <script src="{{ asset('tpt/js/modernizr-2.6.2.min.js') }}"></script>
    <!--[if lt IE 9]>
    <script src="{{ asset('tpt/js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body>

    <div class="fh5co-loader"></div>

    <div id="page">
        {{-- Navbar --}}
        @include('layouts.guest.navbar')
       

        {{-- Konten Dinamis --}}
        @yield('content')

        {{-- Footer --}}
        @include('layouts.guest.footer')
    </div>

    {{-- Scroll to top --}}
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up22"></i></a>
    </div>

    {{-- JS --}}
    <script src="{{ asset('tpt/js/jquery.min.js') }}"></script>
    <script src="{{ asset('tpt/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('tpt/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('tpt/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('tpt/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('tpt/js/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('tpt/js/main.js') }}"></script>

    @yield('scripts')
    @stack('scripts')
</body>

</html>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Restoran ABC')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Restoran ABC - Website Resmi" />
    <meta name="keywords" content="restoran, makanan, minuman, reservasi, cafe" />
    <meta name="author" content="Restoran ABC" />

    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('tpt/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('tpt/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('tpt/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('tpt/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('tpt/css/style.css') }}">

    <!-- Modernizr -->
    <script src="{{ asset('tpt/js/modernizr-2.6.2.min.js') }}"></script>

    <style>
        /* =========================== */
        /* FIX OVERLAY / COVER FH5CO   */
        /* =========================== */

        /* Hilangkan pointer-blocking overlay */
        .fh5co-cover,
        .fh5co-cover .overlay,
        .fh5co-overlay,
        .fh5co-loader,
        .fh5co-section:before {
            pointer-events: none !important;
        }

        /* Turunkan z-index overlay supaya tidak nutup tombol */
        .fh5co-cover,
        .fh5co-cover .overlay,
        .fh5co-overlay {
            z-index: 0 !important;
        }

        /* Loader juga diturunkan */
        .fh5co-loader {
            z-index: 1 !important;
        }

        /* =========================== */
        /* FIX MODAL BOOTSTRAP 3       */
        /* =========================== */
        .modal-dialog {
            margin-top: 10% !important;
        }

        .modal {
            position: fixed !important;
            z-index: 20000 !important;
        }

        .modal-backdrop {
            position: fixed !important;
            z-index: 19990 !important;
        }

        /* =========================== */
        /* Prioritaskan tombol & card  */
        /* =========================== */
        .btn,
        .card,
        .card-footer {
            position: relative;
            z-index: 500 !important;
        }
    </style>

</head>

<body>

    <div class="fh5co-loader"></div>

    <div id="page">

        @include('layouts.guest.navbar')

        @yield('content')

        @include('layouts.guest.footer')
    </div>

    <!-- Go To Top -->
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up22"></i></a>
    </div>

    <!-- JS -->
    <script src="{{ asset('tpt/js/jquery.min.js') }}"></script>
    <script src="{{ asset('tpt/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('tpt/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('tpt/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('tpt/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('tpt/js/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('tpt/js/main.js') }}"></script>

    <!-- SweetAlert2 FIX -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('scripts')
    @stack('scripts')

</body>

</html>

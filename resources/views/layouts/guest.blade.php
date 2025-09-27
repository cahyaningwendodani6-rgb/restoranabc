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
    <nav class="fh5co-nav" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center logo-wrap">
                    <div id="fh5co-logo">
                        <a href="{{ url('/') }}">RestoranABC<span>.</span></a>
                    </div>
                </div>
                <div class="col-xs-12 text-center menu-1 menu-wrap">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/menunya') }}">Menu</a></li>
                        <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                        <li><a href="{{ url('/reservation') }}">Reservation</a></li>
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    {{-- Konten Dinamis --}}
    @yield('content')

    {{-- Footer --}}
    <footer id="fh5co-footer" role="contentinfo" class="fh5co-section">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-4 fh5co-widget">
                    <h4>Restoran ABC</h4>
                    <p>Kami menyajikan makanan dan minuman terbaik dengan bahan segar pilihan setiap hari.</p>
                </div>
                <div class="col-md-2 col-md-push-1 fh5co-widget">
                    <h4>Links</h4>
                    <ul class="fh5co-footer-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="{{ url('/menu') }}">Menu</a></li>
                        <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-md-push-1 fh5co-widget">
                    <h4>Kategori</h4>
                    <ul class="fh5co-footer-links">
                        <li><a href="#">Makanan</a></li>
                        <li><a href="#">Minuman</a></li>
                        <li><a href="#">Cemilan</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-md-push-1 fh5co-widget">
                    <h4>Kontak</h4>
                    <ul class="fh5co-footer-links">
                        <li>Jl. Contoh No.123, Jakarta</li>
                        <li><a href="tel://08123456789">+62 812-3456-789</a></li>
                        <li><a href="mailto:info@restoranabc.com">info@restoranabc.com</a></li>
                        <li><a href="http://restoranabc.com">restoranabc.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">&copy; {{ date('Y') }} Restoran ABC. All Rights Reserved.</small>
                        <small class="block">Designed by FreeHTML5.co | Customized by Restoran ABC</small>
                    </p>
                    <p>
                        <ul class="fh5co-social-icons">
                            <li><a href="#"><i class="icon-twitter2"></i></a></li>
                            <li><a href="#"><i class="icon-facebook2"></i></a></li>
                            <li><a href="#"><i class="icon-instagram"></i></a></li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </footer>
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</body>
</html>

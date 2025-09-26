@extends('layouts.guest')

@section('title', 'Home - Restoran ABC')

@section('content')

    <header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner"
        style="background-image: url({{ asset('tpt/images/hero_1.jpeg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="display-t js-fullheight">
                        <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
                            <h1>The Best Coffee <em>&amp;</em> Restaurant</h1>
                            <h2>Brought to you by Restoran ABC</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-about" class="fh5co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-pull-4 img-wrap animate-box" data-animate-effect="fadeInLeft">
                    <img src="{{ asset('tpt/images/hero_1.jpeg') }}" alt="Restoran ABC">
                </div>
                <div class="col-md-5 col-md-push-1 animate-box">
                    <div class="section-heading">
                        <h2>Tentang Restoran</h2>
                        <p>Restoran ABC hadir untuk menyajikan makanan terbaik dengan rasa autentik dan pelayanan ramah.</p>
                        <p>Kami selalu berusaha memberikan pengalaman bersantap yang menyenangkan untuk Anda.</p>
                        <p><a href="{{ route('about') }}" class="btn btn-primary btn-outline">Tentang Kami</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-featured-menu" class="fh5co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 fh5co-heading animate-box">
                    <h2>Menu Hari Ini</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Nikmati berbagai hidangan pilihan kami yang dimasak dengan bahan-bahan segar.</p>
                        </div>
                    </div>
                </div>

                {{-- Contoh item menu --}}
                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item">
                        <img src="{{ asset('tpt/images/gallery_9.jpeg') }}" class="img-responsive" alt="">
                        <h3>Bake Potato Pizza</h3>
                        <span class="fh5co-price">Rp45.000</span>
                        <p>Pizza kentang panggang dengan keju dan topping istimewa.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item margin_top">
                        <img src="{{ asset('tpt/images/gallery_8.jpeg') }}" class="img-responsive" alt="">
                        <h3>Salted Fried Chicken</h3>
                        <span class="fh5co-price">Rp38.000</span>
                        <p>Ayam goreng crispy dengan bumbu asin gurih khas.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="fh5co-slider" class="fh5co-section animate-box">
        <div class="container">
            <div class="row">
                <div class="col-md-6 animate-box">
                    <div class="fh5co-heading">
                        <h2>Our Best <em>&amp;</em> Unique Menu</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ab debitis sit itaque totam,
                            a maiores nihil, nulla magnam porro minima officiis!</p>
                    </div>
                </div>
                <div class="col-md-6 col-md-push-1 animate-box">
                    <aside id="fh5co-slider-wrwap">
                        <div class="flexslider">
                            <ul class="slides">
                                <li style="background-image: url({{ asset('tpt/img/gallery_7.jpeg') }});">
                                    <div class="overlay-gradient"></div>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12 slider-text slider-text-bg">
                                                <div class="slider-text-inner">
                                                    <div class="desc">
                                                        <h2>Crab <em>with</em> Curry Sauce</h2>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt
                                                            eveniet quae...</p>
                                                        <p><a href="{{ route('menunya') }}"
                                                                class="btn btn-primary btn-outline">Lihat Menu</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li style="background-image: url({{ asset('tpt/img/gallery_6.jpeg') }});">
                                    <div class="overlay-gradient"></div>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12 slider-text slider-text-bg">
                                                <div class="slider-text-inner">
                                                    <div class="desc">
                                                        <h2>Tuna <em>&amp;</em> Roast Beef</h2>
                                                        <p>Ink is a free html5 bootstrap and a multi-purpose template
                                                            perfect for any type...</p>
                                                        <p><a href="{{ route('menunya') }}"
                                                                class="btn btn-primary btn-outline">Lihat Menu</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li style="background-image: url({{ asset('tpt/img/gallery_5.jpeg') }});">
                                    <div class="overlay-gradient"></div>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12 slider-text slider-text-bg">
                                                <div class="slider-text-inner">
                                                    <div class="desc">
                                                        <h2>Egg <em>with</em> Mushroom</h2>
                                                        <p>Ink is a free html5 bootstrap and a multi-purpose template
                                                            perfect for any type...</p>
                                                        <p><a href="{{ route('menunya') }}"
                                                                class="btn btn-primary btn-outline">Lihat Menu</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>


    <div id="fh5co-started" class="fh5co-section animate-box"
        style="background-image: url({{ asset('tpt/images/hero_1.jpeg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Reservasi Meja</h2>
                    <p>Pesan meja Anda sekarang untuk pengalaman bersantap yang lebih nyaman.</p>
                    <p><a href="{{ route('reservation') }}" class="btn btn-primary btn-outline">Pesan Sekarang</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection

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
                            <h1>Selamat datang di Restoran ABC</h1>
                            <h2>Nikmati Hidangan Lezat, Pesan Praktis, Rasa Tak Terlupakan.</h2>
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
                        <section id="tentang">
                            <h2>Tentang Kami</h2>
                            {!! $page->content ?? '' !!}
                        </section>

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
                    <h2>Menu Kami</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Nikmati berbagai hidangan pilihan kami yang dimasak dengan bahan-bahan segar.</p>
                        </div>
                    </div>
                </div>
                {{-- Makanan --}}
                <div class="row">
                    <h2
                        style="text-align: center; color: #fff; border-bottom: 2px solid #fff; padding-bottom: 8px; margin-bottom: 20px;">
                        Makanan
                    </h2>

                    @foreach ($makanan as $item)
                        <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                            <div class="fh5co-item">
                                <img src="{{ asset('storage/' . $item->foto) }}" class="img-responsive" alt="">
                                <h3>{{ $item->nama }}</h3>
                                <span class="fh5co-price">Rp{{ number_format($item->harga, 0, ',', '.') }}</span>
                                <p>{{ $item->deskripsi ?? '-' }}</p>
                            </div>
                        </div>
                    @endforeach


                    {{-- Minuman --}}
                    <div class="row">
                        <h2
                            style="text-align: center; color: #fff; border-bottom: 2px solid #fff; padding-bottom: 8px; margin-bottom: 20px;">
                            Minuman
                        </h2>
                        @foreach ($minuman as $item)
                            <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                                <div class="fh5co-item">
                                    <img src="{{ asset('storage/' . $item->foto) }}" class="img-responsive" alt="">
                                    <h3>{{ $item->nama }}</h3>
                                    <span class="fh5co-price">Rp{{ number_format($item->harga, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        @endforeach

                        {{-- Camilan --}}
                        <div class="row">
                            <h2
                                style="text-align: center; color: #fff; border-bottom: 2px solid #fff; padding-bottom: 8px; margin-bottom: 20px;">
                                Camilan
                            </h2>


                            @foreach ($camilan as $item)
                                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                                    <div class="fh5co-item">
                                        <img src="{{ asset('storage/' . $item->foto) }}" class="img-responsive"
                                            alt="">
                                        <h3>{{ $item->nama }}</h3>
                                        <span class="fh5co-price">Rp{{ number_format($item->harga, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>

                <div id="fh5co-slider" class="fh5co-section animate-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 animate-box">
                                <div class="fh5co-heading">
                                    <h2>Menu Andalan <em>&amp;</em> Favorit Kami</h2>
                                    <p>Kami menghadirkan menu spesial pilihan yang menjadi favorit pelanggan.
                                        Setiap hidangan diproses dengan bahan segar dan resep khas Restoran ABC,
                                        memberikan pengalaman rasa yang tak terlupakan.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-md-push-1 animate-box">
                                <aside id="fh5co-slider-wrwap">
                                    <div class="flexslider">
                                        <ul class="slides">
                                            <li
                                                style="background-image: url({{ asset('tpt/images/crispy-chicken-sambal-matah.jpg') }});">
                                                <div class="overlay-gradient"></div>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div
                                                            class="col-md-12 col-md-offset-0 col-md-pull-10 slider-text slider-text-bg">
                                                            <div class="slider-text-inner">
                                                                <div class="desc">
                                                                    <h2>Chicken Sambal Matah Bowl</h2>
                                                                    <p>Nasi hangat dengan ayam suwir pedas sambal matah
                                                                        segar,
                                                                        cocok untuk pecinta pedas.</p>
                                                                    <p><a href="{{ route('menunya') }}"
                                                                            class="btn btn-primary btn-outline">Lihat
                                                                            Menu</a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li
                                                style="background-image: url({{ asset('tpt/images/Teriyaki-Salmon-Bowl.jpg') }});">
                                                <div class="overlay-gradient"></div>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div
                                                            class="col-md-12 col-md-offset-0 col-md-pull-10 slider-text slider-text-bg">
                                                            <div class="slider-text-inner">
                                                                <div class="desc">
                                                                    <h2>Teriyaki Salmon Bowl</h2>
                                                                    <p>Ikan salmon dengan saus teriyaki.</p>
                                                                    <p><a href="{{ route('menunya') }}"
                                                                            class="btn btn-primary btn-outline">Lihat
                                                                            Menu</a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li style="background-image: url({{ asset('tpt/images/Ramen.jpg') }});">
                                                <div class="overlay-gradient"></div>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div
                                                            class="col-md-12 col-md-offset-0 col-md-pull-10 slider-text slider-text-bg">
                                                            <div class="slider-text-inner">
                                                                <div class="desc">
                                                                    <h2>Ramen</h2>
                                                                    <p>Mie ramen dengan tingkat kepedasan sesuai selera.</p>
                                                                    <p><a href="{{ route('menunya') }}"
                                                                            class="btn btn-primary btn-outline">Lihat
                                                                            Menu</a>
                                                                    </p>
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





            @endsection

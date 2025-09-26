@extends('layouts.guest')

@section('title', 'Menu - Restoran ABC')

@section('content')

{{-- Hero/Header --}}
<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner"
    style="background-image: url({{ asset('tpt/images/hero_1.jpeg') }});" 
    data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="display-t js-fullheight">
          <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
            <h1>See <em>Our</em> Menu</h1>
            <h2>Brought to you by Restoran ABC</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

{{-- Featured Menu --}}
<div id="fh5co-featured-menu" class="fh5co-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 fh5co-heading animate-box">
        <h2>Our Delicious Menu</h2>
        <div class="row">
          <div class="col-md-6">
            <p>Kami menyajikan hidangan terbaik dengan bahan segar pilihan. Nikmati menu favorit Anda di Restoran ABC.</p>
          </div>
        </div>
      </div>

      {{-- Item 1 --}}
      <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap">
        <div class="fh5co-item animate-box">
          <img src="{{ asset('tpt/images/gallery_1.jpeg') }}" class="img-responsive" alt="">
          <h3>Bake Potato Pizza</h3>
          <span class="fh5co-price">Rp 75.000</span>
          <p>Pizza kentang panggang dengan keju meleleh dan topping spesial.</p>
        </div>
        <div class="fh5co-item animate-box">
          <img src="{{ asset('tpt/images/gallery_2.jpeg') }}" class="img-responsive" alt="">
          <h3>Chicken Teriyaki</h3>
          <span class="fh5co-price">Rp 55.000</span>
          <p>Daging ayam dengan saus teriyaki khas Jepang.</p>
        </div>
      </div>

      {{-- Item 2 --}}
      <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap">
        <div class="fh5co-item margin_top animate-box">
          <img src="{{ asset('tpt/images/gallery_3.jpeg') }}" class="img-responsive" alt="">
          <h3>Salted Fried Chicken</h3>
          <span class="fh5co-price">Rp 60.000</span>
          <p>Ayam goreng crispy dengan bumbu asin gurih.</p>
        </div>
        <div class="fh5co-item animate-box">
          <img src="{{ asset('tpt/images/gallery_4.jpeg') }}" class="img-responsive" alt="">
          <h3>Beef Blackpepper</h3>
          <span class="fh5co-price">Rp 80.000</span>
          <p>Daging sapi saus lada hitam, disajikan dengan sayuran segar.</p>
        </div>
      </div>

      {{-- Item 3 --}}
      <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap">
        <div class="fh5co-item animate-box">
          <img src="{{ asset('tpt/images/gallery_5.jpeg') }}" class="img-responsive" alt="">
          <h3>Italian Sauce Mushroom</h3>
          <span class="fh5co-price">Rp 70.000</span>
          <p>Jamur dengan saus Italia khas Restoran ABC.</p>
        </div>
        <div class="fh5co-item animate-box">
          <img src="{{ asset('tpt/images/gallery_6.jpeg') }}" class="img-responsive" alt="">
          <h3>Seafood Mix</h3>
          <span class="fh5co-price">Rp 95.000</span>
          <p>Campuran seafood segar dengan saus spesial.</p>
        </div>
      </div>

      {{-- Item 4 --}}
      <div class="col-md-3 col-sm-6 col-xs-6 col-xxs-12 fh5co-item-wrap">
        <div class="fh5co-item margin_top animate-box">
          <img src="{{ asset('tpt/images/gallery_7.jpeg') }}" class="img-responsive" alt="">
          <h3>Fried Potato w/ Garlic</h3>
          <span class="fh5co-price">Rp 35.000</span>
          <p>Kentang goreng dengan bumbu bawang putih gurih.</p>
        </div>
        <div class="fh5co-item animate-box">
          <img src="{{ asset('tpt/images/gallery_8.jpeg') }}" class="img-responsive" alt="">
          <h3>Salmon Teriyaki</h3>
          <span class="fh5co-price">Rp 120.000</span>
          <p>Ikan salmon dengan saus teriyaki manis gurih.</p>
        </div>
      </div>

    </div>
  </div>
</div>

{{-- Testimony --}}
<div id="fh5co-featured-testimony" class="fh5co-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 fh5co-heading animate-box">
        <h2>Testimony</h2>
        <div class="row">
          <div class="col-md-6">
            <p>Banyak pelanggan puas dengan menu kami yang lezat dan pelayanan ramah.</p>
          </div>
        </div>
      </div>

      <div class="col-md-5 animate-box img-to-responsive">
        <img src="{{ asset('tpt/images/person_1.jpg') }}" alt="">
      </div>
      <div class="col-md-7 animate-box">
        <blockquote>
          <p> &ldquo;Makanannya enak banget! Porsinya pas dan suasana restorannya nyaman. Recommended!&rdquo;</p>
          <p class="author"><cite>&mdash; Jane Smith</cite></p>
        </blockquote>
      </div>
    </div>
  </div>
</div>

{{-- CTA Book a Table --}}
<div id="fh5co-started" class="fh5co-section animate-box" 
    style="background-image: url({{ asset('tpt/images/hero_1.jpeg') }});" 
    data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row animate-box">
      <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
        <h2>Book a Table</h2>
        <p>Ingin merasakan langsung kelezatan menu kami? Segera reservasi meja Anda sekarang.</p>
        <p><a href="{{ route('reservation') }}" class="btn btn-primary btn-outline">Book Now</a></p>
      </div>
    </div>
  </div>
</div>

@endsection

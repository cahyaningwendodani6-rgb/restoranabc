@extends('layouts.guest')

@section('title', 'Contact - Restoran ABC')

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
            <h1>Hubungi Kami</h1>
            <h2>Brought to you by Restoran ABC</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

{{-- Contact Section --}}
<div id="fh5co-contact" class="fh5co-section animate-box">
  <div class="container">
    <div class="row animate-box">
      <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
        <h2>Jangan malu, mari ngobrol.</h2>
        <p>Kami Siap Membantu Anda. Silakan Hubungi Kami Dengan Cara Klik di Bawah Ini.</p>
        <p><a href="mailto:info@restoranabc.com" class="btn btn-primary btn-outline">Hubungi kami</a></p>
      </div>
    </div>
    
  </div>
</div>

@endsection

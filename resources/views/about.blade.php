@extends('layouts.guest')

@section('title', 'About - Restoran ABC')

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
            <h1>About <em>our</em> Restaurant</h1>
            <h2>Brought to you by Restoran ABC</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

{{-- Tentang Restoran --}}
<div id="fh5co-about" class="fh5co-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-pull-4 img-wrap animate-box" data-animate-effect="fadeInLeft">
        <img src="{{ asset('tpt/images/hero_1.jpeg') }}" alt="Tentang Restoran ABC">
      </div>
      <div class="col-md-5 col-md-push-1 animate-box">
        <div class="section-heading">
          <h2>The Restaurant</h2>
          <p>Kami hadir untuk memberikan pengalaman bersantap terbaik bagi Anda dan keluarga.</p>
          <p>Setiap menu kami dibuat dengan bahan segar pilihan dan resep otentik.</p>
          <p><a href="#" class="btn btn-primary btn-outline">Our History</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Timeline --}}
<div id="fh5co-timeline">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="timeline animate-box">
          <li class="timeline-heading text-center animate-box">
            <div><h3>Our Experience</h3></div>
          </li>
          <li class="animate-box timeline-unverted">
            <div class="timeline-badge"><i class="icon-genius"></i></div>
            <div class="timeline-panel">
              <div class="timeline-heading"><h3 class="timeline-title">The Founders Meet</h3></div>
              <div class="timeline-body"><p>Restoran ini lahir dari mimpi sederhana untuk menghadirkan rasa terbaik.</p></div>
            </div>
          </li>
          <li class="timeline-inverted animate-box">
            <div class="timeline-badge"><i class="icon-genius"></i></div>
            <div class="timeline-panel">
              <div class="timeline-heading"><h3 class="timeline-title">Create A Restaurant</h3></div>
              <div class="timeline-body"><p>Dari dapur kecil, kini berkembang menjadi restoran dengan banyak cabang.</p></div>
            </div>
          </li>
          <li class="animate-box timeline-unverted">
            <div class="timeline-badge"><i class="icon-genius"></i></div>
            <div class="timeline-panel">
              <div class="timeline-heading"><h3 class="timeline-title">Added 200+ Employees</h3></div>
              <div class="timeline-body"><p>Didukung tim profesional yang selalu siap melayani pelanggan.</p></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

{{-- Testimony --}}
<div id="fh5co-featured-testimony" class="fh5co-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 fh5co-heading">
        <h2>Testimony</h2>
        <div class="row">
          <div class="col-md-5 animate-box img-to-responsive">
            <img src="{{ asset('tpt/images/person_1.jpg') }}" alt="">
          </div>
          <div class="col-md-7 animate-box">
            <blockquote>
              <p>&ldquo;Makanannya enak, suasananya nyaman, dan pelayanannya luar biasa!&rdquo;</p>
              <p class="author"><cite>&mdash; Jane Smith</cite></p>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Call to Action --}}
<div id="fh5co-started" class="fh5co-section animate-box"
    style="background-image: url({{ asset('tpt/images/hero_1.jpeg') }});"
    data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row animate-box">
      <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
        <h2>Book a Table</h2>
        <p>Ingin reservasi? Silakan hubungi kami sekarang juga.</p>
        <p><a href="mailto:info@restoranabc.com" class="btn btn-primary btn-outline">Contact Us</a></p>
      </div>
    </div>
  </div>
</div>

@endsection

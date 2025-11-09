@extends('layouts.guest')

@section('title', 'Contact - Restoran ABC')

@section('content')

    {{-- Hero/Header --}}
    <header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner"
        style="background-image: url({{ asset('tpt/images/hero_1.jpeg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="display-t js-fullheight">
                        <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
                            <h1>Hubungi Kami</h1>
                            <h2>Restoran ABC siap melayani Anda</h2>
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
                    <p>Kami siap membantu Anda. Silakan hubungi kami dengan cara berikut:</p>
                    <p>
                        <a href="mailto:aprilianiw479@gmail.com" class="btn btn-primary btn-outline">Email Kami</a>
                        <a href="https://wa.me/6285700763873" class="btn btn-success btn-outline">WhatsApp</a>
                        <a href="tel:+6285700763873" class="btn btn-info btn-outline">Telepon</a>
                    </p>
                </div>
            </div>

            {{-- Google Maps --}}
            <div class="row animate-box">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.420159239383!2d109.3643!3d-7.4412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655fc32c7f9c4f%3A0x5b0f43f3caaa123!2sSelaganggeng%2C%20Purbalingga%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1696300000000"
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <p class="mt-3">
                        📍 Alamat Tempat Produksi: Jl. Raya Selaganggeng, Dusun 1, Selaganggeng, Purbalingga, Jawa Tengah 53352
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

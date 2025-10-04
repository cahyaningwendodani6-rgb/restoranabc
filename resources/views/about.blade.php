@extends('layouts.guest')

@section('title', 'About - Restoran ABC')

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
                            <h1>Tentang <em>Restoran</em> Kami</h1>
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
                        <h2>Tentang Restoran ABC</h2>
                        <p>Restoran ABC, berdiri sejak 2025, hadir dengan konsep modern yang praktis dan kekinian. Kami
                            menyajikan berbagai menu rice bowl, mie, pasta, camilan, hingga minuman segar yang mudah dipesan
                            secara online dan siap dinikmati kapan saja, di mana saja.</p>
                        <p>Restoran ABC adalah restoran modern yang menghadirkan beragam hidangan lezat dengan konsep
                            praktis dan kekinian. Mengusung semangat “Good Food, Easy Life”, kami menyajikan menu favorit
                            seperti rice bowl, mie, pasta, camilan, hingga minuman kekinian yang diracik dengan bahan segar
                            dan berkualitas.</p>
                        <p>Dengan layanan online dan delivery yang cepat, pelanggan dapat menikmati hidangan Restoran ABC
                            kapan saja dan di mana saja, cukup dengan sekali klik. Setiap menu dikemas rapi dan higienis
                            sehingga tetap nikmat meski dinikmati di rumah, kantor, atau saat perjalanan.</p>
                        <p>Restoran ABC menjadi pilihan tepat bagi mahasiswa, pekerja kantoran, hingga keluarga modern yang
                            ingin menikmati makanan enak, praktis, dan terjangkau. Kami percaya, makanan bukan hanya soal
                            rasa, tapi juga tentang pengalaman yang hangat dan menyenangkan.</p>
                        <p><a href="{{ route('about') }}" class="btn btn-primary btn-outline">Tentang Kami</a></p>
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
                            <div>
                                <h3 style="color:#fff;">Pengalaman Kami</h3>
                            </div>
                        </li>

                        <li class="animate-box timeline-unverted">
                            <div class="timeline-badge"><i class="icon-genius"></i></div>
                            <div class="timeline-panel"
                                style="background:rgba(0,0,0,0.5); border-radius:8px; padding:15px;">
                                <div class="timeline-heading">
                                    <h3 class="timeline-title" style="color:#fff;">Para Pendiri Bertemu</h3>
                                </div>
                                <div class="timeline-body">
                                    <p style="color:#fff;">Restoran online ini bermula dari ide sederhana: bagaimana caranya
                                        orang bisa
                                        menikmati masakan enak tanpa harus keluar rumah.</p>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-inverted animate-box">
                            <div class="timeline-badge"><i class="icon-genius"></i></div>
                            <div class="timeline-panel"
                                style="background:rgba(0,0,0,0.5); border-radius:8px; padding:15px;">
                                <div class="timeline-heading">
                                    <h3 class="timeline-title" style="color:#fff;">Membangun Restoran</h3>
                                </div>
                                <div class="timeline-body">
                                    <p style="color:#fff;">Lewat inovasi digital, lahirlah platform pemesanan online yang
                                        membuat pelanggan bisa
                                        memilih menu favorit hanya dengan beberapa klik.</p>
                                </div>
                            </div>
                        </li>

                        <li class="animate-box timeline-unverted">
                            <div class="timeline-badge"><i class="icon-genius"></i></div>
                            <div class="timeline-panel"
                                style="background:rgba(0,0,0,0.5); border-radius:8px; padding:15px;">
                                <div class="timeline-heading">
                                    <h3 class="timeline-title" style="color:#fff;">Menambahkan 5 Karyawan</h3>
                                </div>
                                <div class="timeline-body">
                                    <p style="color:#fff;">Kini dengan dukungan 5 karyawan yang penuh dedikasi, Restoran ABC
                                        terus memberikan
                                        pelayanan ramah dan masakan berkualitas, menjadi pilihan hangat bagi keluarga,
                                        sahabat, dan pecinta kuliner.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>


    {{-- Call to Action --}}
    <div id="fh5co-started" class="fh5co-section animate-box">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Reservasi Pesanan Anda</h2>
                    <p>Ingin makan enak tanpa ribet?
                        Pesan sekarang secara online dan nikmati hidangan favorit Anda dengan cepat, praktis, dan higienis.
                    </p>
                    <p>Kami siap mengantarkan pesanan langsung ke rumah, kantor, atau tempat Anda bersantai.</p>
                    <p>
                        <a href="{{ route('reservation') }}" class="btn btn-primary btn-lg btn-outline">
                            Pesan Sekarang
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

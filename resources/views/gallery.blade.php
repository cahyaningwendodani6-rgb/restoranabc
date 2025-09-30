@extends('layouts.guest')

@section('title', 'Gallery - Restoran ABC')

@section('content')

    {{-- Header Section --}}
    <header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner"
        style="background-image: url({{ asset('tpt/images/hero_1.jpeg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="display-t js-fullheight">
                        <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
                            <h1>Lihat <em>Gallery</em> Kami</h1>
                            <h2>Brought to you by Restoran ABC</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- Gallery Section --}}
    <div id="fh5co-gallery" class="fh5co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 fh5co-heading animate-box">
                    <h2>Gallery Kami</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Koleksi gambar yang kami tampilkan merefleksikan kualitas, dedikasi, dan detail terbaik.
                                Setiap potret adalah representasi dari cerita dan pengalaman berharga yang kami hadirkan
                                khusus untuk Anda.</p>
                        </div>
                    </div>
                </div>

                {{-- contoh grid gallery --}}
                <div class="col-md-3 col-sm-3 fh5co-gallery_item">
                    <div class="fh5co-bg-img" style="background-image: url({{ asset('tpt/images/ramenn.jpeg') }});"
                        data-trigger="zoomerang"></div>
                    <div class="fh5co-bg-img"
                        style="background-image: url({{ asset('tpt/images/Lasagna-Cheese-Melt.jpeg') }});"
                        data-trigger="zoomerang"></div>
                </div>
                <div class="col-md-6 col-sm-6 fh5co-gallery_item">
                    <div class="fh5co-bg-img fh5co-gallery_big"
                        style="background-image: url({{ asset('tpt/images/Nasi-Ayam-Sambal-Matah.jpeg') }});"
                        data-trigger="zoomerang">
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 fh5co-gallery_item">
                    <div class="fh5co-bg-img" style="background-image: url({{ asset('tpt/images/sosis-bakar.jpeg') }});"
                        data-trigger="zoomerang"></div>
                    <div class="fh5co-bg-img" style="background-image: url({{ asset('tpt/images/onion-ring.jpeg') }});"
                        data-trigger="zoomerang"></div>
                </div>

                {{-- tambahkan baris galeri lain sesuai kebutuhan --}}
            </div>
        </div>
    </div>

    {{-- Call to Action --}}
    <div id="fh5co-started" class="fh5co-section animate-box"
        style="background-image: url({{ asset('tpt/images/hero_1.jpeg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Reservasi Pesanan Anda</h2>
                    <p>Ingin makan enak tanpa ribet?
                        Pesan sekarang secara online dan nikmati hidangan favorit Anda dengan cepat, praktis, dan higienis.
                    </p>
                    <p>Kami siap mengantarkan pesanan langsung ke rumah, kantor, atau tempat Anda bersantai.</p>
                    <p><a href="{{ route('reservation') }}" class="btn btn-primary btn-outline">Pesan Sekarang</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('tpt/js/zoomerang.js') }}"></script>
    <script>
        Zoomerang.config({
                maxHeight: 600,
                maxWidth: 900,
                bgColor: '#000',
                bgOpacity: .85
            })
            .listen('[data-trigger="zoomerang"]')
    </script>
@endpush

@extends('layouts.guest')

@section('title', 'Home - Risotto Restaurant')

@section('content')

    {{-- Banner --}}
    <div id="home" class="banner-area">
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('tpt/img/background02.jpg') }})"></div>
        <div class="home-wrapper">
            <div class="col-md-10 col-md-offset-1 text-center">
                <div class="home-content">
                    <h1 class="white-text">Selamat Datang di Restoran ABC</h1>
                    <h4 class="white-text lead">"Nikmati Hidangan Lezat, Pesan Praktis, Rasa Tak Terlupakan."</h4>
                    <a href="#menu"><button class="main-button">Temukan Menu</button></a>
                </div>
            </div>
        </div>
    </div>

    {{-- About --}}
    <div id="about" class="section">
        <div class="container">
            <div class="row">
                <div class="section-header text-center">
                    <h4 class="sub-title">Tentang Kami</h4>
                    <h2 class="title">Restoran ABC</h2>
                </div>

                <div class="col-md-5">
                    <h4 class="lead">Selamat datang di Restoran ABC! Sejak 2025, kami hadir dengan hidangan modern,
                        praktis, dan lezat yang siap Anda pesan dan nikmati kapan saja, di mana saja.</h4>
                </div>

                <div class="col-md-7">
                    <p>Restoran ABC adalah restoran modern yang menghadirkan beragam hidangan lezat dengan konsep praktis
                        dan kekinian. Mengusung semangat “Good Food, Easy Life”, kami menyajikan menu favorit seperti rice
                        bowl, mie, pasta, camilan, hingga minuman kekinian yang diracik dengan bahan segar dan berkualitas.
                    </p>
                    <p>
                        Dengan layanan online dan delivery yang cepat, pelanggan dapat menikmati hidangan Restoran ABC kapan
                        saja dan di mana saja, cukup dengan sekali klik. Setiap menu dikemas rapi dan higienis sehingga
                        tetap nikmat meski dinikmati di rumah, kantor, atau saat perjalanan.
                    </p>
                    <p>
                        Restoran ABC menjadi pilihan tepat bagi mahasiswa, pekerja kantoran, hingga keluarga modern yang
                        ingin menikmati makanan enak, praktis, dan terjangkau. Kami percaya, makanan bukan hanya soal rasa,
                        tapi juga tentang pengalaman yang hangat dan menyenangkan.
                    </p>
                </div>

                <div class="col-md-12">
                    <div id="Gallery" class="owl-carousel owl-theme">
                        <div class="Gallery-item">
                            <div class="Gallery-img" style="background-image:url({{ asset('tpt/img/image01.jpg') }})"></div>
                        </div>
                        <div class="Gallery-item">
                            <div class="Gallery-img" style="background-image:url({{ asset('tpt/img/image02.jpg') }})"></div>
                            <div class="Gallery-img" style="background-image:url({{ asset('tpt/img/image03.jpg') }})"></div>
                        </div>
                        <div class="Gallery-item">
                            <div class="item-column">
                                <div class="Gallery-img" style="background-image:url({{ asset('tpt/img/image04.jpg') }})">
                                </div>
                                <div class="Gallery-img" style="background-image:url({{ asset('tpt/img/image05.jpg') }})">
                                </div>
                            </div>
                            <div class="item-column">
                                <div class="Gallery-img" style="background-image:url({{ asset('tpt/img/image06.jpg') }})">
                                </div>
                                <div class="Gallery-img" style="background-image:url({{ asset('tpt/img/image07.jpg') }})">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Menu --}}
    <div id="menu" class="section">
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('tpt/img/background01.jpg') }})">
        </div>
        <div class="container">
            <div class="row">
                <div class="section-header text-center">
                    <h4 class="sub-title">Temukan</h4>
                    <h2 class="title white-text">Menu Kami</h2>
                </div>

                <ul class="menu-nav">
                    <li class="active"><a data-toggle="tab" href="#makanan">Makanan</a></li>
                    <li><a data-toggle="tab" href="#minuman">Minuman</a></li>
                    <li><a data-toggle="tab" href="#camilan">Camilan</a></li>
                </ul>

                <div id="menu-content" class="tab-content">

                    {{-- Tab Makanan --}}
                    <div id="makanan" class="tab-pane fade in active">
                        <div class="col-md-6">

                            <!-- single dish -->
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Chicken Sambal Matah Bowl</h4>
                                    <h4 class="price">Rp25.000</h4>
                                </div>
                                <p>Ayam goreng dengan sambal matah khas Bali.</p>
                            </div>
                            <!-- /single dish -->

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Beef Black Pepper Bowl</h4>
                                    <h4 class="price">Rp32.000</h4>
                                </div>
                                <p>Daging sapi dengan saus lada hitam.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Chicken Salted Egg Bowl</h4>
                                    <h4 class="price">Rp27.000</h4>
                                </div>
                                <p>Ayam crispy dengan saus telur asin.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Ayam Geprek Keju Mozarella</h4>
                                    <h4 class="price">Rp28.000</h4>
                                </div>
                                <p>Ayam geprek pedas gurih dengan lelehan keju mozarella yang nikmat.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Sup Ayam Hangat</h4>
                                    <h4 class="price">Rp20.000</h4>
                                </div>
                                <p>Sup ayam hangat dengan kuah gurih dan segar.</p>
                            </div>


                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Nasi Goreng Spesial</h4>
                                    <h4 class="price">Rp24.000</h4>
                                </div>
                                <p>Nasi goreng dengan bumbu spesial, dilengkapi telur, ayam, dan sayuran segar.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Lasagna Cheese Melt</h4>
                                    <h4 class="price">Rp35.000</h4>
                                </div>
                                <p>Lasagna lembut dengan lelehan keju melimpah.</p>
                            </div>


                        </div>
                        <div class="col-md-6">

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Teriyaki Salmon Bowl</h4>
                                    <h4 class="price">Rp45.000</h4>
                                </div>
                                <p>Ikan salmon dengan saus teriyaki.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Mix Bowl (Ayam + Telur + Sayur)</h4>
                                    <h4 class="price">Rp28.000</h4>
                                </div>
                                <p>Perpaduan ayam lembut, telur gurih, dan sayuran segar dalam satu mangkuk.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Mie Goreng Spicy</h4>
                                    <h4 class="price">Rp22.000</h4>
                                </div>
                                <p>Mie goreng dengan tingkat kepedasan sesuai selera.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Mie Kuah Pedas</h4>
                                    <h4 class="price">Rp23.000</h4>
                                </div>
                                <p>Mie hangat dengan kuah pedas gurih.</p>
                            </div>


                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Spaghetti Bolognese</h4>
                                    <h4 class="price">Rp28.000</h4>
                                </div>
                                <p>Pasta dengan saus tomat daging cincang.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Spaghetti Carbonara</h4>
                                    <h4 class="price">Rp30.000</h4>
                                </div>
                                <p>Spaghetti creamy dengan saus carbonara gurih.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Sate Ayam Madura</h4>
                                    <h4 class="price">Rp22.000</h4>
                                </div>
                                <p>Sate ayam empuk dengan bumbu kacang khas Madura.</p>
                            </div>


                        </div>
                    </div>

                    {{-- Tab Minuman --}}
                    <div id="minuman" class="tab-pane fade">
                        <div class="col-md-6">
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Es Teh Manis</h4>
                                    <h4 class="price">Rp8.000</h4>
                                </div>
                                <p>Teh segar manis disajikan dingin.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Es Jeruk Segar</h4>
                                    <h4 class="price">Rp10.000</h4>
                                </div>
                                <p>Jeruk peras asli tanpa pengawet.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Es Kopi Susu Gula Aren</h4>
                                    <h4 class="price">Rp20.000</h4>
                                </div>
                                <p>Kopi susu dingin dengan manis legit gula aren.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Matcha Latte</h4>
                                    <h4 class="price">Rp22.000</h4>
                                </div>
                                <p>Minuman matcha creamy dengan aroma teh hijau khas Jepang.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Thai Tea</h4>
                                    <h4 class="price">Rp18.000</h4>
                                </div>
                                <p>Teh ala Thailand dengan rasa manis dan creamy.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Chocolate Ice/Hot</h4>
                                    <h4 class="price">Rp18.000</h4>
                                </div>
                                <p>Minuman cokelat nikmat, bisa disajikan dingin atau panas.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Taro Latte</h4>
                                    <h4 class="price">Rp20.000</h4>
                                </div>
                                <p>Minuman taro ungu manis dengan rasa creamy yang lembut.</p>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Kopi Hitam</h4>
                                    <h4 class="price">Rp12.000</h4>
                                </div>
                                <p>Kopi pilihan dengan cita rasa pekat.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Cappuccino</h4>
                                    <h4 class="price">Rp18.000</h4>
                                </div>
                                <p>Kopi dengan campuran susu dan foam lembut.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Jus Alpukat</h4>
                                    <h4 class="price">Rp20.000</h4>
                                </div>
                                <p>Jus alpukat segar dengan rasa lembut dan creamy.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Jus Mangga</h4>
                                    <h4 class="price">Rp18.000</h4>
                                </div>
                                <p>Jus mangga manis segar dari buah pilihan.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Jus Stroberi</h4>
                                    <h4 class="price">Rp18.000</h4>
                                </div>
                                <p>Jus stroberi segar dengan rasa manis asam alami.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Mineral Water</h4>
                                    <h4 class="price">Rp6.000</h4>
                                </div>
                                <p>Air mineral murni untuk menyegarkan hari Anda.</p>
                            </div>


                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Lemon Tea</h4>
                                    <h4 class="price">Rp12.000</h4>
                                </div>
                                <p>Teh segar dengan perasan lemon alami.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Tab Camilan --}}
                    <div id="camilan" class="tab-pane fade">
                        <div class="col-md-6">
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">French Fries</h4>
                                    <h4 class="price">Rp15.000</h4>
                                </div>
                                <p>Kentang goreng renyah dengan saus.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Chicken Wings</h4>
                                    <h4 class="price">Rp25.000</h4>
                                </div>
                                <p>Sayap ayam goreng dengan saus pilihan.</p>
                            </div>


                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Pisang Goreng Cokelat Keju</h4>
                                    <h4 class="price">Rp18.000</h4>
                                </div>
                                <p>Pisang goreng manis dengan topping cokelat dan keju.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Roti Bakar Cokelat</h4>
                                    <h4 class="price">Rp15.000</h4>
                                </div>
                                <p>Roti bakar hangat dengan olesan cokelat manis.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Cireng Bumbu Rujak</h4>
                                    <h4 class="price">Rp15.000</h4>
                                </div>
                                <p>Cireng gurih disajikan dengan bumbu rujak pedas manis.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Martabak Mini Manis</h4>
                                    <h4 class="price">Rp20.000</h4>
                                </div>
                                <p>Martabak mini lembut dengan aneka topping manis.</p>
                            </div>


                        </div>

                        <div class="col-md-6">
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Onion Rings</h4>
                                    <h4 class="price">Rp18.000</h4>
                                </div>
                                <p>Bawang bombay goreng crispy.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Sosis Bakar</h4>
                                    <h4 class="price">Rp15.000</h4>
                                </div>
                                <p>Sosis panggang dengan bumbu spesial.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Tahu Crispy</h4>
                                    <h4 class="price">Rp12.000</h4>
                                </div>
                                <p>Tahu goreng renyah dengan rasa gurih.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Tempe Mendoan</h4>
                                    <h4 class="price">Rp12.000</h4>
                                </div>
                                <p>Tempe goreng tipis dengan balutan tepung gurih.</p>
                            </div>

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Bakwan Jagung</h4>
                                    <h4 class="price">Rp12.000</h4>
                                </div>
                                <p>Gorengan jagung renyah dengan rasa gurih manis.</p>
                            </div>


                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Lumpia Sayur</h4>
                                    <h4 class="price">Rp12.000</h4>
                                </div>
                                <p>Lumpia renyah berisi sayuran segar.</p>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    `
    {{-- Reservation --}}
    <div id="reservation" class="section">
        <div class="bg-image"
            style="background-image:url({{ asset('tpt/img/background03.jpg') }}); 
            height:500px; 
            background-size:cover; 
            background-position:center;">
        </div>

        <div class="container">

            <div class="row">
                <!-- opening time -->
                <div class="col-md-6 col-sm-10 col-md-offset-3 col-sm-offset-1">
                    <div class="opening-time row">
                        <div class="section-header text-center">
                            <h2 class="title white-text">Jam Buka</h2>
                        </div>
                        <ul>
                            <li>
                                <h4 class="day">Minggu</h4>
                                <h4 class="hours">08:00 – 23:00</h4>
                            </li>
                            <li>
                                <h4 class="day">Senin</h4>
                                <h4 class="hours">08:00 – 23:00</h4>
                            </li>
                            <li>
                                <h4 class="day">Selasa</h4>
                                <h4 class="hours">08:00 – 23:00</h4>
                            </li>
                            <li>
                                <h4 class="day">Rabu</h4>
                                <h4 class="hours">08:00 – 23:00</h4>
                            </li>
                            <li>
                                <h4 class="day">Kamis</h4>
                                <h4 class="hours">08:00 – 23:00</h4>
                            </li>
                            <li>
                                <h4 class="day">Jumat</h4>
                                <h4 class="hours">08:00 – 23:00</h4>
                            </li>
                            <li>
                                <h4 class="day">Sabtu</h4>
                                <h4 class="hours">08:00 – 00:00</h4>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Events --}}
    <br>
    <br>
    <div class="section-header text-center">
        <h4 class="sub-title">Terimakasih Telah Mengunjungi </h4>
        <h2 class="title">Restoran ABC</h2>
    </div>

    {{-- Contact --}}


@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let checkboxes = document.querySelectorAll('.menu-checkbox');
        let totalInput = document.getElementById('total_harga');

        function updateTotal() {
            let total = 0;
            checkboxes.forEach(cb => {
                let jumlahInput = cb.closest('div').querySelector('.menu-jumlah');
                if (cb.checked) {
                    jumlahInput.disabled = false;
                    let jumlah = parseInt(jumlahInput.value) || 1;
                    total += parseInt(cb.getAttribute('data-harga')) * jumlah;
                } else {
                    jumlahInput.disabled = true;
                }
            });
            totalInput.value = total;
        }

        checkboxes.forEach(cb => cb.addEventListener('change', updateTotal));
        document.querySelectorAll('.menu-jumlah').forEach(input => {
            input.addEventListener('input', updateTotal);
        });
    });
</script>

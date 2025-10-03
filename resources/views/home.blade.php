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
                <h2
                    style="text-align: center; color: #fff; border-bottom: 2px solid #fff; padding-bottom: 8px; margin-bottom: 20px;">
                    Makanan
                </h2>



                {{-- Contoh item menu --}}
                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item">
                        <img src="{{ asset('tpt/images/crispy-chicken-sambal-matah.jpg') }}" class="img-responsive"
                            alt="">
                        <h3>Chicken Sambal Matah Bowl</h3>
                        <span class="fh5co-price">Rp25.000</span>
                        <p>Ayam goreng dengan sambal matah khas Bali.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item margin_top">
                        <img src="{{ asset('tpt/images/Beef-Black-Pepper-Bow.jpg') }}" class="img-responsive"
                            alt="">
                        <h3>Beef Black Pepper Bowl</h3>
                        <span class="fh5co-price">Rp32.000</span>
                        <p>Daging sapi dengan saus lada hitam.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item">
                        <img src="{{ asset('tpt/images/Chicken Salted Egg.jpg') }}" class="img-responsive" alt="">
                        <h3>Chicken Salted Egg Bowl</h3>
                        <span class="fh5co-price">Rp27.000</span>
                        <p>Ayam crispy dengan saus telur asin.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item margin_top">
                        <img src="{{ asset('tpt/images/Teriyaki-Salmon-Bowl.jpg') }}" class="img-responsive" alt="">
                        <h3>Teriyaki Salmon Bowl</h3>
                        <span class="fh5co-price">Rp45.000</span>
                        <p>Ikan salmon dengan saus teriyaki.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item">
                        <img src="{{ asset('tpt/images/Ayam Geprek Keju Mozarella.jpg') }}" class="img-responsive"
                            alt="">
                        <h3>Ayam Geprek Keju Mozarella</h3>
                        <span class="fh5co-price">Rp28.000</span>
                        <p>Ayam geprek pedas gurih dengan lelehan keju mozarella yang nikmat.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item margin_top">
                        <img src="{{ asset('tpt/images/nasi goreng.jpg') }}" class="img-responsive" alt="">
                        <h3>Nasi Goreng Spesial</h3>
                        <span class="fh5co-price">Rp24.000</span>
                        <p>Nasi goreng dengan bumbu spesial, dilengkapi telur, ayam, dan sayuran segar.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item">
                        <img src="{{ asset('tpt/images/mie pedas.jpg') }}" class="img-responsive" alt="">
                        <h3>Mie Goreng Spicy</h3>
                        <span class="fh5co-price">Rp22.000</span>
                        <p>Mie goreng dengan tingkat kepedasan sesuai selera.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item margin_top">
                        <img src="{{ asset('tpt/images/Ramen.jpg') }}" class="img-responsive" alt="">
                        <h3>Ramen</h3>
                        <span class="fh5co-price">Rp25.000</span>
                        <p>Mie ramen dengan tingkat kepedasan sesuai selera.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item">
                        <img src="{{ asset('tpt/images/spageti2.jpg') }}" class="img-responsive" alt="">
                        <h3>Spaghetti Bolognese</h3>
                        <span class="fh5co-price">Rp28.000</span>
                        <p>Pasta dengan saus tomat daging cincang.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item margin_top">
                        <img src="{{ asset('tpt/images/spageti1.jpg') }}" class="img-responsive" alt="">
                        <h3>Spaghetti Carbonara</h3>
                        <span class="fh5co-price">Rp30.000</span>
                        <p>Spaghetti creamy dengan saus carbonara gurih.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item">
                        <img src="{{ asset('tpt/images/Classic Beef Lasagna with Ricotta & Mozzarella - The Comfort Spoon.jpg') }}"
                            class="img-responsive" alt="">
                        <h3>Lasagna Cheese Melt</h3>
                        <span class="fh5co-price">Rp35.000</span>
                        <p>Lasagna lembut dengan lelehan keju melimpah.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                    <div class="fh5co-item margin_top">
                        <img src="{{ asset('tpt/images/Sup Ayam Fillet.jpg') }}" class="img-responsive" alt="">
                        <h3>Sup Ayam Hangat</h3>
                        <span class="fh5co-price">Rp20.000</span>
                        <p>Sup ayam hangat dengan kuah gurih dan segar.</p>
                    </div>
                </div>
            </div>
                {{-- Minuman --}}
                <div class="row">
                    <h2 style="text-align: center; color: #fff; border-bottom: 2px solid #fff; padding-bottom: 8px; margin-bottom: 20px;">
                        Minuman
                    </h2>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/es teh.jpg') }}" class="img-responsive" alt="">
                            <h3>Es Teh Manis</h3>
                            <span class="fh5co-price">Rp8.000</span>
                            <p>Segelas teh manis dingin yang menyegarkan.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/es jerukk.jpg') }}" class="img-responsive" alt="">
                            <h3>Es Jeruk Segar</h3>
                            <span class="fh5co-price">Rp10.000</span>
                            <p>Perasan jeruk segar dengan rasa manis alami.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/es susu gula aren.jpg') }}" class="img-responsive"
                                alt="">
                            <h3>Es Kopi Susu Gula Aren</h3>
                            <span class="fh5co-price">Rp20.000</span>
                            <p>Kopi susu segar dengan manis gula aren khas.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/macha latte.jpg') }}" class="img-responsive" alt="">
                            <h3>Matcha Latte</h3>
                            <span class="fh5co-price">Rp22.000</span>
                            <p>Minuman matcha creamy dengan aroma khas Jepang.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/thai tea.jpeg') }}" class="img-responsive" alt="">
                            <h3>Thai Tea</h3>
                            <span class="fh5co-price">Rp18.000</span>
                            <p>Teh ala Thailand dengan rasa manis legit.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/chocolate ice.jpg') }}" class="img-responsive"
                                alt="">
                            <h3>Chocolate Ice/Hot</h3>
                            <span class="fh5co-price">Rp18.000</span>
                            <p>Minuman cokelat lezat bisa disajikan dingin atau hangat.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/taro latte.jpeg') }}" class="img-responsive" alt="">
                            <h3>Taro Latte</h3>
                            <span class="fh5co-price">Rp20.000</span>
                            <p>Minuman taro manis dengan tekstur creamy.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/kopi hitam.jpeg') }}" class="img-responsive" alt="">
                            <h3>Kopi Hitam</h3>
                            <span class="fh5co-price">Rp12.000</span>
                            <p>Kopi hitam pekat dengan cita rasa klasik.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/cappucino.jpg') }}" class="img-responsive" alt="">
                            <h3>Cappuccino</h3>
                            <span class="fh5co-price">Rp18.000</span>
                            <p>Kopi dengan foam susu lembut dan nikmat.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/jus alpukat.jpg') }}" class="img-responsive" alt="">
                            <h3>Jus Alpukat</h3>
                            <span class="fh5co-price">Rp20.000</span>
                            <p>Jus alpukat segar dengan tekstur creamy alami.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/jus mangga.jpg') }}" class="img-responsive" alt="">
                            <h3>Jus Mangga</h3>
                            <span class="fh5co-price">Rp18.000</span>
                            <p>Jus mangga manis menyegarkan khas tropis.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/jus stroberi.jpeg') }}" class="img-responsive"
                                alt="">
                            <h3>Jus Stroberi</h3>
                            <span class="fh5co-price">Rp18.000</span>
                            <p>Jus stroberi segar dengan rasa manis asam alami.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/mineral.jpeg') }}" class="img-responsive" alt="">
                            <h3>Mineral Water</h3>
                            <span class="fh5co-price">Rp6.000</span>
                            <p>Air mineral kemasan yang menyegarkan.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/lemon tea.jpg') }}" class="img-responsive" alt="">
                            <h3>Lemon Tea</h3>
                            <span class="fh5co-price">Rp12.000</span>
                            <p>Teh segar dengan perasan lemon alami.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/stroberi-boba-tea.jpeg') }}" class="img-responsive"
                                alt="">
                            <h3>Strawberry Boba Tea</h3>
                            <span class="fh5co-price">Rp35.000</span>
                            <p>Teh segar rasa stroberi manis dengan susu creamy dan boba kenyal.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/Purple-Boba-Tea.jpeg') }}" class="img-responsive"
                                alt="">
                            <h3>Purple Boba Tea</h3>
                            <span class="fh5co-price">Rp35.000</span>
                            <p>Teh susu lembut dengan rasa ubi ungu manis, dipadukan boba kenyal yang bikin nagih.</p>
                        </div>
                    </div>
                </div>

                {{-- Camilan --}}
                <div class="row">
                   <h2 style="text-align: center; color: #fff; border-bottom: 2px solid #fff; padding-bottom: 8px; margin-bottom: 20px;">
                  Camilan
                    </h2>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/freanch friesh.jpg') }}" class="img-responsive"
                                alt="">
                            <h3>French Fries</h3>
                            <span class="fh5co-price">Rp15.000</span>
                            <p>Kentang goreng renyah dengan taburan bumbu gurih.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/chicken-wings.jpeg') }}" class="img-responsive"
                                alt="">
                            <h3>Chicken Wings</h3>
                            <span class="fh5co-price">Rp25.000</span>
                            <p>Sayap ayam goreng dengan bumbu spesial.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/pisang goreng.jpeg') }}" class="img-responsive"
                                alt="">
                            <h3>Pisang Goreng Cokelat Keju</h3>
                            <span class="fh5co-price">Rp18.000</span>
                            <p>Pisang goreng dengan topping cokelat dan keju .</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/roti bakar.jpg') }}" class="img-responsive" alt="">
                            <h3>Roti Bakar Cokelat</h3>
                            <span class="fh5co-price">Rp15.000</span>
                            <p>Roti bakar hangat dengan isian cokelat manis.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/cireng.jpg') }}" class="img-responsive" alt="">
                            <h3>Cireng Bumbu Rujak</h3>
                            <span class="fh5co-price">Rp15.000</span>
                            <p>Cireng gurih dengan cocolan bumbu rujak pedas manis.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/martabak mini.jpg') }}" class="img-responsive"
                                alt="">
                            <h3>Martabak Mini Manis</h3>
                            <span class="fh5co-price">Rp20.000</span>
                            <p>Martabak mini dengan isian manis beragam.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/onion rings.jpg') }}" class="img-responsive" alt="">
                            <h3>Onion Rings</h3>
                            <span class="fh5co-price">Rp18.000</span>
                            <p>Bawang bombay goreng renyah berbentuk cincin.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/sosis.jpg') }}" class="img-responsive" alt="">
                            <h3>Sosis Bakar</h3>
                            <span class="fh5co-price">Rp15.000</span>
                            <p>Sosis panggang dengan rasa gurih manis.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/tahu.jpg') }}" class="img-responsive" alt="">
                            <h3>Tahu Crispy</h3>
                            <span class="fh5co-price">Rp12.000</span>
                            <p>Tahu goreng renyah di luar, lembut di dalam.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/mendoan.jpg') }}" class="img-responsive" alt="">
                            <h3>Tempe Mendoan</h3>
                            <span class="fh5co-price">Rp12.000</span>
                            <p>Tempe goreng tipis dengan rasa gurih khas.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item">
                            <img src="{{ asset('tpt/images/bakwan.jpg') }}" class="img-responsive" alt="">
                            <h3>Bakwan Jagung</h3>
                            <span class="fh5co-price">Rp12.000</span>
                            <p>Bakwan goreng dengan jagung manis yang renyah.</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-6 fh5co-item-wrap animate-box">
                        <div class="fh5co-item margin_top">
                            <img src="{{ asset('tpt/images/lumpia.jpg') }}" class="img-responsive" alt="">
                            <h3>Lumpia Sayur</h3>
                            <span class="fh5co-price">Rp12.000</span>
                            <p>Lumpia goreng dengan isian sayuran segar.</p>
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
                                                        <p>Nasi hangat dengan ayam suwir pedas sambal matah segar,
                                                            cocok untuk pecinta pedas.</p>
                                                        <p><a href="{{ route('menunya') }}"
                                                                class="btn btn-primary btn-outline">Lihat Menu</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li style="background-image: url({{ asset('tpt/images/Teriyaki-Salmon-Bowl.jpg') }});">
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
                                                                class="btn btn-primary btn-outline">Lihat Menu</a></p>
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

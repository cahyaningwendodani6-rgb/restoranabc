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
                                    <h4 class="name">Beef Blackpepper Bowl</h4>
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

                        </div>
                        <div class="col-md-6">

                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Fish Crispy Teriyaki Bowl</h4>
                                    <h4 class="price">Rp30.000</h4>
                                </div>
                                <p>Ikan crispy dengan saus teriyaki.</p>
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
                                    <h4 class="name">Spaghetti Bolognese</h4>
                                    <h4 class="price">Rp28.000</h4>
                                </div>
                                <p>Pasta dengan saus tomat daging cincang.</p>
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
                        </div>

                        <div class="col-md-6">
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Onion Rings</h4>
                                    <h4 class="price">Rp18.000</h4>
                                </div>
                                <p>Bawang bombay goreng crispy.</p>
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
        <div class="bg-image" style="background-image:url({{ asset('tpt/img/background03.jpg') }})"></div>
        <div class="container">

            <div class="row">
                <!-- reservation form -->
                <div class="col-md-6 col-md-offset-1 col-sm-10 col-sm-offset-1">

                    <form action="{{ route('formpesanan.store') }}" method="POST" class="reserve-form row">
                        @csrf

                        <div class="section-header text-center">
                            <h4 class="sub-title">Reservasi</h4>
                            <h2 class="title white-text">Pesanan Anda</h2>
                        </div>

                        <!-- Nama -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="nama"
                                    class="input @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Telepon -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telp">No. Telepon</label>
                                <input type="text" id="telp" name="telp"
                                    class="input @error('telp') is-invalid @enderror" value="{{ old('telp') }}">
                                @error('telp')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email"
                                    class="input @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" name="alamat" class="input @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Pesanan (checkbox menu) -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pesanan</label>
                                <div class="row">
                                    @foreach ($menu->groupBy('kategori') as $kategori => $items)
                                        <div class="col-12 mb-2">
                                            <strong>{{ ucfirst($kategori) }}</strong>
                                        </div>
                                        @foreach ($items as $item)
                                            <div class="col-md-6">
                                                <label>
                                                    <input type="checkbox" name="menu[{{ $item->id }}][id]"
                                                        class="menu-checkbox" value="{{ $item->id }}"
                                                        data-harga="{{ $item->harga }}">
                                                    {{ $item->nama }} - Rp
                                                    {{ number_format($item->harga, 0, ',', '.') }}
                                                </label>
                                                <input type="number" name="menu[{{ $item->id }}][jumlah]"
                                                    class="menu-jumlah" value="1" min="1" disabled
                                                    style="width:60px; margin-left:5px;">
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Metode Pembayaran -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="metode_pembayaran">Metode Pembayaran</label>
                                <select id="metode_pembayaran" name="metode_pembayaran"
                                    class="input @error('metode_pembayaran') is-invalid @enderror">
                                    <option value="">-- Pilih Metode --</option>
                                    <option value="Transfer"
                                        {{ old('metode_pembayaran') == 'Transfer' ? 'selected' : '' }}>
                                        Transfer Bank</option>
                                    <option value="QRIS" {{ old('metode_pembayaran') == 'QRIS' ? 'selected' : '' }}>QRIS
                                    </option>
                                </select>
                                @error('metode_pembayaran')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Catatan -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="catatan">Pesan untuk Penjual</label>
                                <textarea id="catatan" name="catatan" class="input @error('catatan') is-invalid @enderror">{{ old('catatan') }}</textarea>
                                @error('catatan')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Total harga -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <input type="number" id="total_harga" name="total_harga" class="input"
                                    value="{{ old('total_harga') }}" readonly>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="col-md-12 text-center">
                            <button type="submit" class="main-button">Pesan Sekarang</button>
                        </div>
                    </form>

                </div>
                <!-- /reservation form -->

                <!-- opening time -->
                <div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1">
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

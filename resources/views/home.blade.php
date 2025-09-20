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
                    <h4 class="white-text lead">Nec solet elaboraret eu, ea usu vidit accusam. Ea per legimus singulis
                        percipitur...</h4>
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
                    <h4 class="sub-title">About Us</h4>
                    <h2 class="title">The Risotto Restaurant</h2>
                </div>

                <div class="col-md-5">
                    <h4 class="lead">Welcome to Risotto Restaurant. Since 1988...</h4>
                </div>

                <div class="col-md-7">
                    <p>Te sit stet labitur veritus, sea similique consetetur ut...</p>
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
                    <h4 class="sub-title">Discover</h4>
                    <h2 class="title white-text">Our Menu</h2>
                </div>

                <ul class="menu-nav">
                    <li class="active"><a data-toggle="tab" href="#menu1">Dinner</a></li>
                    <li><a data-toggle="tab" href="#menu1">Drinks</a></li>
                    <li><a data-toggle="tab" href="#menu1">Launch</a></li>
                    <li><a data-toggle="tab" href="#menu1">Dessert</a></li>
                </ul>

                <div id="menu-content" class="tab-content">
                    <div id="menu1" class="tab-pane fade in active">
                        {{-- contoh dish --}}
                        <div class="col-md-6">

                            <!-- single dish -->
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Basted Rhubarb Mussels</h4>
                                    <h4 class="price">57£</h4>
                                </div>
                                <p>te vero tritani iuvaret vis. Nec odio periculis adipiscing an.</p>
                            </div>
                            <!-- /single dish -->

                            <!-- single dish -->
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Steamed Chili Moussaka</h4>
                                    <h4 class="price">145£</h4>
                                </div>
                                <p>te vero tritani iuvaret vis. Nec odio periculis adipiscing an.</p>
                            </div>
                            <!-- /single dish -->

                            <!-- single dish -->
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Blanched Fennel & Orange Lasagna</h4>
                                    <h4 class="price">79£</h4>
                                </div>
                                <p>te vero tritani iuvaret vis. Nec odio periculis adipiscing an.</p>
                            </div>
                            <!-- /single dish -->

                            <!-- single dish -->
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Slow-Cooked Basil & Lime Ostrich</h4>
                                    <h4 class="price">57£</h4>
                                </div>
                                <p>te vero tritani iuvaret vis. Nec odio periculis adipiscing an.</p>
                            </div>
                            <!-- /single dish -->

                            <!-- single dish -->
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Stuffed Oregano Chicken</h4>
                                    <h4 class="price">145£</h4>
                                </div>
                                <p>te vero tritani iuvaret vis. Nec odio periculis adipiscing an.</p>
                            </div>
                            <!-- /single dish -->

                        </div>

                        <div class="col-md-6">

                            <!-- single dish -->
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Pressure-Fried Asparagus Chicken</h4>
                                    <h4 class="price">57£</h4>
                                </div>
                                <p>te vero tritani iuvaret vis. Nec odio periculis adipiscing an.</p>
                            </div>
                            <!-- /single dish -->

                            <!-- single dish -->
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Tenderized Egg & Coconut Duck</h4>
                                    <h4 class="price">87£</h4>
                                </div>
                                <p>te vero tritani iuvaret vis. Nec odio periculis adipiscing an.</p>
                            </div>
                            <!-- /single dish -->

                            <!-- single dish -->
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Milk Chocolate Gingerbread</h4>
                                    <h4 class="price">155£</h4>
                                </div>
                                <p>te vero tritani iuvaret vis. Nec odio periculis adipiscing an.</p>
                            </div>
                            <!-- /single dish -->

                            <!-- single dish -->
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Simmered Mango & Pine Rabbit</h4>
                                    <h4 class="price">57£</h4>
                                </div>
                                <p>te vero tritani iuvaret vis. Nec odio periculis adipiscing an.</p>
                            </div>
                            <!-- /single dish -->

                            <!-- single dish -->
                            <div class="single-dish">
                                <div class="single-dish-heading">
                                    <h4 class="name">Red Wine Surprise</h4>
                                    <h4 class="price">87£</h4>
                                </div>
                                <p>te vero tritani iuvaret vis. Nec odio periculis adipiscing an.</p>
                            </div>
                            <!-- /single dish -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <h4 class="sub-title">Reservation</h4>
                            <h2 class="title white-text">Book Your Table</h2>
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
                            <h2 class="title white-text">Opening Time</h2>
                        </div>
                        <ul>
                            <li>
                                <h4 class="day">Sunday</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Monday</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Tuesday</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Wednesday</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Thursday</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Friday</h4>
                                <h4 class="hours">Closed</h4>
                            </li>
                            <li>
                                <h4 class="day">Saturday</h4>
                                <h4 class="hours">Closed</h4>
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

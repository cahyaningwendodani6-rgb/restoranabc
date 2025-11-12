@extends('layouts.guest')

@section('title', 'Pesanan - Restoran ABC')

@php
    use Illuminate\Support\Facades\Auth;
@endphp

@section('content')
    <header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner"
        style="background-image: url({{ asset('tpt/images/hero_1.jpeg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            @if (session('success'))
                <div id="toast-success"
                    style="
            position: fixed;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 200, 100, 0.9);
            color: white;
            padding: 14px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            font-size: 15px;
            z-index: 9999;
            opacity: 0;
            transition: all 0.5s ease;
        ">
                    ✅ {{ session('success') }}
                </div>

                <script>
                    const toast = document.getElementById('toast-success');
                    setTimeout(() => {
                        toast.style.opacity = '1';
                        toast.style.top = '50px';
                    }, 100); // fade in
                    setTimeout(() => {
                        toast.style.opacity = '0';
                        toast.style.top = '20px';
                        setTimeout(() => toast.remove(), 500);
                    }, 3000); // auto hide
                </script>
            @endif


            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="display-t js-fullheight">
                        <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
                            <h1>Pesan Menu Hari Ini!</h1>
                            <h2>Pesan Hidangan Favorit Anda Secara Online dengan Mudah dan Cepat</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-reservation-form" class="fh5co-section">
        <div class="container">
            @if (!Auth::guard('pelanggan')->check())
                {{-- TAMPILAN UNTUK YANG BELUM LOGIN --}}
                <div class="row text-center">
                    <div class="col-md-12 fh5co-heading animate-box">
                        <h2>Pesanan</h2>
                        <p style="font-size:18px;">
                            Untuk melakukan pemesanan, <strong>pelanggan harus login terlebih dahulu.</strong><br>
                            Silakan klik tombol di bawah ini untuk menuju halaman login pelanggan.
                        </p>
                        <a href="{{ route('pelanggan.login') }}" class="btn btn-primary btn-outline btn-lg mt-3">
                            Login Sekarang
                        </a>
                    </div>
                </div>
            @else
                {{-- TAMPILAN UNTUK YANG SUDAH LOGIN --}}
                <div class="text-end mb-4" style="text-align: right; display: flex; justify-content: flex-end; gap: 10px;">
                    <a href="{{ route('pesanan.riwayat') }}" class="btn btn-info btn-sm">
                        Pesanan Anda
                    </a>

                    <form action="{{ route('pelanggan.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                </div>


                {{-- FORM PEMESANAN --}}
                <div class="row">
                    <div class="col-md-12 fh5co-heading animate-box">
                        <h2>Form Pemesanan</h2>
                        <p>Pilih menu favorit Anda dan lakukan pemesanan dengan cepat dan mudah.</p>
                    </div>
                </div>

                <div id="reservation" class="section pt-5 mb-5 pb-5" style="padding-top:50px;">
                    <div class="bg-image" style="background-image:url({{ asset('tpt/img/background03.jpg') }})"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-push-6 col-sm-6 col-sm-push-6">
                                <form action="{{ route('formpesanan.store') }}" method="POST" id="form-wrap">
                                    @csrf

                                    {{-- Nama --}}
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="nama">Nama</label>
                                            <input type="text" id="nama" name="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama', Auth::guard('pelanggan')->user()->name ?? '') }}">
                                            @error('nama')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Telepon --}}
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="telp">No. Telepon</label>
                                            <input type="text" id="telp" name="telp"
                                                class="form-control @error('telp') is-invalid @enderror"
                                                value="{{ old('telp') }}">
                                            @error('telp')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Email --}}
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email', Auth::guard('pelanggan')->user()->email ?? '') }}">
                                            @error('email')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Alamat --}}
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="alamat">Alamat</label>
                                            <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Pesanan --}}
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label>Pesanan</label>
                                            <div class="row">
                                                @foreach ($menu->groupBy('kategori') as $kategori => $items)
                                                    <div class="col-12 mb-2">
                                                        <strong style="color:#fff;">{{ ucfirst($kategori) }}</strong>
                                                    </div>

                                                    @foreach ($items as $item)
                                                        <div class="col-md-6">
                                                            <label>
                                                                <input type="checkbox" name="menu[{{ $item->id }}][id]"
                                                                    value="{{ $item->id }}" class="menu-checkbox"
                                                                    data-harga="{{ $item->harga }}">
                                                                {{ $item->nama }} - Rp
                                                                {{ number_format($item->harga, 0, ',', '.') }}
                                                            </label>

                                                            <input type="number" name="menu[{{ $item->id }}][jumlah]"
                                                                class="menu-jumlah" value="1" min="1"
                                                                style="background-color:black; color:white; width:60px; text-align:center;">
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Metode Pembayaran --}}
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="metode_pembayaran">Metode Pembayaran</label>
                                            <select id="metode_pembayaran" name="metode_pembayaran"
                                                class="form-control @error('metode_pembayaran') is-invalid @enderror"
                                                style="color: black; background-color: white;">
                                                <option value="">-- Pilih Metode --</option>
                                                <option value="Transfer"
                                                    {{ old('metode_pembayaran') == 'Transfer' ? 'selected' : '' }}>
                                                    Transfer Bank
                                                </option>
                                                <option value="QRIS"
                                                    {{ old('metode_pembayaran') == 'QRIS' ? 'selected' : '' }}>
                                                    QRIS
                                                </option>
                                            </select>
                                            @error('metode_pembayaran')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Catatan --}}
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="catatan">Pesan untuk Penjual</label>
                                            <textarea id="catatan" name="catatan" class="form-control @error('catatan') is-invalid @enderror">{{ old('catatan') }}</textarea>
                                            @error('catatan')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Total harga --}}
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="total_harga">Total Harga</label>
                                            <input type="number" id="total_harga" name="total_harga" class="input"
                                                readonly style="background-color:black; color:white; text-align:center;">
                                        </div>
                                    </div>


                                    {{-- Tombol --}}
                                    <div class="row form-group text-center">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-primary btn-outline btn-lg"
                                                value="Pesan Sekarang">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div id="fh5co-started" class="fh5co-section animate-box">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Pesan Menu</h2>
                    <p>Pilih hidangan favorit Anda dan nikmati cita rasa spesial dari Restoran ABC.</p>
                    <p><a href="{{ route('menunya') }}" class="btn btn-primary btn-outline">Lihat Menu</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll(".menu-checkbox");
            const totalInput = document.getElementById("total_harga");

            function hitungTotal() {
                let total = 0;
                checkboxes.forEach(cb => {
                    if (cb.checked) {
                        const parentCol = cb.closest(".col-md-6");
                        const jumlahInput = parentCol.querySelector(".menu-jumlah");
                        const jumlah = parseInt(jumlahInput.value) || 1;
                        const harga = parseInt(cb.dataset.harga) || 0;
                        total += harga * jumlah;
                    }
                });
                totalInput.value = total;
            }

            checkboxes.forEach(cb => {
                const parentCol = cb.closest(".col-md-6");
                const jumlahInput = parentCol.querySelector(".menu-jumlah");

                if (!cb.checked) {
                    jumlahInput.disabled = true;
                }
                cb.addEventListener("change", function() {
                    if (cb.checked) {
                        jumlahInput.disabled = false;
                    } else {
                        jumlahInput.disabled = true;
                        jumlahInput.value = 1;
                    }
                    hitungTotal();
                });

                jumlahInput.addEventListener("input", hitungTotal);
            });

            hitungTotal();
        });
    </script>
@endsection

@extends('layouts.guest')

@section('title', 'Pesan - Restoran ABC')

@section('content')
    <div id="reservation" class="section pt-5 mb-5 pb-5" style="padding-top:170px;">

        <div class="bg-image" style="background-image:url({{ asset('tpt/img/background03.jpg') }})"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12"> 

                    {{-- Form Pesanan --}}
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

                        <!-- Pesanan -->
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
                    {{-- /Form Pesanan --}}
                </div>
            </div>
        </div>
    </div>

    <br>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll(".menu-checkbox");
            const totalInput = document.getElementById("total_harga");

            function hitungTotal() {
                let total = 0;
                checkboxes.forEach(chk => {
                    if (chk.checked) {
                        const harga = parseInt(chk.dataset.harga);
                        const jumlahInput = chk.closest("label").nextElementSibling;
                        const jumlah = parseInt(jumlahInput.value);
                        total += harga * jumlah;
                    }
                });
                totalInput.value = total;
            }

            checkboxes.forEach(chk => {
                const jumlahInput = chk.closest("label").nextElementSibling;

                chk.addEventListener("change", function() {
                    if (chk.checked) {
                        jumlahInput.disabled = false;
                    } else {
                        jumlahInput.disabled = true;
                        jumlahInput.value = 1;
                    }
                    hitungTotal();
                });

                jumlahInput.addEventListener("input", hitungTotal);
            });
        });
    </script>
@endpush

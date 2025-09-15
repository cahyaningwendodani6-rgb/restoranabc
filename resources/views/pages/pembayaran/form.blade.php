@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="fw-bold mb-3">Pembayaran</h3>

                {{-- Notifikasi sukses --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow-sm p-4">

                    {{-- Cek status pesanan --}}
                    @if ($pesanan->status !== 'Lunas')
                        {{-- Kalau BELUM lunas, tampilkan form & harga --}}
                        <div class="mb-3">
                            <label class="form-label">Subtotal</label>
                            <input type="text" class="form-control" value="Rp {{ number_format($subtotal, 0, ',', '.') }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total</label>
                            <input type="text" class="form-control" value="Rp {{ number_format($total, 0, ',', '.') }}"
                                readonly>
                        </div>

                        <form action="{{ route('pembayaran.process', $pesanan->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Metode Pembayaran</label>
                                <select name="metode" class="form-select" required>
                                    <option value="">Pilih metode</option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="QRIS">QRIS</option>
                                </select>
                            </div>
                            <button type="submit" class="btn w-100"
                                style="background-color:#222; color:white; font-weight:500;">
                                Bayar
                            </button>
                        </form>
                    @else
                        {{-- Kalau SUDAH lunas, harga & tombol hilang --}}
                        <div class="alert alert-success text-center fw-bold">
                            ✅ Pembayaran untuk pesanan #{{ $pesanan->id }} sudah berhasil
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

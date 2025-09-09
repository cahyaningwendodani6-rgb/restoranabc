@extends('layouts.app')

@section('title', 'Pembayaran Pesanan')

@section('content')
<div class="container py-4">
  <div class="card shadow p-4">
    <h2 class="fw-bold mb-3">Pembayaran Pesanan</h2>
    <p><strong>ID Pesanan:</strong> {{ $pesanan->id }}</p>
    <p><strong>Nama:</strong> {{ $pesanan->nama }}</p>
    <p><strong>Total:</strong> Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>

    <hr>

    <p class="text-success fw-bold">✅ Simulasi pembayaran berhasil.</p>
    <p class="text-muted">(Di dunia nyata, halaman ini harusnya redirect ke aplikasi e-wallet / bank)</p>

    <a href="{{ route('pesanan.struk', $pesanan->id) }}" class="btn btn-primary mt-3">
      Kembali ke Struk
    </a>
  </div>
</div>
@endsection

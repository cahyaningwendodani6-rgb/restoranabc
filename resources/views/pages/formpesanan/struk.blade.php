@extends('layouts.app')

@section('title', 'Struk Pesanan')

@section('content')
<div class="container py-4">
  <div class="card shadow p-4">
    <h2 class="fw-bold mb-3">Struk Pesanan</h2>
    <p><strong>Nama:</strong> {{ $pesanan->nama }}</p>
    <p><strong>Nomor HP:</strong> {{ $pesanan->telp }}</p>
    <p><strong>Alamat:</strong> {{ $pesanan->alamat }}</p>

    <hr>

    <h5 class="fw-bold">Detail Pesanan</h5>
    <table class="table table-sm">
      <thead>
        <tr>
          <th>Menu</th>
          <th class="text-center">Qty</th>
          <th class="text-end">Harga</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pesanan->items as $item)
        <tr>
          <td>{{ $item->nama }}</td>
          <td class="text-center">{{ $item->pivot->qty }}</td>
          <td class="text-end">Rp {{ number_format($item->pivot->qty * $item->harga, 0, ',', '.') }}</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th colspan="2" class="text-end">Total</th>
          <th class="text-end">Rp {{ number_format($pesanan->total, 0, ',', '.') }}</th>
        </tr>
      </tfoot>
    </table>

    <hr>

    <h5 class="fw-bold mt-3">Pembayaran via QRIS</h5>
    <p>Silakan scan QR code berikut menggunakan aplikasi e-wallet / mobile banking Anda:</p>

    <div class="text-center my-3">
      {{-- QRIS otomatis --}}
      {!! QrCode::size(200)->generate($qrisString) !!}
    </div>

    <p class="text-muted small">
      Setelah pembayaran berhasil, simpan bukti transfer untuk ditunjukkan ke kasir.
    </p>
  </div>
</div>
@endsection

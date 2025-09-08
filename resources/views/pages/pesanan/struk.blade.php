@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center fw-bold">STRUK PESANAN</h5>
                <hr>
                <p><strong>Nama:</strong> {{ $pesanan->nama }}</p>
                <p><strong>Telepon:</strong> {{ $pesanan->telp }}</p>
                <p><strong>Alamat:</strong> {{ $pesanan->alamat }}</p>
                <p><strong>Metode Pembayaran:</strong> {{ $pesanan->metode_pembayaran }}</p>
                <p><strong>Catatan:</strong> {{ $pesanan->catatan ?? '-' }}</p>

                <h6>Pesanan:</h6>
                <ul>
                    @foreach ($pesanan->menu as $menu)
                        <li>{{ $menu->nama }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}</li>
                    @endforeach
                </ul>

                <h5 class="text-end fw-bold">Total: Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</h5>

                <div class="text-center mt-3">
                    <button class="btn btn-secondary" onclick="window.print()">🖨 Cetak Struk</button>
                </div>
            </div>
        </div>
    </div>
@endsection

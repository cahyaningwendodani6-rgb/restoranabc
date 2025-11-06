@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="container">
        <h3 class="mb-4">Detail Pesanan #{{ $pesanan->id }}</h3>

        <div class="card mb-4">
            <div class="card-body">
                <p><strong>Nama Pemesan:</strong> {{ $pesanan->nama }}</p>
                <p><strong>Email:</strong> {{ $pesanan->email ?? '-' }}</p>
                <p><strong>No. Telepon:</strong> {{ $pesanan->telp }}</p>
                <p><strong>Alamat:</strong> {{ $pesanan->alamat }}</p>
                <p><strong>Metode Pembayaran:</strong> {{ $pesanan->metode_pembayaran }}</p>
                <p><strong>Total Harga:</strong> Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
                <p><strong>Tanggal Pemesanan:</strong> {{ $pesanan->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>

        <h4>Menu yang Dipesan</h4>
        @if ($pesanan->menu->isEmpty())
            <p class="text-muted">Tidak ada data menu untuk pesanan ini.</p>
        @else
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan->menu as $index => $m)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $m->nama }}</td>
                            <td>Rp {{ number_format($m->harga, 0, ',', '.') }}</td>
                            <td>{{ $m->pivot->jumlah }}</td>
                            <td>Rp {{ number_format($m->harga * $m->pivot->jumlah, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">← Kembali</a>
    </div>
@endsection

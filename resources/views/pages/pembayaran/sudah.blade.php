@extends('layouts.app')

@section('title', 'Pembayaran Selesai')

@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-body">
                <h4 class="text-success">✅ Pembayaran sudah dilakukan</h4>
                <p>ID Pesanan: #{{ $pesanan->id }}</p>
                <p>Total: Rp {{ number_format($pembayaran->total, 0, ',', '.') }}</p>
                <p>Metode: {{ ucfirst($pembayaran->metode) }}</p>
                <p>Tanggal: {{ $pembayaran->created_at->format('d/m/Y H:i') }}</p>

                <a href="{{ route('pembayaran.index') }}" class="btn btn-primary mt-3">Kembali ke Daftar Pembayaran</a>
            </div>
        </div>
    </div>
@endsection

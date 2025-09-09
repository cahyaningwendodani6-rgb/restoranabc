@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="fw-bold mb-4">Daftar Pembayaran</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>ID Pesanan</th>
                            <th>Nama Pemesan</th>
                            <th>Total</th>
                            <th>Metode</th>
                            <th>Tanggal</th>
                            <th>Aksi</th> {{-- Kolom tombol Bayar --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pembayaran as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>#{{ $item->pesanan_id }}</td>
                                <td>{{ $item->pesanan->nama ?? '-' }}</td>
                                <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                                <td>{{ $item->metode ?? '-' }}</td>
                                <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if (!$item->metode)
                                        <a href="{{ route('pembayaran.form', $item->pesanan_id) }}" class="btn btn-sm"
                                            style="background-color:#222; color:white; font-weight:500;">
                                            Bayar
                                        </a>
                                    @else
                                        <span class="text-success">Lunas</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada pembayaran</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

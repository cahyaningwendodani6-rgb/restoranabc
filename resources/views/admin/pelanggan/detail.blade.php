@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')
    <div class="container">
        <h3 class="mb-4">Detail Pelanggan</h3>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $pelanggans->name }}</h5>
                <p><strong>Email:</strong> {{ $pelanggans->email }}</p>
                <p><strong>No. Telepon:</strong> {{ $pelanggans->telp ?? '-' }}</p>
                <p><strong>Alamat:</strong> {{ $pelanggans->alamat ?? '-' }}</p>
                <p><strong>Terakhir Login:</strong>
                    {{ $pelanggans->last_login_at ? \Carbon\Carbon::parse($pelanggans->last_login_at)->format('d M Y H:i') : '-' }}
                </p>
            </div>
        </div>

        <h4>Riwayat Pemesanan</h4>
        @if ($riwayat->isEmpty())
            <p class="text-muted">Belum ada pesanan.</p>
        @else
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total Harga</th>
                        <th>Metode Pembayaran</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayat as $index => $p)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $p->created_at->format('d M Y H:i') }}</td>
                            <td>Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                            <td>{{ ucfirst($p->metode_pembayaran) }}</td>
                            <td>{{ $p->catatan ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.pelanggan.pesanan.detail', $p->id) }}" class="btn btn-sm btn-info">
                                    Detail Pesanan
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif

        <a href="{{ route('admin.pelanggan.index') }}" class="btn btn-secondary mt-3">← Kembali</a>
    </div>
@endsection

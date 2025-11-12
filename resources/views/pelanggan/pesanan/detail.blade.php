@extends('layouts.guest')

@section('title', 'Detail Pesanan - Restoran ABC')

@section('content')
    <section class="fh5co-section" style="padding:80px 0; background-color:#111; color:#fff;">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <br><br><br><br>
                <h2 class="text-center" style="color:#d9534f;">Detail Pesanan #{{ $pesanan->id }}</h2>
                <p class="text-center" style="color:#aaa;">Tanggal: {{ $pesanan->created_at->format('d M Y, H:i') }}</p>
                <hr style="border-color:#444;">

                <div class="card mb-4" style="background-color:#1a1a1a; border:1px solid #333; border-radius:10px;">
                    <div class="card-body" style="padding:20px;">
                        <h4 style="color:#d9534f;">Informasi Pemesan</h4>
                        <p><strong>Nama:</strong> {{ $pesanan->nama }}</p>
                        <p><strong>Telepon:</strong> {{ $pesanan->telp }}</p>
                        <p><strong>Alamat:</strong> {{ $pesanan->alamat }}</p>

                        <hr style="border-color:#333;">

                        <h4 style="color:#d9534f;">Daftar Pesanan</h4>
                        <table class="table table-dark table-bordered mt-3">
                            <thead style="background-color:#d9534f;">
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan->menu as $m)
                                    <tr>
                                        <td>{{ $m->nama }}</td>
                                        <td>{{ $m->pivot->jumlah }}</td>
                                        <td>Rp {{ number_format($m->harga * $m->pivot->jumlah, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-end mt-3">
                            <p style="font-size:18px; color:#d9534f;">
                                <strong>Total: Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong>
                            </p>
                        </div>

                        <hr style="border-color:#333;">

                        <h4 style="color:#d9534f;">Status & Pembayaran</h4>
                        <p><strong>Status:</strong>
                            <span style="text-transform:capitalize;">
                                {{ $pesanan->status ?? 'pending' }}
                            </span>
                        </p>
                        <p><strong>Metode Pembayaran:</strong> {{ ucfirst($pesanan->metode_pembayaran) }}</p>
                        <p><strong>Catatan:</strong> {{ $pesanan->catatan ?? '-' }}</p>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <a href="{{ route('pesanan.riwayat') }}" class="btn btn-danger" style="border-radius:25px;">
                        ← Kembali ke Riwayat
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

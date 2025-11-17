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

        <h4 class="mb-3">Riwayat Pemesanan</h4>

        @if ($riwayat->isEmpty())
            <div class="alert alert-info text-center">
                Belum ada riwayat pesanan.
            </div>
        @else
            @foreach ($riwayat as $p)
                <div class="card mb-4" style="border-radius:10px;">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <strong>No. Pesanan:</strong> #{{ $p->id }} <br>
                            <small>{{ $p->created_at->format('d M Y, H:i') }}</small>
                        </div>
                        <div>
                            @php
                                $warna = match ($p->status) {
                                    'pending' => '#f0ad4e',
                                    'diproses' => '#5bc0de',
                                    'diantar' => '#0275d8',
                                    'selesai' => '#5cb85c',
                                    'batal' => '#d9534f',
                                    default => '#999',
                                };
                            @endphp
                            <span class="badge"
                                style="background-color:{{ $warna }}; color:#fff; padding:10px 15px; border-radius:20px;">
                                {{ $p->status }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5>Detail Menu:</h5>
                        @foreach ($p->menu as $m)
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                <div>
                                    <strong>{{ $m->nama }}</strong><br>
                                    <small>x{{ $m->pivot->jumlah }}</small>
                                </div>
                                <div>
                                    Rp {{ number_format($m->harga * $m->pivot->jumlah, 0, ',', '.') }}
                                </div>
                            </div>
                        @endforeach

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <p style="margin:0;">Metode Pembayaran: <strong>{{ ucfirst($p->metode_pembayaran) }}</strong>
                            </p>
                            <p style="margin:0; font-weight:bold; font-size:18px;">
                                Total: Rp {{ number_format($p->total_harga, 0, ',', '.') }}
                            </p>
                        </div>

                        <p class="mt-2">Catatan: {{ $p->catatan ?? '-' }}</p>
                    </div>

                    <div class="card-footer text-end">
                        <a href="{{ route('admin.pelanggan.pesanan.detail', $p->id) }}" class="btn btn-info btn-sm"
                            style="border-radius:20px;">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        @endif


        <a href="{{ route('admin.pelanggan.index') }}" class="btn btn-secondary mt-3">← Kembali</a>
    </div>
@endsection

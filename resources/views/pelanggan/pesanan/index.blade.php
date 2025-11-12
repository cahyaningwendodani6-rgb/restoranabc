@extends('layouts.guest')

@section('title', 'Riwayat Pemesanan - Restoran ABC')

@section('content')
    <section id="riwayat-pemesanan" class="fh5co-section" style="padding:80px 0; background-color:#111; color:#fff;">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-10 col-md-offset-1">
                    <br><br><br><br>
                    <h1 class="text-center" style="margin-bottom: 30px; color:#d9534f;">Riwayat Pemesanan Anda</h1>

                    {{-- Filter Tabs --}}
                    <div class="d-flex justify-content-center mb-4 flex-wrap">
                        @php
                            $tabs = [
                                'semua' => 'Semua',
                                'pending' => 'Menunggu',
                                'diproses' => 'Diproses',
                                'diantar' => 'Diantar',
                                'selesai' => 'Selesai',
                                'batal' => 'Dibatalkan',
                            ];
                        @endphp

                        @foreach ($tabs as $key => $label)
                            <a href="{{ $key === 'semua' ? route('pesanan.riwayat') : route('pesanan.riwayat', ['status' => $key]) }}"
                                class="btn {{ $status == $key || ($key == 'semua' && !$status) ? 'btn-danger' : 'btn-outline-danger' }} mx-1 mb-2"
                                style="border-radius:20px; min-width:120px;">
                                {{ $label }}
                            </a>
                        @endforeach
                    </div>

                    {{-- List Pesanan --}}
                    @if ($pesanan->isEmpty())
                        <div class="alert alert-info text-center"
                            style="background:#222; color:#fff; border:1px solid #444;">
                            Belum ada riwayat pesanan.
                        </div>
                    @else
                        @foreach ($pesanan as $p)
                            <br>
                            <div class="card mb-4"
                                style="background-color:#1a1a1a; border:1px solid #333; border-radius:10px;">
                                <div class="card-header d-flex justify-content-between align-items-center"
                                    style="background-color:#222; padding:15px; border-bottom:1px solid #333;">
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
                                            style="background-color:{{ $warna }}; color:#fff; padding:10px 15px; border-radius:20px; text-transform:capitalize;">
                                            {{ $p->status ?? 'pending' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="card-body" style="padding:20px;">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="flex-grow-1">
                                            @foreach ($p->menu as $m)
                                                <div
                                                    class="d-flex justify-content-between align-items-center py-2 border-bottom border-secondary">
                                                    <div class="text-start">
                                                        <strong>{{ $m->nama }}</strong> <br>
                                                        <small>x{{ $m->pivot->jumlah }}</small>
                                                    </div>
                                                    <div>
                                                        Rp {{ number_format($m->harga * $m->pivot->jumlah, 0, ',', '.') }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <p style="margin:0; color:#bbb;">Metode Pembayaran:
                                            {{ ucfirst($p->metode_pembayaran) }}</p>
                                        <p style="margin:0; font-weight:bold; font-size:18px; color:#d9534f;">
                                            Total: Rp {{ number_format($p->total_harga, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="card-footer text-end"
                                    style="background-color:#181818; border-top:1px solid #333;">
                                    <a href="{{ route('pesanan.detail', $p->id) }}" class="btn btn-outline-danger btn-sm"
                                        style="border-radius:20px; padding:8px 20px;">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <br>
                    <div class="text-center mt-4">
                        <a href="{{ route('pemesanan') }}" class="btn btn-danger btn-lg" style="border-radius:25px;">
                            ← Kembali ke Pemesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

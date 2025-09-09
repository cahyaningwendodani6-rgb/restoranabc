@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">Detail Pesanan</h3>
            <div class="card card-body p-0">
                <table class="table table-striped">
                    <tr>
                        <th width="25%">ID</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->id }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Nama</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->nama }}</td>
                    </tr>

                    <tr>
                        <th width="25%">No Telepon</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->telp }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Email</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->email }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Alamat</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->alamat }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Menu Pesanan</th>
                        <th width="10px">:</th>
                        <td>
                            @if ($pesanan->menu && $pesanan->menu->count())
                                @foreach ($pesanan->menu as $menu)
                                    {{ $menu->nama }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th width="25%">Total Harga</th>
                        <th width="10px">:</th>
                        <td>Rp {{ number_format($pesanan->menu->sum('harga') ?? 0, 0, ',', '.') }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Metode Pembayaran</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->metode_pembayaran }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Catatan</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->catatan }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Memesan Pada</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                    </tr>
                </table>
            </div>

            {{-- Tambahan: QR Code + Cetak Struk --}}
            <div class="card card-body text-center mt-3">
                <h5>QR Pembayaran</h5>
                {!! QrCode::size(200)->generate(
                    'Pesanan #' . $pesanan->id . ' - Rp' . number_format($pesanan->menu->sum('harga') ?? 0, 0, ',', '.'),
                ) !!}
                <hr>
                <button onclick="window.print()" class="btn btn-success">
                    <span class="ti ti-printer"></span> Cetak Struk
                </button>
            </div>

            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">
                <span class="ti ti-arrow-left"></span>
                Kembali
            </a>
        </div>
    </div>
@endsection

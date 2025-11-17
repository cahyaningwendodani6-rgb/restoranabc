@extends('layouts.app')

@section('title', 'Detail Bukti Pembayaran')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">Detail Bukti Pembayaran</h3>
            <div class="card card-body p-0">
                <table class="table table-striped">
                    <tr>
                        <th width="25%">ID</th>
                        <th width="10px">:</th>
                        <td>{{ $pembayaran->id }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Pesanan</th>
                        <th width="10px">:</th>
                        <td>{{ $pembayaran->pesanan->nama }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Metode</th>
                        <th width="10px">:</th>
                        <td>{{ $pembayaran->metode }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Status</th>
                        <th width="10px">:</th>
                        <td>{{ $pembayaran->status }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Bukti</th>
                        <th width="10px">:</th>
                        <td colspan="2">
                            @if ($pembayaran->bukti)
                                <img src="{{ asset('storage/' . $pembayaran->bukti) }}" width="200">
                            @else
                                <span class="text-muted">Belum ada bukti pembayaran</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th width="25%">Menu Pesanan</th>
                        <th width="10px">:</th>
                        <td>
                            @if ($pembayaran->pesanan->menu && $pembayaran->pesanan->menu->count())
                                @foreach ($pembayaran->pesanan->menu as $menu)
                                    {{ $menu->nama }} ({{ $menu->pivot->jumlah }} pcs)@if (!$loop->last)
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
                        <td>Rp
                            {{ number_format(
                                $pembayaran->pesanan->menu->sum(function ($m) {
                                    return $m->harga * $m->pivot->jumlah;
                                }),
                                0,
                                ',',
                                '.',
                            ) }}
                        </td>
                    </tr>

                    <tr>
                        <th width="25%">Catatan</th>
                        <th width="10px">:</th>
                        <td>{{ $pembayaran->catatan }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Memesan Pada</th>
                        <th width="10px">:</th>
                        <td>{{ $pembayaran->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                    </tr>
                </table>
            </div>

            <div class="mt-3">
                <a href="{{ route('admin.form-pembayaran.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection

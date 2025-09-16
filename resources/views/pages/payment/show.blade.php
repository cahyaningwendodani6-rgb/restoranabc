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
                                <img src="{{ asset('storage/' . $pembayaran->bukti) }}" width="300">
                            @else
                                <span class="text-muted">Belum ada bukti pembayaran</span>
                            @endif
                        </td>
                    </tr>


                    <tr>
                        <th width="25%">Memesan Pada</th>
                        <th width="10px">:</th>
                        <td>{{ $pembayaran->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Detail Laporan')

@section('content')
    <div class="container-fluid">

        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">
            ← Kembali
        </a>

        <h3 class="mb-3">Detail Pendapatan - {{ $tanggal }}</h3>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Total Pembayaran</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $i => $item)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $item->pesanan->nama }}</td>
                        <td>{{ number_format($item->pesanan->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

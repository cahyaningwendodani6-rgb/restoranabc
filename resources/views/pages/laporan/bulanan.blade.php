@extends('layouts.app')

@section('title', 'Laporan Bulanan')

@section('content')
    <div class="container-fluid">

        <a href="{{ route('laporan.index') }}" class="btn btn-secondary mb-3">
            ← Kembali
        </a>

        <h3 class="mb-3">Laporan Pendapatan Bulanan</h3>

        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Bulan</th>
                    <th>Pendapatan</th>
                    <th>Pesanan</th>
                    <th>Rentang Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $item)
                    <tr>
                        <td>{{ $item['nama_bulan'] }}</td>
                        <td>{{ number_format($item['pendapatan'], 0, ',', '.') }}</td>
                        <td>{{ $item['jumlah_pesanan'] }}</td>
                        <td>{{ $item['dari'] }} s/d {{ $item['sampai'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

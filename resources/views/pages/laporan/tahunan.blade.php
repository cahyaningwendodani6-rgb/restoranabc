@extends('layouts.app')

@section('title', 'Laporan Tahunan')

@section('content')
    <div class="container-fluid">

        <a href="{{ route('laporan.index') }}" class="btn btn-secondary mb-3">
            ← Kembali
        </a>

        <h3 class="mb-3">Laporan Pendapatan Tahunan</h3>

        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Tahun</th>
                    <th>Pendapatan</th>
                    <th>Jumlah Pesanan</th>
                    <th>Rentang Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $item)
                    <tr>
                        <td>{{ $item['tahun'] }}</td>
                        <td>{{ number_format($item['pendapatan'], 0, ',', '.') }}</td>
                        <td>{{ $item['jumlah_pesanan'] }}</td>
                        <td>{{ $item['dari'] }} s/d {{ $item['sampai'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

@extends('layouts.app')

@section('title', 'Laporan Mingguan')

@section('content')
    <div class="container-fluid">

        <a href="{{ route('laporan.index') }}" class="btn btn-secondary mb-3">
            ← Kembali
        </a>

        <h3 class="mb-3">Laporan Pendapatan Mingguan</h3>

        <table class="table dataTable align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Minggu Ke</th>
                    <th>Rentang Tanggal</th>
                    <th>Pendapatan</th>
                    <th>Pelanggan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporan as $item)
                    @php
                        // Hitung Minggu ke-berapa dalam bulan
                        $weekOfMonth = \Carbon\Carbon::parse($item['dari'])->weekOfMonth;
                    @endphp
                    <tr>
                        <td>Minggu {{ $weekOfMonth }}</td>
                        <td>{{ $item['dari'] }} s/d {{ $item['sampai'] }}</td>
                        <td>{{ number_format($item['pendapatan'], 0, ',', '.') }}</td>
                        <td>{{ $item['jumlah_pesanan'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            Belum ada laporan pendapatan mingguan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection

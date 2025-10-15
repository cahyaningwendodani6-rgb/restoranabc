@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
    <div class="container-fluid">
        <h3 class="mb-3">Laporan</h3>
        <table class="table dataTable align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Tanggal</th>
                    <th>Pendapatan (Rp)</th>
                    <th>Jumlah Pelanggan</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $item)
                    <tr>
                        <td>{{ $item['tanggal'] }}</td>
                        <td>{{ number_format($item['pendapatan'], 0, ',', '.') }}</td>
                        <td>{{ $item['jumlah_pesanan'] }}</td>
                        <td>
                            <a href="{{ route('laporan.detail', $item['tanggal']) }}"
                                class="btn btn-secondary btn-sm">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

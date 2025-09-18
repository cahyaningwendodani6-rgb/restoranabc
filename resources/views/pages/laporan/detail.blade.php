@extends('layouts.app')

@section('title', 'Detail Laporan ' . $tanggal)

@section('content')
    <div class="container-fluid">
        <h3 class="mb-3">Detail Laporan Tanggal {{ \Carbon\Carbon::parse($tanggal)->format('d M Y') }}</h3>

        <table class="table table-bordered table-striped">
            <thead style="background-color: #f8f9fa; color: #000;">
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Menu</th>
                    <th>Total Harga</th>
                    <th>Jam Pesanan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pesanan as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>
                            @foreach ($p->menu as $m)
                                - {{ $m->nama }} x {{ $m->pivot->jumlah }} <br>
                            @endforeach
                        </td>
                        <td>Rp{{ number_format($p->menu->sum(fn($m) => $m->pivot->jumlah * $m->harga), 0, ',', '.') }}</td>
                        <td>{{ $p->created_at->format('H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada pesanan di tanggal ini</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <a href="{{ route('laporan.index') }}" class="btn btn-secondary mt-3">← Kembali ke Laporan</a>
    </div>
@endsection

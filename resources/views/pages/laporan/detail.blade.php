@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
<div class="container-fluid">
    <h3 class="mb-3">Detail Pesanan - {{ $tanggal }}</h3>
    <a href="{{ route('laporan.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <table class="table table-bordered table-striped">
        <thead style="background-color: #ffffff; color: #000000;">
            <tr>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($pesanan as $p)
                @foreach ($p->menu as $m)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->pivot->jumlah }}</td>
                    <td>{{ number_format($m->harga, 0, ',', '.') }}</td>
                    <td>{{ number_format($m->harga * $m->pivot->jumlah, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection

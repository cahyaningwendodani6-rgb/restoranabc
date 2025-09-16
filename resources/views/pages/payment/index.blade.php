@extends('layouts.app')

@section('title', 'Daftar Pembayaran')

@section('content')
    <div class="container">
        <h2 class="mb-4">Daftar Pembayaran</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pesanan</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayaran as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>#{{ $p->pesanan->id }} - {{ $p->pesanan->nama }}</td>
                        <td>{{ strtoupper($p->metode) }}</td>
                        <td>
                            @if ($p->status === 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($p->status === 'dibayar')
                                <span class="badge bg-success">Lunas</span>
                            @else
                                <span class="badge bg-danger">Gagal</span>
                            @endif
                        </td>
                        <td>
                            @if ($p->status === 'pending')
                                <form action="{{ route('admin.form-pembayaran.verifikasi', $p->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">Verifikasi</button>
                                </form>

                                <form action="{{ route('admin.form-pembayaran.tolak', $p->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                                </form>
                            @else
                                <span class="text-muted">-</span>
                            @endif

                            <form action="{{ route('admin.form-pembayaran.show', $p->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">Detail</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

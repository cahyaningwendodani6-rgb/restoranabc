@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">Detail Pesanan</h3>
            <div class="card card-body p-0">
                <table class="table table-striped">
                    <tr>
                        <th width="25%">ID</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->id }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Nama</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->nama }}</td>
                    </tr>

                    <tr>
                        <th width="25%">No Telepon</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->telp }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Email</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->email }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Alamat</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->alamat }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Menu Pesanan</th>
                        <th width="10px">:</th>
                        <td>
                            @if ($pesanan->menu && $pesanan->menu->count())
                                @foreach ($pesanan->menu as $menu)
                                    {{ $menu->nama }} {{ $menu->pivot->jumlah }} pcs
                                    @if (!$loop->last)
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
                        <td>
                            Rp
                            {{ number_format(
                                $pesanan->menu->sum(function ($menu) {
                                    return $menu->pivot->jumlah * $menu->harga;
                                }),
                                0,
                                ',',
                                '.',
                            ) }}
                        </td>

                    </tr>

                    <tr>
                        <th width="25%">Metode Pembayaran</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->metode_pembayaran }}</td>
                    </tr>

                    {{-- Tambahan: Info Transfer --}}
                    @if ($pesanan->metode_pembayaran == 'Transfer')
                        <tr>
                            <th width="25%">Bank</th>
                            <th width="10px">:</th>
                            <td>{{ $pesanan->bank ?? 'BCA 1234567890' }}</td>
                        </tr>
                        <tr>
                            <th width="25%">Nomor Rekening</th>
                            <th width="10px">:</th>
                            <td>{{ $pesanan->no_rekening ?? '1234567890' }}</td>
                        </tr>
                        <tr>
                            <th width="25%">Atas Nama</th>
                            <th width="10px">:</th>
                            <td>{{ $pesanan->atas_nama ?? 'Restoran ABC' }}</td>
                        </tr>
                    @endif


                    <tr>
                        <th width="25%">Catatan</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->catatan }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Memesan Pada</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                    </tr>

                    <tr>
                        <th width="25%">Status</th>
                        <th width="10px">:</th>
                        <td>
                            {{-- Tampilkan badge status --}}
                            @if ($pesanan->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($pesanan->status == 'diproses')
                                <span class="badge bg-primary">Diproses</span>
                            @elseif($pesanan->status == 'diantar')
                                <span class="badge bg-secondary">Diantar</span>
                            @elseif($pesanan->status == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-danger">Batal</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="mt-3">
                <a href="{{ route('pesanan.index') }}" class="btn btn-primary">Back</a>
            </div>

           
        </div>
    </div>
@endsection

@push('scripts')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 2000,
                timerProgressBar: true
            })
        </script>
    @endif
@endpush

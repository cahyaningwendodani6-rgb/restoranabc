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
                        <td>Rp {{ number_format($pesanan->menu->sum('harga') ?? 0, 0, ',', '.') }}</td>
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
                            <td>{{ $pesanan->atas_nama ?? 'Nama Pemilik Rekening' }}</td>
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

            {{-- Form Update Status (khusus admin) --}}
            <div class="mt-3">
                <form action="{{ route('pesanan.updateStatus', $pesanan->id) }}" method="POST"
                    class="d-flex align-items-center gap-2">
                    @csrf
                    <label for="status" class="form-label me-2">Ubah Status:</label>
                    <select name="status" id="status" class="form-select w-auto">
                        <option value="pending" {{ $pesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diproses" {{ $pesanan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="diantar" {{ $pesanan->status == 'diantar' ? 'selected' : '' }}>Diantar</option>
                        <option value="selesai" {{ $pesanan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="batal" {{ $pesanan->status == 'batal' ? 'selected' : '' }}>Batal</option>
                    </select>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>

            {{-- Tambahan: QR Code + Cetak Struk --}}
            @if ($pesanan->metode_pembayaran != 'Transfer')
                <div class="card card-body text-center mt-3">
                    <h5>QR Pembayaran</h5>
                    {!! QrCode::size(200)->generate(
                        'Pesanan #' . $pesanan->id . ' - Rp' . number_format($pesanan->menu->sum('harga') ?? 0, 0, ',', '.'),
                    ) !!}
                    <hr>
                    <button onclick="window.print()" class="btn btn-success">
                        <span class="ti ti-printer"></span> Cetak Struk
                    </button>
                </div>
            @endif

            {{-- Tambahan: QR Code + Cetak Struk --}}
            @if ($pesanan->metode_pembayaran != 'Transfer')
                <div class="card card-body text-center mt-3">
                    <h5>QR Pembayaran</h5>
                    {!! QrCode::size(200)->generate(
                        'Pesanan #' . $pesanan->id . ' - Rp' . number_format($pesanan->menu->sum('harga') ?? 0, 0, ',', '.'),
                    ) !!}
                    <hr>
                    <button onclick="window.print()" class="btn btn-success">
                        <span class="ti ti-printer"></span> Cetak Struk
                    </button>
                </div>
            @endif
        </div>
    </div>
@endsection

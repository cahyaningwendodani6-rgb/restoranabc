@extends('layouts.guest')

@section('title', 'Struk Pesanan - Restoran ABC')

@section('content')
    <div id="receipt" class="section pt-5 mb-5 pb-5" style="padding-top:170px;">
        <div class="bg-image" style="background-image:url({{ asset('tpt/img/background03.jpg') }})"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12">

                    <div class="reserve-form row p-4 rounded shadow-sm" style="background: #fff;">
                        <div class="section-header text-center">
                            <h4 class="sub-title">Struk</h4>
                            <h2 class="title">Pesanan #{{ $pesanan->id }}</h2>
                        </div>
                        <hr class="my-3">

                        {{-- Data Pemesan --}}
                        <div class="col-md-12 mb-2">
                            <p><strong>Nama:</strong> {{ $pesanan->nama }}</p>
                            <p><strong>Total Harga:</strong> Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
                            <p><strong>Metode Pembayaran:</strong> {{ strtoupper($pesanan->metode_pembayaran) }}</p>
                            <p><strong>Status Pembayaran:</strong>
                                @if ($pesanan->pembayaran)
                                    @if ($pesanan->pembayaran->status == 'pending')
                                        <span class="badge bg-warning text-dark">Menunggu Verifikasi</span>
                                    @elseif($pesanan->pembayaran->status == 'dibayar')
                                        <span class="badge bg-success">Lunas</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                @else
                                    <span class="badge bg-secondary">Belum Bayar</span>
                                @endif
                            </p>
                            <p><strong>Status Pesanan:</strong>
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
                            </p>
                        </div>

                        <hr class="my-3">

                        {{-- Tampilkan sesuai metode --}}
                        <div class="col-md-12 mb-3">
                            @if ($pesanan->metode_pembayaran == 'QRIS')
                                <h5 class="mb-3">Silakan Scan QRIS untuk Membayar</h5>
                                <div class="text-center mb-3">
                                    {!! QrCode::size(200)->generate($qrisString) !!}
                                </div>
                            @elseif (strtolower($pesanan->metode_pembayaran) == 'transfer')
                                <h5 class="mb-3">Transfer ke Rekening:</h5>
                                <div class="border p-3 rounded">
                                    <p><strong>Bank BCA</strong></p>
                                    <p>No. Rekening: <strong>1234567890</strong></p>
                                    <p>Atas Nama: <strong>Restoran ABC</strong></p>
                                </div>
                            @endif
                        </div>

                        <hr class="my-3">

                        {{-- Upload Bukti Pembayaran --}}
                        @if (!$pesanan->pembayaran)
                            <div class="col-md-12 mb-3">
                                <h5>Upload Bukti Pembayaran</h5>
                                <form action="{{ route('pembayaran.store', $pesanan->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="metode" value="{{ $pesanan->metode_pembayaran }}">
                                    <div class="mb-3">
                                        <input type="file" name="bukti" class="form-control" required>
                                    </div>
                                    <button type="submit" class="main-button">Bayar</button>
                                </form>
                            </div>
                        @endif

                        <hr class="my-3">

                        {{-- Detail Pesanan --}}
                        <div class="col-md-12 mb-3">
                            <h5>Detail Menu:</h5>
                            <ul>
                                @foreach ($pesanan->menu as $menu)
                                    <li>{{ $menu->nama }} x {{ $menu->pivot->jumlah }} -
                                        Rp{{ number_format($menu->harga * $menu->pivot->jumlah, 0, ',', '.') }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-md-12 text-center mt-3">
                            <p class="text-muted small">Terima kasih telah memesan di <strong>Restoran ABC</strong></p>
                            @if ($pesanan->pembayaran)
                                <a href="{{ route('landing') }}" id="btn-exit" class="main-button">Keluar</a>
                            @endif
                        </div>
                    </div>

                </div>
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
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById("btn-exit").addEventListener("click", function(e) {
            e.preventDefault(); // cegah langsung redirect
            let url = this.getAttribute("href");

            Swal.fire({
                    title: '<h2 style="font-size:32px">Yakin ingin keluar?</h2>',
                    html: '<p style="font-size:24px">Keluar sekarang berarti Anda tidak bisa memantau pesanan yang sudah dibuat.</p>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f97316',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<span style="font-size:20px; padding:10px 20px; display:inline-block;">Ya, keluar</span>',
                    cancelButtonText: '<span style="font-size:20px; padding:10px 20px; display:inline-block;">Batal</span>',
                    width: '600px'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
        });
    </script>
@endpush

@extends('layouts.guest')

@section('title', 'Struk Pesanan - Restoran ABC')

@section('content')
    <div id="receipt" class="section pt-5 mb-5 pb-5" style="margin-top:200px;">
        <div class="bg-image" style="background-image:url({{ asset('tpt/img/background03.jpg') }})"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12">

                    <div class="reserve-form row p-5 rounded shadow-lg"
                        style="background: rgba(0, 0, 0, 0.85); color: #fff; font-size:18px; line-height:1.8; max-width:900px; margin:auto;">

                        <div class="section-header text-center"
                            style="color:#fff !important; font-size:18px; line-height:1.8; max-width:900px; margin:auto;">
                            <h2 class="title mb-4" style="color:#fff !important; font-size:32px; font-weight:700;">
                                Struk Pesanan #{{ $pesanan->id }}
                            </h2>
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
                                        <span style="background-color:#ffc107; color:#000; padding:5px 10px; border-radius:10px;">
                                            Menunggu Verifikasi
                                        </span>
                                    @elseif($pesanan->pembayaran->status == 'dibayar')
                                        <span style="background-color:#28a745; color:#fff; padding:5px 10px; border-radius:10px;">
                                            Lunas
                                        </span>
                                    @elseif($pesanan->pembayaran->status == 'ditolak')
                                        <span style="background-color:#dc3545; color:#fff; padding:5px 10px; border-radius:10px;">
                                            Ditolak
                                        </span>
                                    @endif
                                @else
                                    <span style="background-color:#6c757d; color:#fff; padding:5px 10px; border-radius:10px;">
                                        Belum Bayar
                                    </span>
                                @endif
                            </p>

                            <p><strong>Status Pesanan:</strong>
                                @if ($pesanan->status == 'pending')
                                    <span style="background-color:#ffc107; color:#000; padding:5px 10px; border-radius:10px;">Pending</span>
                                @elseif($pesanan->status == 'diproses')
                                    <span style="background-color:#17a2b8; color:#fff; padding:5px 10px; border-radius:10px;">Diproses</span>
                                @elseif($pesanan->status == 'diantar')
                                    <span style="background-color:#007bff; color:#fff; padding:5px 10px; border-radius:10px;">Diantar</span>
                                @elseif($pesanan->status == 'selesai')
                                    <span style="background-color:#28a745; color:#fff; padding:5px 10px; border-radius:10px;">Selesai</span>
                                @else
                                    <span style="background-color:#dc3545; color:#fff; padding:5px 10px; border-radius:10px;">Batal</span>
                                @endif
                            </p>
                        </div>

                        <hr class="my-3">

                        {{-- Tampilkan sesuai metode --}}
                        <div class="col-md-12 mb-3" style="color:#fff;">
                            @if ($pesanan->metode_pembayaran == 'QRIS')
                                <h5 class="mb-3" style="color:#fff;">Silakan Scan QRIS untuk Membayar</h5>
                                <div class="text-center mb-3">
                                    {!! QrCode::size(200)->generate($qrisString) !!}
                                </div>
                            @elseif (strtolower($pesanan->metode_pembayaran) == 'transfer')
                                <h5 class="mb-3" style="color:#fff;">Transfer ke Rekening:</h5>
                                <div class="border p-3 rounded" style="color:#fff;">
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
                                <h5 style="color:#fff;">Upload Bukti Pembayaran</h5>
                                <form action="{{ route('pembayaran.store', $pesanan->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="metode" value="{{ $pesanan->metode_pembayaran }}">
                                    <div class="mb-3">
                                        <input type="file" name="bukti" class="form-control"
                                            style="background-color:#101010; color:white; border:1px solid #fff;
                                            font-family:'Times New Roman', serif; padding:15px; height:55px;
                                            font-size:16px; border-radius:10px;" required>
                                    </div>

                                    <div class="text-center mt-3">
                                        <br>
                                        <button type="submit"
                                            style="background-color:white; color:black; font-weight:bold; 
                                            font-family:'Times New Roman', serif; padding:12px 40px; 
                                            border:none; border-radius:10px; font-size:18px; cursor:pointer; transition:0.3s;">
                                            Bayar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif

                        <hr class="my-3">

                        {{-- Detail Pesanan --}}
                        <div class="col-md-12 mb-3">
                            <h5 style="color:#fff;">Detail Menu:</h5>
                            <ul>
                                @foreach ($pesanan->menu as $menu)
                                    <li>{{ $menu->nama }} x {{ $menu->pivot->jumlah }} -
                                        Rp{{ number_format($menu->harga * $menu->pivot->jumlah, 0, ',', '.') }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-md-12 text-center mt-3">
                            <p style="color:#fff; font-size:16px; font-weight:600; margin-top:15px;">
                                Terima kasih telah memesan di <strong>Restoran ABC</strong>
                            </p>

                            @if ($pesanan->pembayaran)
                                <a href="{{ route('landing') }}" id="btn-exit" class="btn btn-primary"
                                    style="font-size:20px; padding:12px 40px; font-weight:700; border-radius:10px;">
                                    Keluar
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Notifikasi status pesanan otomatis
        document.addEventListener("DOMContentLoaded", function() {
            @if ($pesanan->status == 'pending')
                Swal.fire({
                    icon: 'info',
                    title: 'Pesanan Menunggu Diproses',
                    text: 'Pesanan kamu sedang menunggu konfirmasi dari pihak restoran.',
                    showConfirmButton: false,
                    timer: 4000
                });
            @elseif ($pesanan->status == 'diproses')
                Swal.fire({
                    icon: 'info',
                    title: 'Pesanan Sedang Diproses',
                    text: 'Pesanan kamu sedang disiapkan oleh tim dapur.',
                    showConfirmButton: false,
                    timer: 4000
                });
            @elseif ($pesanan->status == 'diantar')
                Swal.fire({
                    icon: 'warning',
                    title: 'Pesanan Sedang Diantar',
                    text: 'Pesanan kamu sedang dalam perjalanan menuju alamat tujuan.',
                    showConfirmButton: false,
                    timer: 4000
                });
            @elseif ($pesanan->status == 'selesai')
                Swal.fire({
                    icon: 'success',
                    title: 'Pesanan Selesai',
                    text: 'Pesanan kamu telah selesai. Terima kasih telah memesan di Restoran ABC!',
                    showConfirmButton: false,
                    timer: 4000
                });
            @elseif ($pesanan->status == 'batal')
                Swal.fire({
                    icon: 'error',
                    title: 'Pesanan Dibatalkan',
                    text: 'Pesanan kamu telah dibatalkan. Silakan buat pesanan baru jika ingin memesan kembali.',
                    showConfirmButton: false,
                    timer: 4000
                });
            @endif
        });

        // success alert (untuk upload bukti, dsb.)
        @if (session('success'))
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: @json(session('success')),
                    showConfirmButton: false,
                    timer: 3000
                });
            });
        @endif

        // exit button
        document.addEventListener("DOMContentLoaded", function() {
            const btnExit = document.getElementById("btn-exit");
            if (btnExit) {
                btnExit.addEventListener("click", function(e) {
                    e.preventDefault();
                    let url = this.getAttribute("href");

                    Swal.fire({
                        title: '<h2 style="font-size:28px; font-weight:700;">Yakin ingin keluar?</h2>',
                        html: '<p style="font-size:18px; font-weight:600;">Keluar sekarang berarti Anda tidak bisa memantau pesanan yang sudah dibuat.</p>',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#f97316',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: '<span style="font-size:20px; padding:10px 25px; font-weight:700;">Ya, keluar</span>',
                        cancelButtonText: '<span style="font-size:20px; padding:10px 25px; font-weight:700;">Batal</span>',
                        width: '600px'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            }
        });
    </script>

    <style>
        .swal2-popup-custom {
            font-size: 1.4rem !important;
            padding: 30px !important;
        }

        .swal2-title-custom {
            font-size: 2rem !important;
        }

        .swal2-text-custom {
            font-size: 1.2rem !important;
        }

        .swal2-icon-custom {
            transform: scale(1.5);
        }
    </style>
@endpush

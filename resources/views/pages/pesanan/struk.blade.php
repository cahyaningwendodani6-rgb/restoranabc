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

                        <div class="section-header text-center">
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
                                        <span
                                            style="background-color:#ffc107; color:#000; padding:5px 10px; border-radius:10px;">Menunggu
                                            Verifikasi</span>
                                    @elseif($pesanan->pembayaran->status == 'dibayar')
                                        <span
                                            style="background-color:#28a745; color:#fff; padding:5px 10px; border-radius:10px;">Lunas</span>
                                    @elseif($pesanan->pembayaran->status == 'ditolak')
                                        <span
                                            style="background-color:#dc3545; color:#fff; padding:5px 10px; border-radius:10px;">Ditolak</span>
                                    @endif
                                @else
                                    <span
                                        style="background-color:#6c757d; color:#fff; padding:5px 10px; border-radius:10px;">Belum
                                        Bayar</span>
                                @endif
                            </p>

                            <p><strong>Status Pesanan:</strong>
                                @if ($pesanan->status == 'pending')
                                    <span
                                        style="background-color:#ffc107; color:#000; padding:5px 10px; border-radius:10px;">Pending</span>
                                @elseif($pesanan->status == 'diproses')
                                    <span
                                        style="background-color:#17a2b8; color:#fff; padding:5px 10px; border-radius:10px;">Diproses</span>
                                @elseif($pesanan->status == 'diantar')
                                    <span
                                        style="background-color:#007bff; color:#fff; padding:5px 10px; border-radius:10px;">Diantar</span>
                                @elseif($pesanan->status == 'selesai')
                                    <span
                                        style="background-color:#28a745; color:#fff; padding:5px 10px; border-radius:10px;">Selesai</span>
                                @else
                                    <span
                                        style="background-color:#dc3545; color:#fff; padding:5px 10px; border-radius:10px;">Batal</span>
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
                                        <input type="file" name="bukti" class="form-control" required
                                            style="background-color:#101010; color:white; border:1px solid #fff; font-family:'Times New Roman', serif; padding:15px; height:55px; font-size:16px; border-radius:10px;">
                                    </div>

                                    <div class="text-center mt-3">
                                        <button type="submit"
                                            style="background-color:white; color:black; font-weight:bold; font-family:'Times New Roman', serif; padding:12px 40px; border:none; border-radius:10px; font-size:18px; cursor:pointer;">
                                            Bayar
                                        </button>
                                    </div>
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
                            <p style="font-size:16px; font-weight:600;">Terima kasih telah memesan di <strong>Restoran
                                    ABC</strong></p>

                            <div class="mt-4">
                                @if ($pesanan->pembayaran)
                                    <a href="{{ route('landing') }}" id="btn-exit" class="btn btn-primary"
                                        style="font-size:20px; padding:12px 40px; font-weight:700; border-radius:10px;">
                                        Keluar
                                    </a>

                                    <button id="btn-print" class="btn btn-light"
                                        style="background-color:#f97316; color:white; 
                                            font-size:20px; padding:12px 40px; 
                                            font-weight:700; border-radius:10px;">
                                        Cetak Struk
                                    </button>
                                @endif
                            </div>
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
        // === Fitur Cetak Struk Lengkap ===
        document.addEventListener("DOMContentLoaded", function() {
            const btnPrint = document.getElementById("btn-print");
            if (btnPrint) {
                btnPrint.addEventListener("click", function() {
                    const originalContents = document.body.innerHTML;
                    const receiptContents = document.getElementById("receipt").innerHTML;

                    document.body.innerHTML = `
                    <div style="font-family:'Times New Roman', serif; padding: 20px; text-align:center;">
                        <img src="{{ asset('img/logo-restoran.jpg') }}" alt="Logo Restoran ABC" style="width:100px; margin-bottom:10px;">
                        <h2 style="margin:0; font-size:24px;">Restoran ABC</h2>
                        <p style="margin:0;">Jl. Raya Selaganggeng, Dusun 1, Selaganggeng, Purbalingga, Jawa Tengah 53352</p>
                        <p style="margin:0;">Telp: +6285700763873</p>
                        <hr style="margin:10px 0;">
                        <p style="text-align:right; font-size:14px;">Dicetak: ${new Date().toLocaleString()}</p>
                        ${receiptContents}
                    </div>
                `;

                    window.print();
                    document.body.innerHTML = originalContents;
                    location.reload();
                });
            }
        });
    </script>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #receipt,
            #receipt * {
                visibility: visible;
            }

            #receipt {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                background: white !important;
                color: black !important;
                padding: 20px;
            }

            #receipt .bg-image {
                display: none !important;
            }

            button,
            a.btn {
                display: none !important;
            }
        }
    </style>
@endpush

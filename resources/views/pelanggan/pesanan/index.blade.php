@extends('layouts.guest')

@section('title', 'Riwayat Pemesanan - Restoran ABC')

@section('content')

    {{-- CSS --}}
    <style>
        .card-footer {
            position: relative;
            z-index: 10;
        }

        .btn {
            position: relative;
            z-index: 20;
        }

        .tab-btn {
            border-radius: 20px;
            min-width: 120px;
            margin: 5px;
        }

        .card {
            background-color: #1a1a1a;
            border: 1px solid #333;
            border-radius: 10px;
            margin-bottom: 25px;
            color: #fff;
        }

        .card-header {
            background: #222;
            padding: 15px;
            border-bottom: 1px solid #333;
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            background: #181818;
            border-top: 1px solid #333;
            padding: 15px;
            text-align: right;
        }

        .flex {
            display: flex;
        }

        .flex-between {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .status-badge {
            padding: 10px 15px;
            border-radius: 20px;
            color: #fff;
            text-transform: capitalize;
        }
    </style>

    <section id="riwayat-pemesanan" class="fh5co-section" style="padding:80px 0; background-color:#111; color:#fff;">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-10 col-md-offset-1">
                    <br><br><br><br>

                    <h1 class="text-center" style="margin-bottom: 30px; color:#d9534f;">Riwayat Pemesanan Anda</h1>

                    {{-- Filter Tabs --}}
                    <div class="text-center" style="margin-bottom:20px;">
                        @php
                            $tabs = [
                                'semua' => 'Semua',
                                'pending' => 'Menunggu',
                                'diproses' => 'Diproses',
                                'diantar' => 'Diantar',
                                'selesai' => 'Selesai',
                                'batal' => 'Dibatalkan',
                            ];
                        @endphp

                        @foreach ($tabs as $key => $label)
                            <a href="{{ $key === 'semua' ? route('pesanan.riwayat') : route('pesanan.riwayat', ['status' => $key]) }}"
                                class="btn {{ $status == $key || ($key == 'semua' && !$status) ? 'btn-danger' : 'btn-default' }} tab-btn">
                                {{ $label }}
                            </a>
                        @endforeach
                    </div>

                    {{-- List Pesanan --}}
                    @if ($pesanan->isEmpty())
                        <div class="alert alert-info text-center"
                            style="background:#222; color:#fff; border:1px solid #444;">
                            Belum ada riwayat pesanan.
                        </div>
                    @else
                        @foreach ($pesanan as $p)
                            @php
                                $warna =
                                    [
                                        'pending' => '#f0ad4e',
                                        'diproses' => '#5bc0de',
                                        'diantar' => '#0275d8',
                                        'selesai' => '#5cb85c',
                                        'batal' => '#d9534f',
                                    ][$p->status] ?? '#999';
                            @endphp

                            <div class="card">

                                <div class="card-header flex-between">
                                    <div>
                                        <strong>No. Pesanan:</strong> #{{ $p->id }} <br>
                                        <small>{{ $p->created_at->format('d M Y, H:i') }}</small>
                                    </div>

                                    <span class="status-badge" style="background-color:{{ $warna }}">
                                        {{ $p->status }}
                                    </span>
                                </div>

                                <div class="card-body">
                                    <div class="flex flex-wrap">
                                        <div style="width:100%;">
                                            @foreach ($p->menu as $m)
                                                <div class="flex-between"
                                                    style="padding:8px 0; border-bottom:1px solid #333;">
                                                    <div>
                                                        <strong>{{ $m->nama }}</strong><br>
                                                        <small>x{{ $m->pivot->jumlah }}</small>
                                                    </div>
                                                    <div>
                                                        Rp {{ number_format($m->harga * $m->pivot->jumlah, 0, ',', '.') }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="flex-between" style="margin-top:15px;">
                                        <p style="margin:0; color:#bbb;">
                                            Metode Pembayaran: {{ ucfirst($p->metode_pembayaran) }}
                                        </p>

                                        <p style="margin:0; font-weight:bold; font-size:18px; color:#d9534f;">
                                            Total: Rp {{ number_format($p->total_harga, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    @if ($p->status === 'pending')
                                        <button class="btn btn-danger" onclick="batalPesanan({{ $p->id }})">
                                            Batalkan
                                        </button>
                                    @endif

                                    <a href="{{ route('pesanan.detail', $p->id) }}" class="btn btn-default"
                                        style="border-radius:20px;">
                                        Lihat Detail
                                    </a>
                                </div>

                                {{-- FORM PEMBATALAN (TERSEMBUNYI) --}}
                                <form id="form-batal-{{ $p->id }}" action="{{ route('pesanan.batalkan', $p->id) }}"
                                    method="POST" style="display:none;">
                                    @csrf
                                    <input type="hidden" name="alasan" id="alasan-input-{{ $p->id }}">
                                </form>

                            </div>
                        @endforeach
                    @endif

                    <div class="text-center" style="margin-top:40px;">
                        <a href="{{ route('pemesanan') }}" class="btn btn-danger btn-lg" style="border-radius:25px;">
                            ← Kembali ke Pemesanan
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- SWEETALERT SCRIPT --}}
    <script>
        function batalPesanan(id) {
            Swal.fire({
                title: "Pilih Alasan Pembatalan",
                input: "select",
                inputOptions: {
                    "Saya berubah pikiran": "Saya berubah pikiran",
                    "Salah memilih menu": "Salah memilih menu",
                    "Ingin memesan ulang": "Ingin memesan ulang",
                    "Lainnya": "Lainnya"
                },
                inputPlaceholder: "-- Pilih Alasan --",
                showCancelButton: true,
                confirmButtonText: "Ya, Batalkan",
                cancelButtonText: "Batal",
                confirmButtonColor: "#dc3545",
                cancelButtonColor: "#6c757d",
                inputValidator: (value) => {
                    if (!value) {
                        return "Alasan harus dipilih.";
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("alasan-input-" + id).value = result.value;
                    document.getElementById("form-batal-" + id).submit();
                }
            });
        }
    </script>

@endsection

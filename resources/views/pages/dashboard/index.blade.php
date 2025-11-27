@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Dashboard Restoran ABC</h2>

        {{-- Ringkasan Cepat --}}
        <div class="row mb-4">
            {{-- Total Menu --}}
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Total Menu</h6>
                            <h3 class="mb-0">{{ $totalMenu }}</h3>
                        </div>
                        <i class="bi bi-list" style="font-size: 1.5rem; color: gray;"></i>
                    </div>
                </div>
            </div>

            {{-- Total Pesanan --}}
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Total Pesanan</h6>
                            <h3 class="mb-0">{{ $totalPesanan }}</h3>
                        </div>
                        <i class="bi bi-bag-check" style="font-size: 1.5rem; color: gray;"></i>
                    </div>
                </div>
            </div>

            {{-- Total Penjualan --}}
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Total Penjualan</h6>
                            <h3 class="mb-0">Rp {{ number_format($pendapatan, 0, ',', '.') }}</h3>
                        </div>
                        <i class="bi bi-graph-up" style="font-size: 1.5rem; color: gray;"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Grafik Penjualan Harian --}}
        <div class="card mb-4">
            <div class="card-header">Grafik Penjualan Harian</div>
            <div class="card-body">
                <canvas id="chartPenjualan"></canvas>
            </div>
        </div>

        {{-- Pesanan Terbaru --}}
        <div class="card">
            <div class="card-header">Pesanan Terbaru</div>
            <div class="card-body">

                @if ($pesananTerbaru->isEmpty())
                    <p class="text-center text-muted">Tidak ada pesanan terbaru selama ini.</p>
                @else
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Menu</th>
                            <th>Total</th>
                            <th>Tanggal</th>
                        </tr>

                        @foreach ($pesananTerbaru as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>
                                    @foreach ($p->menu as $m)
                                        - {{ $m->nama }} ({{ $m->pivot->jumlah }}) <br>
                                    @endforeach
                                </td>
                                <td>Rp{{ number_format($p->total_harga) }}</td>
                                <td>{{ $p->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach

                    </table>
                @endif

            </div>
        </div>

    </div>
@endsection

@push('scripts')
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('chartPenjualan').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($penjualanHarian->pluck('tanggal')) !!},
                datasets: [{
                    label: 'Total Penjualan',
                    data: {!! json_encode($penjualanHarian->pluck('total')) !!},
                    borderColor: 'blue',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush

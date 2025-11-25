@extends('layouts.app')

@section('title', 'Laporan Pendapatan')

@section('content')
    <div class="container-fluid">

        <h3 class="mb-4">Laporan Pendapatan</h3>

        <div class="row">

            {{-- Laporan Harian --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Laporan Harian</h5>
                        <p class="card-text text-muted">Lihat pendapatan per hari</p>
                        <a href="{{ route('laporan.harian') }}" class="btn btn-primary w-100">
                            Lihat
                        </a>
                    </div>
                </div>
            </div>

            {{-- Laporan Mingguan --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Laporan Mingguan</h5>
                        <p class="card-text text-muted">Pendapatan per minggu</p>
                        <a href="{{ route('laporan.mingguan') }}" class="btn btn-primary w-100">
                            Lihat
                        </a>
                    </div>
                </div>
            </div>

            {{-- Laporan Bulanan --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Laporan Bulanan</h5>
                        <p class="card-text text-muted">Pendapatan per bulan</p>
                        <a href="{{ route('laporan.bulanan') }}" class="btn btn-primary w-100">
                            Lihat
                        </a>
                    </div>
                </div>
            </div>

            {{-- Laporan Tahunan --}}
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Laporan Tahunan</h5>
                        <p class="card-text text-muted">Pendapatan per tahun</p>
                        <a href="{{ route('laporan.tahunan') }}" class="btn btn-primary w-100">
                            Lihat
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

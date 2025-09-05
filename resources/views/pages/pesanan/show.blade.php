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
                        <td>{{ $pesanan->id}}</td>
                    </tr>

                    <tr>
                        <th width="25%">Nama</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->nama}}</td>
                    </tr>

                    <tr>
                        <th width="25%">No Telepon</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->telp}}</td>
                    </tr>

                    <tr>
                        <th width="25%">Email</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->email}}</td>
                    </tr>

                    <tr>
                        <th width="25%">Alamat</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->alamat}}</td>
                    </tr>

                    <tr>
                        <th width="25%">Menu Pesanan</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->menu->nama}}</td>
                    </tr>

                    <tr>
                        <th width="25%">Metode Pembayaran</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->metode_pembayaran}}</td>
                    </tr>

                    <tr>
                        <th width="25%">Catatan</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->catatan}}</td>
                    </tr>

                    <tr>
                        <th width="25%">Total Harga</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->total_harga}}</td>
                    </tr>



                    <tr>
                        <th width="25%">Memesan Pada</th>
                        <th width="10px">:</th>
                        <td>{{ $pesanan->created_at->isoFormat('DD MMM Y HH:mm')}}</td>
                    </tr>



                </table>

            </div>

            
                <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">
                    <span class="ti ti-arrow-left"></span>
                    Kembali
                </a>

                
           
        </div>
    </div>
@endsection
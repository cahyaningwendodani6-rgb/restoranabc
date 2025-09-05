@extends('layouts.app')

@section('title', 'Daftar Riwayat Pesanan')
    
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Daftar Riwayat Pesanan</h3>

        <div class="card card-body">
            <div class="row">
                <div class="col-md-5">
                    <form action="" method="GET" class="d-flex align-items-center gap-2">
                        <label for="filter">Filter:</label>
                        <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="form-control" />
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <table class="table dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Telp</th>
                        <th>Pesanan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->telp }}</td>
                            <td>{{ $item->menu->nama }}</td>
                            <td>{{ $item->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                            <td>
                                <a href="{{ route('pesanan.show', $item->id) }}" class="btn btn-sm btn-info">
                                    <span class="ti ti-eye"></span>
                                </a>

                                <a href="javascript:;" onclick="actionDelete('{{ route('pesanan.destroy', $item->id) }}')" class="btn btn-sm btn-danger">
                                            <span class="ti ti-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<form action="" id="formDelete" method="POST" class="d-none">
        @csrf
        @method('DELETE')
</form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datables-resposive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/libs/sweetalert2/sweetalert2.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script type="text/javascript">
    $(function () {
        $('.dataTable').DataTable();
    });

    function actionDelete(url) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: false,
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#formDelete').attr('action', url);
                $('#formDelete').submit();
            }
        });
    }
    </script>

    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ Session::get('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
@endpush
@extends('layouts.app')

@section('title', 'Halaman Pesanan')

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
                                <td>
                                    @foreach ($item->menu as $menu)
                                        {{ $menu->nama }} x {{ $menu->pivot->jumlah }}@if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $item->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                                <td>
                                    <a href="{{ route('pesanan.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <span class="ti ti-eye"></span>
                                    </a>

                                    <a href="{{ route('pesanan.struk', $item->id) }}" class="btn btn-sm btn-success"
                                        target="_blank">
                                        <span class="ti ti-printer"></span>
                                    </a>

                                    <a href="javascript:;"
                                        onclick="actionDelete('{{ route('pesanan.destroy', $item->id) }}')"
                                        class="btn btn-sm btn-danger">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        //penusisan java script internal

        function actionDelete(url) {
            Swal.fire({
                title: "Apakah kamu yakin?",
                text: "Data yang dihapus tidak bisa dikembalikan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                cancelButtonColor: "#343a40",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = document.getElementById('formDelete');
                    form.action = url;
                    form.submit();
                }
            });
        }
    </script>

    @if (session()->has('success'))
        <script type="text/javascript">
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

@extends('layouts.app')

@section('title', 'Halaman Menu')

@section('content')
    <!-- resources/views/menu/index.blade.php -->
<div class="container py-4">
  <h1 class="mb-4 fw-bold">Menu</h1>

  <!-- Form -->
  <form action="{{ route('menu.store') }}" method="POST" class="row g-3">
    @csrf
    <div class="col-md-6">
      <label class="form-label">Nama Menu</label>
      <input type="text" class="form-control" name="nama" required>
    </div>
    <div class="col-md-3">
      <label class="form-label">Kategori</label>
      <select name="kategori" class="form-select">
        <option value="Makanan">Makanan</option>
        <option value="Minuman">Minuman</option>
      </select>
    </div>
    <div class="col-md-3">
      <label class="form-label">Harga</label>
      <div class="input-group">
        <span class="input-group-text">Rp</span>
        <input type="number" class="form-control" name="harga" required>
      </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
      <button type="submit" class="btn btn-dark">Simpan</button>
    </div>
  </form>

  <!-- Tabel -->
  <div class="card mt-4">
    <div class="card-body p-0">
      <table class="table mb-0">
        <thead class="table-light">
          <tr>
            <th>Nama Menu</th>
            <th>Kategori</th>
            <th class="text-end">Harga</th>
          </tr>
        </thead>
        <tbody>
          @foreach($menu as $item)
          <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->kategori }}</td>
            <td class="text-end">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>



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
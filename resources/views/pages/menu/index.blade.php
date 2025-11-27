@extends('layouts.app')

@section('title', 'Halaman Menu')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4 fw-bold">Menu</h1>

        <!-- Form -->
        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" class="row g-3" novalidate>
            @csrf
            <div class="col-md-6">
                <label class="form-label">Nama Menu</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">Kategori</label>
                <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Makanan" {{ old('kategori') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                    <option value="Minuman" {{ old('kategori') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                    <option value="Camilan" {{ old('kategori') == 'Camilan' ? 'selected' : '' }}>Camilan</option>
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">Harga</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga"
                        value="{{ old('harga') }}">
                    @error('harga')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- 🔥 INPUT FOTO DITAMBAHKAN DI SINI -->
            <div class="col-md-6">
                <label class="form-label">Foto Menu</label>
                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">

                @error('foto')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn bg-black text-white">Simpan</button>
            </div>
        </form>

        <!-- Tabel -->
        <div class="card mt-4">
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Foto</th>
                            <th>Nama Menu</th>
                            <th>Kategori</th>
                            <th class="text-end">Harga</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($menu->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <strong>Menu tidak ada.</strong><br>
                                    Silakan tambahkan menu baru.
                                </td>
                            </tr>
                        @else
                            @foreach ($menu as $item)
                                <tr>
                                    <td>
                                        @if ($item->foto)
                                            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Menu" width="60"
                                                class="rounded">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>

                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td class="text-end">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('menu.edit', $item->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <a href="javascript:;" onclick="confirmDelete('{{ $item->id }}')"
                                            class="btn btn-sm btn-danger">Hapus</a>

                                        <!-- 🔥 WAJIB ADA INI -->
                                        <form id="delete-form-{{ $item->id }}"
                                            action="{{ route('menu.destroy', $item->id) }}" method="POST"
                                            style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <!-- 🔥 TANPA INI TOMBOL HAPUS TIDAK BISA -->
                                    </td>
                                </tr>
                            @endforeach

                        @endif
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        function confirmDelete(id) {
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
                    var form = document.getElementById('delete-form-' + id);
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

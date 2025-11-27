@extends('layouts.app')

@section('title', 'Edit Menu')

@section('content')
    <div class="container">
        <h3>Edit Menu</h3>
        <a href="{{ route('menu.index') }}" class="btn btn-sm btn-primary my-3"> Kembali</a>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-body">

                    <!-- WAJIB: Tambah enctype -->
                    <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="nama">Nama Menu</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama', $menu->nama) }}"
                                class="form-control @error('nama') is-invalid @enderror" />

                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">

                                <option value="">-- Pilih Kategori --</option>
                                <option value="Makanan" {{ $menu->kategori == 'Makanan' ? 'selected' : '' }}>Makanan
                                </option>
                                <option value="Minuman" {{ $menu->kategori == 'Minuman' ? 'selected' : '' }}>Minuman
                                </option>
                                <option value="Camilan" {{ $menu->kategori == 'Camilan' ? 'selected' : '' }}>Camilan
                                </option>
                            </select>

                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" id="harga" value="{{ old('harga', $menu->harga) }}"
                                class="form-control @error('harga') is-invalid @enderror" />

                            @error('harga')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- 🔥 INPUT FOTO BARU -->
                        <div class="form-group mb-3">
                            <label for="foto">Foto Menu (Opsional)</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">

                            @error('foto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- 🔥 PREVIEW FOTO LAMA JIKA ADA -->
                        @if ($menu->foto)
                            <div class="mb-3">
                                <label class="form-label">Foto Saat Ini:</label><br>
                                <img src="{{ asset('storage/' . $menu->foto) }}" alt="Foto Menu" class="img-thumbnail"
                                    width="150">
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

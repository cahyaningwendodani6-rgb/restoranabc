@extends('layouts.app')

@section('title', 'Edit Menu')

@section('content')
    <div class="container">
        <h3>Edit Menu</h3>
        <a href="{{ route('menu.index') }}" class="btn btn-sm btn-primary my-3"> Kembali</a>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-body">
                    <form action="{{ route('menu.update', $menu->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-grup mb-3">
                            <label for="nama">Nama Menu</label>
                            <input type="text" name="nama" id="nama" value="{{ $menu->nama }}"
                                class="form-control" />
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-grup mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Makanan" {{ old('kategori') == 'Makanan' ? 'selected' : '' }}>Makanan
                                </option>
                                <option value="Minuman" {{ old('kategori') == 'Minuman' ? 'selected' : '' }}>Minuman
                                </option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-grup mb-3">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" id="harga" value="{{ $menu->harga }}"
                                class="form-control" />
                            @error('harga')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> 


                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection

<!doctype html>
<html lang="id" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('/') }}" data-template="vertical-menu-template" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Halaman Pesanan | Aplikasi Restoran ABC</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />

    <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/vendor/libs/node-waves/node-waves.css') }}" />

    <link rel="stylesheet" href="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/libs/typeahead-js/typeahead.css') }}" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('/vendor/libs/@form-validation/form-validation.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ '/vendor/css/pages/page-auth.css' }}" />

    <!-- Helpers -->
    <script src="{{ asset('/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('/vendor/js/template-customizer.js') }}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/js/config.js') }}"></script>
</head>

<body>

    <div class="container-xxl">
        <div class="row justify-content-center py-5">
            <div class="col-md-7">
                <div class="card card-body">
                    <h5 class=" mb-0 fw-bold text-center">
                        Halaman Pelanggan
                    </h5>

                    <hr />
                    <!-- Notifikasi sukses -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('formpesanan.store') }}" method="POST">
                        @csrf

                        <!-- Nama -->
                        <div class="form-group mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama"
                                class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Telepon & Email -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-3">
                                    <label for="telp" class="form-label">No. Telepon</label>
                                    <input type="text" id="telp" name="telp"
                                        class="form-control @error('telp') is-invalid @enderror"
                                        value="{{ old('telp') }}">
                                    @error('telp')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="form-group mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="2">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Pesanan -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="pesanan" class="form-label">Pesanan</label>
                                    <select id="pesanan" name="pesanan"
                                        class="form-select @error('pesanan') is-invalid @enderror">
                                        <option value="">-- Pilih Menu --</option>
                                        <option value="Nasi Goreng"
                                            {{ old('pesanan') == 'Nasi Goreng' ? 'selected' : '' }}>
                                            Nasi Goreng
                                        </option>
                                        <option value="Ayam Bakar"
                                            {{ old('pesanan') == 'Ayam Bakar' ? 'selected' : '' }}>Ayam
                                            Bakar</option>
                                        <option value="Mie Ayam" {{ old('pesanan') == 'Mie Ayam' ? 'selected' : '' }}>
                                            Mie Ayam
                                        </option>
                                        <option value="Es Teh" {{ old('pesanan') == 'Es Teh' ? 'selected' : '' }}>Es
                                            Teh
                                        </option>
                                        <option value="Jus Alpukat"
                                            {{ old('pesanan') == 'Jus Alpukat' ? 'selected' : '' }}>
                                            Jus Alpukat
                                        </option>
                                    </select>
                                    @error('pesanan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Metode Pembayaran -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                                    <select id="metode_pembayaran" name="metode_pembayaran"
                                        class="form-select @error('metode_pembayaran') is-invalid @enderror">
                                        <option value="">-- Pilih Metode --</option>
                                        <option value="Cash"
                                            {{ old('metode_pembayaran') == 'Cash' ? 'selected' : '' }}>Cash
                                        </option>
                                        <option value="Transfer"
                                            {{ old('metode_pembayaran') == 'Transfer' ? 'selected' : '' }}>Transfer
                                            Bank
                                        </option>
                                        <option value="QRIS"
                                            {{ old('metode_pembayaran') == 'QRIS' ? 'selected' : '' }}>QRIS
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Pesan untuk Penjual -->
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Pesan untuk Penjual</label>
                            <textarea id="catatan" name="catatan" class="form-control @error('catatan') is-invalid @enderror" rows="2">{{ old('catatan') }}</textarea>
                            @error('catatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Total Harga & Tombol -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="total_harga" class="form-label">Total Harga</label>
                                    <input type="number" id="total_harga" name="total_harga"
                                        class="form-control @error('total_harga') is-invalid @enderror"
                                        value="{{ old('total_harga') }}">
                                    @error('total_harga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-grid gep-2">
                                <button type="submit" class="btn btn-primary">
                                    <span class="ti ti-send me-2"></span>PESAN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Contoh kalkulasi otomatis total harga (sederhana)
        const hargaMenu = {
            "Nasi Goreng": 20000,
            "Ayam Bakar": 25000,
            "Mie Ayam": 15000,
            "Es Teh": 5000,
            "Jus Alpukat": 12000
        };

        document.getElementById('pesanan').addEventListener('change', function() {
            let menu = this.value;
            document.getElementById('total_harga').value = hargaMenu[menu] ?? 0;
        });
    </script>

</body>

</html>

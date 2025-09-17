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
                    <!-- Logo -->
                        <div class="app-brand justify-content-center mb-2">
                            <a href="index.html" class="app-brand-link">
                                <span class="app-brand-logo demo">
                                    <img src="{{ asset('img/logo-restoran.jpg') }}" alt="Logo Resto ABC"
                                        height="40">
                                </span>
                                <span class="app-brand-text demo text-heading fw-bold">Resto ABC</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h6 class="mb-1 text-center">Selamat Datang! 👋</h6>
                        <p class="mb-6 text-center">Silahkan isi form untuk memesan</p>

                    <hr class="opacity-100" style="color:#000;" />
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
                                    <label class="form-label">Pesanan</label>
                                    <div class="row">
                                        @foreach ($menu->groupBy('kategori') as $kategori => $items)
                                            <div class="col-12 mb-2">
                                                <strong>{{ ucfirst($kategori) }}</strong>
                                            </div>
                                            @foreach ($items as $item)
                                                <div class="col-6">
                                                    <label>
                                                        <input type="checkbox" name="menu[{{ $item->id }}][id]"
                                                            class="menu-checkbox" value="{{ $item->id }}"
                                                            data-harga="{{ $item->harga }}">
                                                        {{ $item->nama }} - Rp
                                                        {{ number_format($item->harga, 0, ',', '.') }}
                                                    </label>
                                                    <input type="number" name="menu[{{ $item->id }}][jumlah]"
                                                        class="menu-jumlah" value="1" min="1" disabled
                                                        style="width: 60px; margin-left:5px;">
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                    @error('menu_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
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
                                        <option value="Transfer"
                                            {{ old('metode_pembayaran') == 'Transfer' ? 'selected' : '' }}>Transfer
                                            Bank</option>
                                        <option value="QRIS"
                                            {{ old('metode_pembayaran') == 'QRIS' ? 'selected' : '' }}>QRIS</option>
                                    </select>
                                    @error('metode_pembayaran')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
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
                                        value="{{ old('total_harga') }}" readonly>
                                    @error('total_harga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 d-flex align-items-end mb-3">
                                <button type="submit" class="btn bg-black text-white w-100">
                                    <span class="ti ti-send me-2"></span>PESAN
                                </button>
                            </div>
                        </div>
                    </form>
                    </iv>
                </div>

                <!-- STRUK PESANAN -->
                @if (session('pesanan'))
                    @php $pesanan = session('pesanan'); @endphp
                    <div class="card mt-4">
                        <div class="card-body" style="max-width:400px; margin:auto; border:1px dashed #333;">
                            <h5 class="text-center fw-bold">Struk Pesanan</h5>
                            <hr>
                            <p><strong>Nama:</strong> {{ $pesanan->nama }}</p>
                            <p><strong>Telp:</strong> {{ $pesanan->telp }}</p>
                            <p><strong>Alamat:</strong> {{ $pesanan->alamat }}</p>
                            <hr>
                            <h6>Pesanan:</h6>
                            <ul>
                                @foreach ($pesanan->menu as $menu)
                                    <li>{{ $menu->nama }} x {{ $menu->pivot->jumlah }}
                                        - Rp {{ number_format($menu->harga * $menu->pivot->jumlah, 0, ',', '.') }}
                                    </li>
                                @endforeach
                            </ul>
                            <hr>
                            <p><strong>Total:</strong> Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
                            <p><strong>Metode Bayar:</strong> {{ $pesanan->metode_pembayaran }}</p>

                            @if ($pesanan->metode_pembayaran == 'QRIS')
                                <p>Scan QRIS untuk bayar:</p>
                                <img src="{{ asset('img/qris.png') }}" alt="QRIS" width="150">
                            @endif

                            <div class="text-center mt-3">
                                <button class="btn btn-secondary btn-sm" onclick="window.print()">🖨 Cetak
                                    Struk</button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let checkboxes = document.querySelectorAll('.menu-checkbox');
            let totalInput = document.getElementById('total_harga');

            function updateTotal() {
                let total = 0;
                checkboxes.forEach(cb => {
                    let jumlahInput = cb.closest('div').querySelector('.menu-jumlah');
                    if (cb.checked) {
                        jumlahInput.disabled = false;
                        let jumlah = parseInt(jumlahInput.value) || 1;
                        total += parseInt(cb.getAttribute('data-harga')) * jumlah;
                    } else {
                        jumlahInput.disabled = true;
                    }
                });
                totalInput.value = total;
            }

            checkboxes.forEach(cb => cb.addEventListener('change', updateTotal));

            // Update juga ketika jumlah diubah
            document.querySelectorAll('.menu-jumlah').forEach(input => {
                input.addEventListener('input', updateTotal);
            });
        });
    </script>
</body>

</html>

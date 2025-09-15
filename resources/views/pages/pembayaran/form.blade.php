<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Pesanan #{{ $pesanan->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
    <div class="container">
        <h3>Form Pembayaran Pesanan #{{ $pesanan->id }}</h3>
        <hr>

        {{-- Notifikasi sukses / error --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <p>Total yang harus dibayar:
            <strong>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong>
        </p>

        {{-- Detail Pesanan --}}
        <h5>Detail Pesanan:</h5>
        <ul>
            @foreach ($pesanan->menu as $item)
                <li>{{ $item->nama }} x {{ $item->pivot->jumlah }}
                    = Rp {{ number_format($item->harga * $item->pivot->jumlah, 0, ',', '.') }}
                </li>
            @endforeach
        </ul>
        <hr>

        {{-- Form Pembayaran --}}
        <form action="{{ route('pembayaran.store', $pesanan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="metode" class="form-label">Metode Pembayaran</label>
                <select name="metode" id="metode" class="form-select" required>
                    <option value="QRIS">QRIS</option>
                    <option value="Transfer">Transfer Bank</option>
                </select>
            </div>

            {{-- Upload Bukti untuk Transfer --}}
            <div class="mb-3" id="upload-bukti" style="display: none;">
                <label for="bukti" class="form-label">Upload Bukti Pembayaran</label>
                <input type="file" name="bukti" id="bukti" class="form-control" accept="image/*">
                <small class="text-muted">Wajib diisi jika memilih Transfer Bank</small>
            </div>

            <button type="submit" class="btn btn-success">Kirim Pembayaran</button>
        </form>
    </div>

    <script>
        const metode = document.getElementById('metode');
        const buktiUpload = document.getElementById('bukti-upload');

        metode.addEventListener('change', function() {
            if (this.value === 'qris' || this.value === 'transfer') {
                buktiUpload.style.display = 'block';
            } else {
                buktiUpload.style.display = 'none';
            }
        });
    </script>

</body>

</html>

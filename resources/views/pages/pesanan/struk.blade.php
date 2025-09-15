<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pesanan #{{ $pesanan->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
    <div class="container border p-4 rounded shadow-sm" style="max-width: 600px; background: #fff;">
        <h3 class="text-center mb-3">Struk Pesanan</h3>
        <h5 class="text-center text-muted">#{{ $pesanan->id }}</h5>
        <hr>

        {{-- Data Pemesan --}}
        <p><strong>Nama:</strong> {{ $pesanan->nama }}</p>
        <p><strong>Total Harga:</strong> Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
        <p><strong>Metode Pembayaran:</strong> {{ strtoupper($pesanan->metode_pembayaran) }}</p>
        <p><strong>Status:</strong>
        @if ($pesanan->pembayaran)
            @if ($pesanan->pembayaran->status == 'pending')
                <span class="badge bg-warning text-dark">Menunggu Verifikasi</span>
            @elseif($pesanan->pembayaran->status == 'dibayar')
                <span class="badge bg-success">Lunas</span>
            @else
                <span class="badge bg-danger">Ditolak</span>
            @endif
        @else
            <span class="badge bg-secondary">Belum Bayar</span>
        @endif
        </p>

        <hr>

        {{-- Tampilkan sesuai metode --}}
        <div class="qr">
        @if ($pesanan->metode_pembayaran == 'QRIS')
            <h5 class="mb-3">Silakan Scan QRIS untuk Membayar</h5>
            <div class="text-center mb-3">
                {!! QrCode::size(200)->generate($qrisString) !!}
            </div>
            <p class="text-center">Total:
                <strong>Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong>
            </p>
        @elseif ($pesanan->metode_pembayaran == 'Transfer Bank' || strtolower($pesanan->metode_pembayaran) == 'transfer')
            <h5 class="mb-3">Transfer ke Rekening:</h5>
            <div class="border p-3 rounded">
                <p><strong>Bank BCA</strong></p>
                <p>No. Rekening: <strong>1234567890</strong></p>
                <p>Atas Nama: <strong>Restoran ABC</strong></p>
            </div>
            <p class="mt-2">Total:
                <strong>Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong>
            </p>
        @endif
        </div>

        <hr>

        {{-- Detail Pesanan --}}
        <h5>Detail Menu:</h5>
        <ul>
            @foreach ($pesanan->menu as $menu)
                <li>{{ $menu->nama }} x {{ $menu->pivot->jumlah }} -
                    Rp{{ number_format($menu->harga * $menu->pivot->jumlah, 0, ',', '.') }}
                </li>
            @endforeach
        </ul>

        <hr>
        <p class="text-center text-muted small">Terima kasih telah memesan di <strong>Restoran ABC</strong></p>
    </div>
</body>

</html>

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
                <li>{{ $menu->nama }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}</li>
            @endforeach
        </ul>
        <hr>
        <p><strong>Total:</strong> Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
        <p><strong>Metode Bayar:</strong> {{ $pesanan->metode_pembayaran }}</p>

        {{-- Tampilkan QR hanya jika metode pembayaran QRIS --}}
        @if ($pesanan->metode_pembayaran == 'QRIS')
            <p>Scan QRIS untuk bayar:</p>
            {!! QrCode::size(150)->generate('Pembayaran ' . $pesanan->nama . ' - Rp ' . $pesanan->total_harga) !!}
        @endif

        <div class="text-center mt-3">
            <button class="btn btn-secondary btn-sm" onclick="window.print()">🖨 Cetak Struk</button>
        </div>
    </div>
</div>

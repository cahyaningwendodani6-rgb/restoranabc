@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Pembayaran QRIS Pesanan #{{ $pesanan->id }}</h3>
        <p>Total: Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>

        <h5>Scan QRIS Berikut:</h5>
        <div id="qrcode"></div>

        <form action="{{ route('pembayaran.uploadBukti', $pembayaran->id) }}" method="POST" enctype="multipart/form-data"
            class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="bukti" class="form-label">Upload Bukti Pembayaran</label>
                <input type="file" name="bukti" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Bukti</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
    <script>
        new QRCode(document.getElementById("qrcode"), "{{ $qrisString }}");
    </script>
@endsection

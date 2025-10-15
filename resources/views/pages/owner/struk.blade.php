<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pesanan #{{ $pesanan->id }} - Restoran ABC</title>
    <style>
        /* ====== Gaya umum struk ====== */
        body {
            font-family: 'Courier New', monospace;
            font-size: 13px;
            width: 58mm; /* Ukuran struk kasir */
            margin: 0 auto;
            color: #000;
            background: #fff;
        }

        .center { text-align: center; }
        .bold { font-weight: bold; }

        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }

        /* ====== Header ====== */
        .header {
            text-align: center;
            margin-bottom: 5px;
        }

        .header h2 {
            font-size: 16px;
            margin: 2px 0;
        }

        .header p {
            margin: 0;
            font-size: 11px;
        }

        /* ====== Info Pesanan ====== */
        .info {
            margin-bottom: 8px;
        }

        .info p {
            margin: 2px 0;
        }

        /* ====== Tabel ====== */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
            font-size: 12px;
        }

        th, td {
            padding: 2px 0;
        }

        td:nth-child(2),
        td:nth-child(3) {
            text-align: right;
        }

        tfoot td {
            font-weight: bold;
            border-top: 1px dashed #000;
            padding-top: 5px;
        }

        /* ====== Footer ====== */
        .footer {
            text-align: center;
            margin-top: 10px;
            font-size: 11px;
        }

        /* ====== Status label ====== */
        .status {
            display: inline-block;
            background-color: #000;
            color: #fff;
            padding: 1px 5px;
            border-radius: 3px;
            font-size: 10px;
        }

        /* ====== Tombol (non-print) ====== */
        .no-print {
            text-align: center;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .no-print button,
        .no-print a {
            background-color: #f97316;
            color: #fff;
            border: none;
            padding: 8px 20px;
            font-size: 14px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: 0.2s;
        }

        .no-print button:hover,
        .no-print a:hover {
            background-color: #ea580c;
        }

        /* ====== Mode cetak ====== */
        @media print {
            .no-print { display: none; }
            body { width: auto; margin: 0; }
        }

        /* ====== Ukuran halaman cetak ====== */
        @page {
            size: 58mm auto; /* untuk printer 58mm */
            margin: 2mm;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Restoran ABC</h2>
        <p>Jl. Raya Selaganggeng, Purbalingga</p>
        <p>Telp: +62 857 0076 3873</p>
        <div class="line"></div>
    </div>

    <div class="info">
        <p>No. Pesanan : <strong>#{{ $pesanan->id }}</strong></p>
        <p>Nama : {{ $pesanan->nama }}</p>
        <p>Tanggal : {{ $pesanan->created_at->format('d/m/Y H:i') }}</p>
        <p>Status : <span class="status">{{ strtoupper($pesanan->status) }}</span></p>
        <div class="line"></div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Jml</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesanan->menu as $menu)
            <tr>
                <td>{{ $menu->nama }}</td>
                <td>{{ $menu->pivot->jumlah }}</td>
                <td>Rp{{ number_format($menu->pivot->jumlah * $menu->harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Total Bayar</td>
                <td>Rp{{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="line"></div>

    <div class="footer">
        <p>Metode Pembayaran: <strong>{{ strtoupper($pesanan->metode_pembayaran) }}</strong></p>
        <p>Terima kasih telah memesan!</p>
        <p>~ Restoran ABC ~</p>
        <p>Dicetak: {{ now()->format('d/m/Y H:i') }}</p>
    </div>

    <div class="no-print">
        <button onclick="window.print()">🖨️ Cetak Struk</button>
        <a href="{{ url()->previous() }}">⬅️ Kembali</a>
    </div>

</body>
</html>

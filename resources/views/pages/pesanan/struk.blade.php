

@section('title', 'Struk Pesanan')

@section('content')
<style>
  body {
    font-family: 'Courier New', monospace; /* mirip struk */
    background: #f5f5f5;
  }
  .struk {
    max-width: 380px;
    margin: auto;
    background: #fff;
    padding: 20px;
    border: 1px dashed #333;
  }
  .struk h2 {
    text-align: center;
    font-size: 18px;
    margin-bottom: 10px;
  }
  .struk p {
    margin: 0;
    font-size: 14px;
  }
  .struk hr {
    border: none;
    border-top: 1px dashed #000;
    margin: 10px 0;
  }
  .struk table {
    width: 100%;
    font-size: 14px;
  }
  .struk table th,
  .struk table td {
    padding: 3px 0;
  }
  .struk .text-center {
    text-align: center;
  }
  .struk .text-right {
    text-align: right;
  }
  .qr {
    margin-top: 10px;
    text-align: center;
  }
  .footer {
    text-align: center;
    margin-top: 15px;
    font-size: 12px;
    border-top: 1px dashed #000;
    padding-top: 5px;
  }
</style>

<div class="struk">
  <h2>Resto ABC</h2>
  <p><strong>Nama:</strong> {{ $pesanan->nama }}</p>
  <p><strong>No HP:</strong> {{ $pesanan->telp }}</p>
  <p><strong>Alamat:</strong> {{ $pesanan->alamat }}</p>

  <hr>

  <table>
    <thead>
      <tr>
        <th>Menu</th>
        <th class="text-center">Qty</th>
        <th class="text-right">Harga</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pesanan->menu as $item)
      <tr>
        <td>{{ $item->nama }}</td>
        <td class="text-center">{{ $item->pivot->jumlah ?? 1 }}</td>
        <td class="text-right">Rp {{ number_format(($item->pivot->jumlah ?? 1) * $item->harga, 0, ',', '.') }}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2"><strong>Total</strong></td>
        <td class="text-right"><strong>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</strong></td>
      </tr>
    </tfoot>
  </table>

  <hr>

  <div class="qr">
    <p><strong>Scan QRIS</strong></p>
    {!! QrCode::size(150)->generate($qrisString) !!}
  </div>

  <div class="footer">
    <p>Terima kasih telah memesan 🙏</p>
    <p>Simpan struk ini sebagai bukti pembayaran</p>
  </div>
</div>

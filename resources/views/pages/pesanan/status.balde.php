<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Status Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h3 class="mb-4">Status Pesanan</h3>

    <div class="card shadow-sm p-3">
        <p><strong>ID Pesanan:</strong> {{ $pesanan->id }}</p>
        <p><strong>Menu:</strong> {{ $pesanan->menu->nama ?? '-' }}</p>
        <p><strong>Status:</strong> 
            @if($pesanan->status == 'pending')
                <span class="badge bg-warning">Pending</span>
            @elseif($pesanan->status == 'diproses')
                <span class="badge bg-primary">Diproses</span>
            @elseif($pesanan->status == 'diantar')
                <span class="badge bg-secondary">Diantar</span>
            @elseif($pesanan->status == 'selesai')
                <span class="badge bg-success">Selesai</span>
            @else
                <span class="badge bg-danger">Batal</span>
            @endif
        </p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

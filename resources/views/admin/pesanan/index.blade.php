<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Pesanan - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h3 class="mb-4">Daftar Pesanan</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Menu</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Ubah Status</th>
                        <th>Dipesan Pada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesanan as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                @if($item->menu && $item->menu->count())
                                    @foreach($item->menu as $menu)
                                        {{ $menu->nama }} ({{ $menu->pivot->jumlah }} pcs) <br>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>
                            <td>Rp {{ number_format($item->menu->sum('harga') ?? 0, 0, ',', '.') }}</td>
                            <td>
                                @if($item->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($item->status == 'diproses')
                                    <span class="badge bg-primary">Diproses</span>
                                @elseif($item->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-danger">Batal</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.pesanan.updateStatus', $item->id) }}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    <select name="status" class="form-select form-select-sm">
                                        <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="diproses" {{ $item->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        <option value="batal" {{ $item->status == 'batal' ? 'selected' : '' }}>Batal</option>
                                    </select>
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                                </form>
                            </td>
                            <td>{{ $item->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

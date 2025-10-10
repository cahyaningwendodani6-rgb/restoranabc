@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="fw-bold mb-4">Daftar Pembayaran</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>ID Pesanan</th>
                            <th>Nama Pemesan</th>
                            <th>Total</th>
                            <th>Metode</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pembayaran as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>#{{ $item->pesanan_id }}</td>
                                <td>{{ $item->pesanan->nama ?? '-' }}</td>
                                <td>Rp {{ number_format($item->pesanan->total_harga, 0, ',', '.') }}</td>
                                <td>{{ strtoupper($item->metode) ?? '-' }}</td>
                                <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if ($item->status == 'pending')
                                        <button type="button" class="btn btn-success btn-sm btn-verifikasi"
                                            data-id="{{ $item->id }}">
                                            Verifikasi
                                        </button>

                                        <button type="button" class="btn btn-danger btn-sm btn-tolak"
                                            data-id="{{ $item->id }}">
                                            Tolak
                                        </button>

                                        {{-- Form tersembunyi --}}
                                        <form id="form-verifikasi-{{ $item->id }}"
                                            action="{{ route('pembayaran.updateStatus', $item->id) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="dibayar">
                                        </form>

                                        <form id="form-tolak-{{ $item->id }}"
                                            action="{{ route('pembayaran.updateStatus', $item->id) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="ditolak">
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada pembayaran</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            console.log("✅ Script SweetAlert aktif di halaman pembayaran");

            // Tombol verifikasi
            document.querySelectorAll('.btn-verifikasi').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    Swal.fire({
                        title: 'Verifikasi Pembayaran?',
                        text: 'Pastikan data pembayaran sudah benar sebelum memverifikasi.',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Verifikasi',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('form-verifikasi-' + id).submit();
                        }
                    });
                });
            });

            // Tombol tolak
            document.querySelectorAll('.btn-tolak').forEach(btn => {
                btn.addEventListener('click', function() {
                    const id = this.dataset.id;
                    Swal.fire({
                        title: 'Tolak Pembayaran?',
                        text: 'Data pembayaran akan ditolak dan tidak bisa dikembalikan.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Tolak',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('form-tolak-' + id).submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush

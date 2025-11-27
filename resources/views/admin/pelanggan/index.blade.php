@extends('layouts.app')

@section('title', 'Daftar Pelanggan')

@section('content')
    <div class="container">
        <h3 class="mb-4">Daftar Pelanggan ({{ $jumlah }})</h3>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div id="alert-box" class="alert alert-success text-center position-fixed top-50 start-50 translate-middle"
                style="background: black; color: white; border: 1px solid white; z-index: 9999; width: 300px;">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(() => {
                    document.getElementById('alert-box').style.display = 'none';
                }, 2000);
            </script>
        @endif

        <table class="table table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Terakhir Login</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pelanggans as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->telp ?? '-' }}</td>
                        <td>{{ $p->alamat ?? '-' }}</td>
                        <td>
                            @php
                                $lastLogin = $p->last_login_at ? \Carbon\Carbon::parse($p->last_login_at) : null;
                            @endphp

                            @if ($lastLogin && $lastLogin->gt(now()->subMinutes(10)))
                                <span class="badge bg-success">Online</span>
                            @else
                                <span class="badge bg-secondary">Offline</span>
                            @endif
                        </td>
                        <td>
                            {{ $p->last_login_at ? \Carbon\Carbon::parse($p->last_login_at)->format('d M Y H:i') : '-' }}
                        </td>
                        <td>
                            <a href="{{ route('admin.pelanggan.detail', $p->id) }}" class="btn btn-sm btn-info text-white">
                                <i class="bi bi-eye"></i> Detail
                            </a>

                            <button type="button" class="btn btn-sm btn-danger"
                                onclick="actionDelete('{{ route('admin.pelanggan.destroy', $p->id) }}')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            Belum ada data pelanggan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Form delete tersembunyi --}}
        <form id="formDelete" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function actionDelete(url) {
            Swal.fire({
                title: "Apakah kamu yakin?",
                text: "Data yang dihapus tidak bisa dikembalikan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                cancelButtonColor: "#343a40",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = document.getElementById('formDelete');
                    form.action = url;
                    form.submit();
                }
            });
        }
    </script>
@endpush

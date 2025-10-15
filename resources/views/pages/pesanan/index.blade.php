@extends('layouts.app')

@section('title', 'Halaman Pesanan')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Daftar Riwayat Pesanan</h3>

            <div class="card card-body">
                <div class="row align-items-center mb-3">
                    {{-- Filter tanggal di kiri --}}
                    <div class="col-md-6">
                        <form id="filterForm" action="" method="GET" class="d-flex align-items-center gap-2">
                            <label for="tanggal" class="fw-semibold">Filter:</label>
                            <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                                class="form-control w-auto" />
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Reset</a>
                        </form>
                    </div>

                    {{-- Filter status di kanan --}}
                    <div class="col-md-6 text-end">
                        <form id="statusForm" action="" method="GET" class="d-inline">
                            {{-- Bawa juga tanggal agar filter gabung --}}
                            <input type="hidden" name="tanggal" value="{{ request('tanggal') }}">

                            <select name="status" id="statusFilter" class="form-select w-auto d-inline text-white fw-bold"
                                style="
                                    @if (request('status') == 'pending') background-color: #ffc107;
                                    @elseif (request('status') == 'diproses') background-color: #0d6efd;
                                    @elseif (request('status') == 'diantar') background-color: #20c997;
                                    @elseif (request('status') == 'selesai') background-color: #198754;
                                    @elseif (request('status') == 'batal') background-color: #dc3545;
                                    @else background-color: #6c757d; @endif
                                "
                                onchange="this.form.submit()">
                                <option value="">-- Semua Status --</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}
                                    style="background-color:#ffc107; color:#000;">
                                    Pending
                                </option>
                                <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}
                                    style="background-color:#0d6efd; color:#fff;">
                                    Diproses
                                </option>
                                <option value="diantar" {{ request('status') == 'diantar' ? 'selected' : '' }}
                                    style="background-color:#20c997; color:#fff;">
                                    Diantar
                                </option>
                                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}
                                    style="background-color:#198754; color:#fff;">
                                    Selesai
                                </option>
                                <option value="batal" {{ request('status') == 'batal' ? 'selected' : '' }}
                                    style="background-color:#dc3545; color:#fff;">
                                    Batal
                                </option>
                            </select>
                        </form>
                    </div>
                </div>

                <table class="table dataTable align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Telp</th>
                            <th>Pesanan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->telp }}</td>
                                <td>
                                    @foreach ($item->menu as $menu)
                                        {{ $menu->nama }} x {{ $menu->pivot->jumlah }}@if (!$loop->last),@endif
                                    @endforeach
                                </td>
                                <td>{{ $item->created_at->isoFormat('DD MMM Y HH:mm') }}</td>
                                <td>
                                    <form action="{{ route('pesanan.updateStatus', $item->id) }}" method="POST"
                                        class="d-flex align-items-center gap-2">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" id="status" class="form-select w-auto text-white fw-bold"
                                            style="
                                                @if ($item->status == 'pending') background-color: #ffc107; 
                                                @elseif ($item->status == 'diproses') background-color: #0d6efd;
                                                @elseif ($item->status == 'diantar') background-color: #20c997;
                                                @elseif ($item->status == 'selesai') background-color: #198754;
                                                @elseif ($item->status == 'batal') background-color: #dc3545; @endif
                                            "
                                            onchange="this.form.submit()">
                                            <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}
                                                style="background-color: #ffc107; color: #000;">
                                                Pending
                                            </option>
                                            <option value="diproses" {{ $item->status == 'diproses' ? 'selected' : '' }}
                                                style="background-color: #0d6efd; color: #fff;">
                                                Diproses
                                            </option>
                                            <option value="diantar" {{ $item->status == 'diantar' ? 'selected' : '' }}
                                                style="background-color: #20c997; color: #fff;">
                                                Diantar
                                            </option>
                                            <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}
                                                style="background-color: #198754; color: #fff;">
                                                Selesai
                                            </option>
                                            <option value="batal" {{ $item->status == 'batal' ? 'selected' : '' }}
                                                style="background-color: #dc3545; color: #fff;">
                                                Batal
                                            </option>
                                        </select>
                                    </form>
                                </td>
                                <td class="text-center">
                                    {{-- Lihat detail pesanan --}}
                                    <a href="{{ route('pesanan.show', $item->id) }}" class="btn btn-sm btn-info me-1"
                                        title="Lihat Detail">
                                        <span class="ti ti-eye"></span>
                                    </a>

                                    {{-- Cetak struk --}}
                                    <a href="{{ route('admin.pesanan.cetak', $item->id) }}" target="_blank"
                                        class="btn btn-sm text-white"
                                        style="background-color:#f97316; font-weight:600;" title="Cetak Struk">
                                        <span class="ti ti-printer"></span>
                                    </a>

                                    {{-- Hapus pesanan --}}
                                    <a href="javascript:;" onclick="actionDelete('{{ route('pesanan.destroy', $item->id) }}')"
                                        class="btn btn-sm btn-danger ms-1" title="Hapus Pesanan">
                                        <span class="ti ti-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form action="" id="formDelete" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datables-resposive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/libs/sweetalert2/sweetalert2.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
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

    @if (session()->has('success'))
        <script type="text/javascript">
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
@endpush

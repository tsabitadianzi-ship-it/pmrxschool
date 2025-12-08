@extends('layouts.app')
@section('title', 'Manajemen Anggota')

@section('content')
<style>
.table thead th {
    background-color: #4b8c96ff;
    color: #fff;

}
div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-item.active .page-link {
    background-color: #4b8c96ff !important;
    border-color: #4b8c96ff !important;
    color: #fff !important;
    border-radius: 8px;
}


</style>
<div class="row">
    <div class="col-md-12">

        <h2 class="fw-bold mb-0">Manajemen Anggota</h2>
        <p class="text-muted mb-3">Kelola data anggota, konfirmasi pendaftar, dan informasi pembina PMR.</p>
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-semibold">Anggota Aktif</h5>
                        <p class="fs-3 fw-bold text-warning">{{ $anggotaAktif->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-semibold">Pendaftar Baru</h5>
                        <p class="fs-3 fw-bold text-warning">{{ $anggotaKonfirmasi->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="fw-semibold">Jumlah Pembina</h5>
                        <p class="fs-3 fw-bold text-warning">{{ $pembina->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="fw-semibold text-secondary mt-4 mb-2">Konfirmasi Anggota</h4>
        <div class="card card-body shadow-sm border-0">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($anggotaKonfirmasi as $i => $anggota)
                    <tr>
                        <td class="text-center">{{ $i+1 }}</td>
                        <td>{{ $anggota->nama_lengkap }}</td>
                        <td>{{ $anggota->nis_k }}</td>
                        <td>{{ $anggota->kelas }}</td>
                        <td>{{ $anggota->status }}</td>
                        <td>
                            <a href="{{ route('pembina.anggota_detail', $anggota->id) }}" 
                               class="btn btn-sm" style="background-color: #4b8c96ff; color: white">
                                <span class="ti ti-eye me-1"></span>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="text-center text-muted py-3">Belum ada anggota untuk dikonfirmasi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-8">
            <button type="button" 
                    class="btn"
                    style="background-color: #d14f4fff; color: white; padding: 10px 20px; font-size: 1rem; border-radius: 8px; gap: 8px;"
                    onclick="confirmUpdateKelas('{{ route('pembina.pangkat_kelas') }}')">
                <i class="ti ti-arrow-up me-1"></i>
                Update Kelas Anggota
            </button>
        </div>

        <h4 class="fw-semibold text-secondary mb-2">Anggota Aktif</h4>
        <div class="card card-body shadow-sm border-0">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($anggotaAktif as $i => $item)
                    <tr>
                        <td class="text-center">{{ $i+1 }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->nis_k }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <a href="{{ route('pembina.anggota_edit', $item->id) }}" 
                               class="btn btn-sm" style="background-color: #d18c4fff; color:white;">
                                <span class="ti ti-pencil me-1"></span>
                            </a>
                            <button type="button" class="btn btn-sm" 
                                    style="background-color: #d14f4fff; color: white;"
                                    onclick="actionDelete('{{ route('pembina.anggota.destroy', $item->id) }}')">
                                <span class="ti ti-trash"></span>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="text-center text-muted py-3">Belum ada anggota aktif</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <h4 class="fw-semibold text-secondary mt-5 mb-3">Data Pembina</h4>
        <div class="row">
            @forelse($pembina as $item)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100 text-center">
                    <div class="card-body">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_lengkap) }}&background=4b8c96&color=fff&size=100"
                             alt="{{ $item->nama_lengkap }}" 
                             class="rounded-circle shadow-sm mb-3">
                        <h5 class="fw-semibold mb-1">{{ $item->nama_lengkap }}</h5>
                        <p class="small text-muted mb-2">NIP: {{ $item->nis_k }}</p>
                        <p class="small mb-1"><span class="ti ti-phone me-1"></span>{{ $item->no_telp }}</p>
                        <p class="small mb-3"><span class="ti ti-user me-1"></span>{{ $item->jenis_kelamin }}</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('pembina.pembina.edit', $item->id) }}" 
                               class="btn btn-sm" style="background-color: #d18c4fff; color:white;">
                                <span class="ti ti-pencil"></span> Edit
                            </a>
                            <button type="button" class="btn btn-sm" 
                                    style="background-color: #d14f4fff; color:white;"
                                    onclick="actionDelete('{{ route('pembina.pembina.destroy', $item->id) }}')">
                                <span class="ti ti-trash"></span> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center text-muted">Belum ada data pembina</p>
            @endforelse
        </div>

    </div>
</div>

<form id="form-delete" action="" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
@endpush

@push('scripts')
<script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function () {
    $('.dataTable').DataTable({
        language: {
            emptyTable: "Belum ada data yang tersedia"
        }
    });
});

function actionDelete(url) {
    Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d14f4f"
    }).then((result) => {
        if (result.isConfirmed) {
            $('#form-delete').attr('action', url);
            $('#form-delete').submit();
        }
    });
}
</script>

@if (Session::has('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ Session::get('success') }}',
    background: '#fff7ef',
    confirmButtonColor: '#4b8c96ff'
});
</script>
@endif

<script>
    function confirmUpdateKelas(url) {
    Swal.fire({
        title: "Yakin ingin update kelas semua anggota?",
        text: "Perubahan ini tidak bisa dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, update!",
        cancelButtonText: "Batal",
        confirmButtonColor: "#219EBC"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}

</script>
@endpush

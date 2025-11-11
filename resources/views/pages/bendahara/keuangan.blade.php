@extends('layouts.app')

@section('title', 'Data Keuangan')

@section('content')
<div class="row fade-in">
    <div class="col-md-12">

        <div class="container py-4 fade-in">
            <h2 class="fw-bold mb-0">Data Keuangan</h2>
            <p class="text-muted mb-3">Catatan pengeluaran dan pemasukan kas ekstrakulikuler PMR</p>
            <a href="{{ route('bendahara.keuangan.create') }}" class="btn btn-add shadow-sm">
                <i class="ti ti-plus me-1"></i> Tambah Data
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-3 mt-3">
            <div class="card-body p-4">
                <table class="table table-striped table-hover dataTable align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Tipe</th>
                            <th>Keterangan</th>
                            <th class="text-end">Jumlah</th>
                            <th class="text-end">Total</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keuangan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</td>
                                <td>
                                    @if($item->tipe == 'Pemasukan')
                                        <span class="text-success fw-semibold">+ {{ $item->tipe }}</span>
                                    @else
                                        <span class="text-danger fw-semibold">- {{ $item->tipe }}</span>
                                    @endif
                                </td>
                                <td>{{ $item->keterangan }}</td>
                                <td class="text-end">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                <td class="text-end fw-semibold">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('bendahara.keuangan.edit', $item->id) }}" class="btn btn-sm btn-edit">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-sm btn-delete"
                                           onclick="actionDelete('{{ route('bendahara.keuangan.destroy', $item->id) }}')">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<form id="form-delete" action="" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>

@push('styles')
<link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />

<style>
/* === ANIMASI === */
.fade-in {
    animation: fadeIn 0.6s ease;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
}

/* === TABEL === */
.table thead th {
    background-color: #4B8C96;
    color: #fff;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: none;
}
.table tbody tr:hover {
    background-color: rgba(75, 140, 150, 0.08);
    transition: background-color 0.2s ease-in-out;
}
div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-item.active .page-link {
    background-color: #4B8C96 !important; 
    border-color: #4B8C96 !important;
    color: #fff !important;
    border-radius: 8px;
}
div.dataTables_wrapper div.dataTables_info {
    color: #6c757d;
    font-weight: 500;
}

/* === TOMBOL === */
.btn-add {
    background-color: #4B8C96;
    color: white;
    border-radius: 10px;
    padding: 10px 18px;
}
.btn-add:hover {
    background-color: #3e7d85;
}

.btn-edit {
    background-color: #4B8C96;
    color: white;
    border-radius: 6px;
}
.btn-edit:hover {
    background-color: #3e7d85;
}

.btn-delete {
    background-color: #d14f4f;
    color: white;
    border-radius: 6px;
}
.btn-delete:hover {
    background-color: #b84141;
}
</style>
@endpush

@push('scripts')
<script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function () {
    $('.dataTable').DataTable({
        language: {
            emptyTable: "Belum ada data keuangan",
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            paginate: {
                previous: "Sebelumnya",
                next: "Berikutnya"
            }
        },
        order: [[1, 'desc']],
        pageLength: 10
    });
});

function actionDelete(url){
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
    title: 'Berhasil!',
    text: '{{ Session::get('success') }}',
      background: '#ffffff',
    confirmButtonColor: '#219EBC'
});
</script>
@endif
@endpush
@endsection
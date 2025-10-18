@extends('layouts.app')

@section('title', 'Data Keuangan')

@section('content')
<div class="row fade-in">
    <div class="col-md-12">

        <div class="container py-4 fade-in">
            <h2 class="fw-bold mb-0">Data Keuangan</h2>
            <p class="text-muted mb-3">Catatan pengeluaran dan pemasukan kas PMR!</p>
            <a href="{{ route('bendahara.keuangan.create') }}" 
               class="btn px-3 py-2 text-white shadow-sm"
               style="background-color: #4B8C96; border-radius: 10px;">
                <i class="ti ti-plus me-1"></i> Tambah Data
            </a>
        </div>

        <div class="card border-0 shadow-sm rounded-3">
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
                                        <a href="{{ route('bendahara.keuangan.edit', $item->id) }}" 
                                           class="btn btn-sm text-white"
                                           style="background-color: #4B8C96; border-radius: 6px;">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        <a href="javascript:;" 
                                           class="btn btn-sm text-white"
                                           style="background-color: #C94E4E; border-radius: 6px;"
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
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('/vendor/libs/sweetalert2/sweetalert2.css') }}" />

<style>
.fade-in {
    animation: fadeIn 0.6s ease;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
}

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
</style>
@endpush

@push('scripts')
<script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
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
        title: "Yakin ingin menghapus?",
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        confirmButtonColor: "#4B8C96",
        cancelButtonColor: "#d33"
    }).then((result) => {
        if (result.isConfirmed) {
            $('#form-delete').attr('action', url);
            $('#form-delete').submit();
        }
    });
}
</script>

@if (Session::has('success'))
<script type="text/javascript">
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ Session::get('success') }}',
    confirmButtonColor: '#4B8C96'
});
</script>
@endif
@endpush

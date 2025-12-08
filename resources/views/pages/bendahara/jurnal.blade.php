@extends('layouts.app')
@section('title', 'Jurnal Bendahara')

@section('content')
<style>
.table thead th {
    background-color: #4b8c96ff;
    color: #fff;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-item.active .page-link {
    background-color: #4b8c96ff !important;
    border-color: #4b8c96ff !important;
    color: #fff !important;
    border-radius: 8px;
}

.dataTables_wrapper .dataTables_info {
    color: #6c757d;
}
</style>
<div class="row">
    <div class="col-md-12">

        <h2 class="fw-bold mb-0">Data Jurnal</h2>
        <p class="text-muted mb-3">Catatan kegiatan harian dan waktu pelaksanaan ekstrakulikuler PMR</p>

        <div class="card card-body">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kegiatan</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jurnal as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</td>
                        <td>{{ $item->kegiatan }}</td>
                        <td>{{ $item->waktu_mulai }}</td>
                        <td>{{ $item->waktu_selesai }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">
                            <i class="ti ti-inbox me-1"></i> Belum ada data jurnal
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('/vendor/libs/sweetalert2/sweetalert2.css') }}" />

@endpush

@push('scripts')
<script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script>
$(function () {
    $('.dataTable').DataTable({
        language: {
            emptyTable: "Belum ada data jurnal yang tercatat"
        }
    });
});
</script>
@endpush

@extends('layouts.app')

@section('title', 'Data Keuangan')

@section('content')
 <style>
.table thead th {
    background-color: #4b8c96ff;
    color: #fff;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: none;
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

        <h2 class="fw-bold"> Data Keuangan </h2>
        <p class="text-muted mb-3">Catatan pengeluaran dan pemasukan kas PMR!</p>
        <div class="card card-body">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Tipe</th>
                        <th>Keterangan</th>
                        <th class="text-end">Jumlah</th>
                        <th class="text-end">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($keuangan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</td>
                            <td>
                                @if($item->tipe == 'Pemasukan')
                                    <span class="text-success fw-bold">+ {{ $item->tipe }}</span>
                                @else
                                    <span class="text-danger fw-bold">- {{ $item->tipe }}</span>
                                @endif
                            </td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="text-end">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td class="text-end">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
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
                emptyTable: "Belum ada data keuangan"
            }
        });
    });
    </script>
@endpush

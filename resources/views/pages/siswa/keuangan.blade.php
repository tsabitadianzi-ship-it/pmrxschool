@extends('layouts.app')
@section('title', 'Data Keuangan')

@section('content')
<style>
  /* === BASE STYLE === */
  body {
    background-color: #f6fbff;
    min-height: 100vh;
    position: relative;
  }

  h2 {
    color: #2f4f4f;
    font-weight: 700;
  }

  /* === CARD STYLE === */
  .card {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid rgba(0, 0, 0, 0.04);
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
    
    transition: none !important;
    transform: none !important;
  }

  .card:hover {
    /* tidak gerak waktu dihover */
    transform: none !important;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05) !important;
  }

  .card:active {
    transform: none !important;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05) !important;
  }

  /* === TABLE STYLE === */
  .table {
    border-radius: 10px;
    overflow: hidden;
  }

  .table thead th {
    background-color: #219EBC;
    color: #fff;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.4px;
    border: none;
    padding: 12px;
  }

  .table tbody td {
    color: #333;
    vertical-align: middle;
    padding: 10px 12px;
  }

  .table-striped tbody tr:nth-of-type(odd) {
    background-color: #f4fbfd;
  }

  .table-striped tbody tr:hover {
    background-color: #e0f6fc;
  }

  /* === TIPE WARNA === */
  .text-success {
    color: #2d9c72 !important;
  }

  .text-danger {
    color: #d9534f !important;
  }

  /* === DATATABLE CUSTOM === */
  div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-item.active .page-link {
    background-color: #219EBC !important;
    border-color: #219EBC !important;
    color: #fff !important;
    border-radius: 8px;
  }

  div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-link {
    color: #219EBC !important;
    border-radius: 6px;
  }

  div.dataTables_wrapper div.dataTables_filter input {
    border-radius: 8px;
    border: 1px solid #cfe7ee;
    padding: 6px 10px;
  }

  div.dataTables_wrapper div.dataTables_filter label {
    color: #287C96;
    font-weight: 500;
  }

  /* ❌ hilangkan efek klik/focus default */
  *:focus,
  *:active {
    outline: none !important;
    box-shadow: none !important;
  }
</style>

<div class="container py-4 fade-in">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="fw-bold mb-0">Data Keuangan</h2>
      <p class="text-muted mb-0">Rekap keuangan kegiatan dan kas PMR 💰</p>
    </div>
  </div>

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
        emptyTable: "Belum ada data keuangan",
        search: "Cari:",
        lengthMenu: "Tampilkan _MENU_ data",
        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
        paginate: {
          previous: "Sebelumnya",
          next: "Berikutnya"
        }
      }
    });
  });
</script>
@endpush

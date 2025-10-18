@extends('layouts.app')
@section('title', 'Jurnal Sekretaris')

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
    transition: all 0.3s ease;
  }

  .card:hover {
  transform: none;
  box-shadow: 0 6px 18px rgba(33, 158, 188, 0.08);
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

  /* === DATATABLE PAGINATION === */
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

  /* === DATATABLE SEARCH BAR === */
  div.dataTables_wrapper div.dataTables_filter input {
    border-radius: 8px;
    border: 1px solid #cfe7ee;
    padding: 6px 10px;
  }

  div.dataTables_wrapper div.dataTables_filter label {
    color: #287C96;
    font-weight: 500;
  }
</style>

<div class="container py-4 fade-in">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="fw-bold mb-0">Data Jurnal Sekretaris</h2>
      <p class="text-muted mb-0">Catatan kegiatan dan aktivitas PMR 📘</p>
    </div>
  </div>

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
        @foreach ($jurnal as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</td>
          <td>{{ $item->kegiatan }}</td>
          <td>{{ $item->waktu_mulai }}</td>
          <td>{{ $item->waktu_selesai }}</td>
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
        search: "Cari:",
        lengthMenu: "Tampilkan _MENU_ data",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        paginate: {
          previous: "Sebelumnya",
          next: "Berikutnya"
        }
      }
    });
  });
</script>
@endpush

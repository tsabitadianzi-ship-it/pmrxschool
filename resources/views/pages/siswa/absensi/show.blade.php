@extends('layouts.app-no-sidebar')

@section('title', 'Detail Absensi')

@push('styles')
<link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<style>
body {
    background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
    background-size: cover;
}
.main-area { display: flex; justify-content: center; }
.card-detail {
    width: 100%; max-width: 950px;
    background: rgba(255,255,255,0.95);
    border-radius: 20px; padding: 2.5rem; 
}
h2 { color:#164b5c; font-weight:700; text-align:center; }

.table thead th { background-color:#4B8C96; color:#fff; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; border:none; }
.table tbody tr:hover { background-color: rgba(75,140,150,0.08); }

.badge { font-weight:500; font-size:0.9rem; }
.bg-success { background-color:#4fd167ff !important; color:white; }
.bg-warning { background-color:#d18c4fff !important; color:white; }
.bg-danger { background-color:#d14f4fff !important; color:white; }

.btn-back {
    background-color:#6b7770ff; color:white; border:none; border-radius:10px;
    padding:10px 18px; font-weight:500; 
}
.btn-back:hover { background-color:#58615bff; }

div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-item.active .page-link {
    background-color: #4B8C96 !important; border-color: #4B8C96 !important; color:#fff !important; border-radius:8px;
}
div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-link {
    background-color: #4B8C96 !important; color:#fff !important; border:none !important; border-radius:6px; margin:0 4px;
}
div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-link:hover { background-color: #3e7d85 !important; color:#fff !important; }
div.dataTables_wrapper div.dataTables_paginate ul.pagination .previous .page-link,
div.dataTables_wrapper div.dataTables_paginate ul.pagination .next .page-link {
    background-color: transparent !important; color:#6c757d !important; border:1px solid #dee2e6 !important;
}
div.dataTables_wrapper div.dataTables_paginate ul.pagination .previous .page-link:hover,
div.dataTables_wrapper div.dataTables_paginate ul.pagination .next .page-link:hover {
    background-color: #e2e6ea !important; color: #495057 !important;
}
.text-center.mt-3 .btn-back { padding: 8px 20px; }
</style>
@endpush

@section('content')
<div class="main-area">
    <div class="card-detail">
        <h2>Detail Absensi - {{ $tanggal }}</h2>

        <table class="table table-striped table-hover dataTable align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Kegiatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absensis as $item)
                <tr>
                    <td></td> 
                    <td>{{ $item->user->nama_lengkap ?? '-' }}</td>
                    <td>
                        <span class="badge 
                            @if($item->status == 'Hadir') bg-success
                            @elseif($item->status == 'Izin') bg-warning
                            @else bg-danger @endif">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td>{{ $item->kegiatan ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center mt-3">
            <a href="{{ route('siswa.absensi') }}" class="btn btn-back">← Kembali</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(function () {
    var table = $('.dataTable').DataTable({
        language: {
            emptyTable: "Belum ada data absensi",
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            paginate: { previous: "Sebelumnya", next: "Berikutnya" }
        },
        order: [[1,'asc']], 
        pageLength: 10,
        columnDefs: [
            { targets: 0, searchable: false, orderable: false, className: 'dt-center' }
        ]
    });

    table.on('order.dt search.dt draw.dt', function() {
        table.column(0, { search:'applied', order:'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    @if(Session::has('success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ Session::get('success') }}',
        background: '#ffffff',
        confirmButtonColor: '#219EBC'
    });
    @endif
});
</script>
@endpush

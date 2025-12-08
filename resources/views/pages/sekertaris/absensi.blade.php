@extends('layouts.app')
@section('title', 'Data Absensi')

@section('content')

<style>
.page-header h2 {
    font-weight: 700;
    color: #2f4f4f;
}
.page-header p {
    color: #6c757d;
}
.btn-main {
    background-color: #4B8C96;
    color: white;
    border-radius: 8px;
    padding: 8px 16px;
}

.card-tanggal {
    background: #fff;
    border-radius: 16px;
    border: none;
    margin-bottom: 1.2rem;
}
.card-tanggal-header {
    background-color: #7ac0d5ff;
    color: #125366;
    font-weight: 600;
    border-top-left-radius: 16px;
    border-top-right-radius: 16px;
    padding: 0.9rem 1.1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.card-actions {
    display: flex;
    gap: 0.4rem;
}
.btn-detail {
    background-color: #219EBC;
    color: #fff;
    border-radius: 6px;
    padding: 4px 12px;
    font-size: 0.85rem;
}
.btn-danger-small {
    background-color: #d14f4fff;
    color: white;
    border-radius: 6px;
    padding: 4px 12px;
    font-size: 0.85rem;
}

.card-tanggal-body {
    padding: 1rem;
    display: flex;
    gap: 0.6rem;
    flex-wrap: wrap;
}
.badge-status {
    padding: 0.45em 0.9em;
    border-radius: 12px;
    font-size: 0.85rem;
    font-weight: 500;
    color: #fff;
}
.badge-hadir { background-color: #4fd167ff; }
.badge-izin { background-color: #d18c4fff; }
.badge-tidak { background-color: #d14f4fff; }
</style>

<div class="container py-4 fade-in">

    <!-- Header -->
    <div class="page-header mb-3">
        <h2>Data Absensi</h2>
        <p>Catatan absensi kehadiran anggota PMR</p>
        <a href="{{ route('sekertaris.absensi.create') }}" class="btn btn-main">+ Tambah Absensi</a>
    </div>

    <!-- Card per tanggal -->
    @forelse($absensiPerTanggal as $tanggal => $absensis)
        <div class="card card-tanggal">

            <!-- HEADER CARD -->
            <div class="card-tanggal-header">
                <span>{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</span>

                <div class="card-actions">
                    <!-- Lihat Detail -->
                    <a href="{{ route('sekertaris.absensi.show', $tanggal) }}" class="btn btn-detail">
                        Lihat Detail
                    </a>

                    <!-- Hapus -->
                    <button type="button" class="btn btn-danger-small"
                        onclick="actionDelete('{{ route('sekertaris.absensi.destroyByTanggal', $tanggal) }}')">
                        <span class="ti ti-trash"></span>
                    </button>
                </div>
            </div>

            <!-- BADGE STATUS -->
            <div class="card-tanggal-body">
                @php
                    $countHadir = $absensis->where('status', 'Hadir')->count();
                    $countIzin = $absensis->where('status', 'Izin')->count();
                    $countTidak = $absensis->where('status', 'Tidak Hadir')->count();
                @endphp

                <span class="badge-status badge-hadir">Hadir: {{ $countHadir }}</span>
                <span class="badge-status badge-izin">Izin: {{ $countIzin }}</span>
                <span class="badge-status badge-tidak">Tidak Hadir: {{ $countTidak }}</span>
            </div>
        </div>

    @empty
        <div class="alert alert-info text-center">Belum ada data presensi</div>
    @endforelse


    <!-- FORM DELETE -->
    <form id="form-delete" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>

</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function actionDelete(url){
    Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Data pada tanggal ini akan dihapus semua.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        confirmButtonColor: "#d14f4f"
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('form-delete');
            form.action = url;
            form.submit();
        }
    });
}
</script>

@if (Session::has('success'))
<script type="text/javascript">
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ Session::get('success') }}',
    background: '#fff7ef', 
    confirmButtonColor: '#219EBC' 
});
</script>
@endif
@endpush
@endsection

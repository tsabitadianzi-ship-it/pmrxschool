@extends('layouts.app')
@section('title', 'Data Absensi')

@section('content')
<style>
body { background-color: #F8FBFD; }

.page-header {
    margin-bottom: 1.5rem;
}
.page-header h2 {
    font-weight: 700;
    color: #2f4f4f;
}
.page-header p {
    color: #6c757d;
    margin-bottom: 0.8rem;
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
    box-shadow: 0 6px 18px rgba(0,0,0,0.05);
    margin-bottom: 1rem;
}
.card-tanggal-header {
    background-color: #7ac0d5ff;
    color: #125366;
    font-weight: 600;
    border-top-left-radius: 16px;
    border-top-right-radius: 16px;
    padding: 0.8rem 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.card-tanggal-body {
    padding: 1rem;
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}
.badge-status {
    padding: 0.4em 0.8em;
    border-radius: 12px;
    font-size: 0.85rem;
    font-weight: 500;
    color: #fff;
}
.badge-hadir { background-color: #4fd167ff; }
.badge-izin { background-color: #d18c4fff; }
.badge-tidak { background-color: #d14f4fff; }

.btn-detail {
    background-color: #219EBC;
    color: #fff;
    border-radius: 6px;
    padding: 4px 12px;
    font-size: 0.85rem;
}
.btn-detail:hover { background-color: #187a91; }
</style>

<div class="container py-4 fade-in">
    <div class="page-header d-flex flex-column align-items-start">
        <h2>Data Absensi</h2>
        <p>Catatan absensi kehadiran anggota PMR</p>
    </div>

    @forelse($absensiPerTanggal as $tanggal => $absensis)
        <div class="card card-tanggal">
            <div class="card-tanggal-header">
                <span>{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</span>
                <a href="{{ route('pembina.absensi.show', $tanggal) }}" class="btn btn-detail">Lihat Detail</a>
            </div>
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
</div>
@endsection

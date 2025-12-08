@extends('layouts.app-no-sidebar')

@section('title', 'Detail Anggota')

@section('content')
<div class="main-area">
    <div class="card-detail">
        <h2 class="fw-bold text-center mb-4">Detail Anggota</h2>

        <div class="card card-body p-0">
            <table class="table table-striped mb-0">
                <tbody>
                    <tr><th>Nama</th><td>{{ $anggota->nama_lengkap }}</td></tr>
                    <tr><th>NIS</th><td>{{ $anggota->nis_k }}</td></tr>
                    <tr><th>Tanggal Lahir</th><td>{{ $anggota->tanggal_lahir }}</td></tr>
                    <tr><th>Alamat</th><td>{{ $anggota->alamat }}</td></tr>
                    <tr><th>No Telepon</th><td>{{ $anggota->no_telp }}</td></tr>
                    <tr><th>Kelas</th><td>{{ $anggota->kelas }}</td></tr>
                    <tr><th>Jenis Kelamin</th><td>{{ $anggota->jenis_kelamin }}</td></tr>
                    <tr><th>Alasan Masuk Ekstrakurikuler</th><td>{{ $anggota->alasan }}</td></tr>
                </tbody>
            </table>
        </div>

        <!-- TOMBOL -->
        <div class="d-flex gap-2 mt-4 justify-content-center align-items-center flex-wrap btn-container">
            <a href="{{ route('pembina.anggota') }}" class="btn btn-back">
                <i class="ti ti-arrow-left me-1"></i> Kembali
            </a>

            <form action="{{ route('pembina.anggota.terima', $anggota->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-submit">
                    <i class="ti ti-check me-1"></i> Terima
                </button>
            </form>

            <form action="{{ route('pembina.anggota.tolak', $anggota->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-decline">
                    <i class="ti ti-x me-1"></i> Tolak
                </button>
            </form>
        </div>

        @if (session('success'))
            <div class="alert alert-success mt-4 text-center">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
body {
    background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
    background-size: cover;
    min-height: 100vh;
    font-family: "Public Sans", sans-serif;
    overflow-x: hidden;
    margin: 0;
}

.main-area {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: calc(100vh - 80px);
    padding: 50px 20px;
}

.card-detail {
    width: 100%;
    max-width: 900px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(8px);
    border-radius: 18px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    padding: 2.5rem;
    animation: fadeIn 0.6s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

h2 { color: #164b5c; font-weight: 700; }
th { color: #164b5c; font-weight: 600; }
td { color: #3b5358; }

.btn-back, .btn-submit, .btn-decline {
    border: none;
    border-radius: 10px;
    font-weight: 500;
    font-size: 0.95rem;
    padding: 6px 14px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
    color: white;
    height: 38px;
    min-width: 90px;
}

.btn-back { background-color: #6b7770; }
.btn-submit { background-color: #219EBC; }
.btn-decline { background-color: #d14f4f; }

.btn-back:hover, .btn-submit:hover, .btn-decline:hover {
    transform: translateY(-1px);
    opacity: 0.9;
}

.btn-container form {
    display: inline-flex;
    margin: 0;
}
</style>
@endpush

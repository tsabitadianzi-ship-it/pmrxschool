@extends('layouts.app-no-sidebar')

@section('title', 'Input Presensi')

@section('content')
<div class="main-area">
    <div class="card-detail">
        <h2>Input Presensi</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('sekertaris.absensi.storeMass') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Kegiatan</label>
                <input type="text" name="kegiatan" class="form-control" placeholder="Contoh: Kegiatan Minggu 1" required>
            </div>

            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->nama_lengkap }}</td>
                        <td>
                            <select name="status[{{ $user->id }}]" class="form-select">
                                <option value="Hadir">Hadir</option>
                                <option value="Izin">Izin</option>
                                <option value="Tidak Hadir">Tidak Hadir</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-submit me-2">
                    <i class="ti ti-check me-1"></i> Simpan
                </button>
                <a href="{{ route('sekertaris.absensi') }}" class="btn btn-cancel">
                    <i class="ti ti-arrow-left me-1"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
/* 🔥 Styling sama seperti desain kamu */
body {
    background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
    background-size: cover;
    font-family: "Public Sans", sans-serif;
    margin: 0;
    min-height: 100vh;
    overflow-x: hidden;
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
    max-width: 850px;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    padding: 2.5rem;
    animation: fadeIn .6s ease;
    border: 1px solid #cde3df;
}
h2 { color:#164b5c; font-weight:700; text-align:center; margin-bottom:1.5rem; }
.form-control { border-radius:10px; }
.btn-submit {
    background:#219EBC; color:white;
    border-radius:10px; padding:10px 18px;
}
.btn-submit:hover { background:#468d9fff; transform:translateY(-1px); }
.btn-cancel {
    background:#6b7770ff; color:white;
    border-radius:10px; padding:10px 18px;
}
.btn-cancel:hover { background:#58615bff; transform:translateY(-1px); }
</style>
@endpush

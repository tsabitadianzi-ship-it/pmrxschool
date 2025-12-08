@extends('layouts.app-no-sidebar')

@section('title', 'Input Presensi')

@section('content')
<style>
body {
    background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
    background-size: cover;
}
.main-area {
    display: flex;
    justify-content: center;
}
.card-detail {
    width: 100%;
    max-width: 850px;
    background: rgba(255,255,255,0.95);
    border-radius: 20px;
    padding: 2.5rem;
}
h2 { color:#164b5c; font-weight:700; text-align:center; margin-bottom:1.5rem; }
.form-control { border-radius:10px; }
.btn-submit {
    background:#219EBC; color:white;
    border-radius:10px; padding:10px 18px;
}
.btn-submit:hover { background:#468d9fff; }
.btn-cancel {
    background:#6b7770ff; color:white;
    border-radius:10px; padding:10px 18px;
}
.btn-cancel:hover { background:#58615bff; }
</style>
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
@endpush

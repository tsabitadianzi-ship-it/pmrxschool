@extends('layouts.app-no-sidebar')

@section('title', 'Edit Jurnal')

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
    max-width: 900px;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    padding: 2.5rem;
}
h2 { color:#164b5c; font-weight:700; text-align:center; }
label { font-weight:600; color:#176b86; }
.form-control {
    border-radius:10px;
    border:1px solid #bcd4da;
    padding:10px 12px;
}
.form-control:focus {
    border-color:#219EBC;
}
.btn-submit {
    background:#219EBC; color:white; border:none;
    border-radius:10px; padding:10px 18px; font-weight:500;
}
.btn-submit:hover { background:#468d9fff; }
.btn-cancel {
    background:#6b7770ff; color:white;
    padding:10px 18px; border-radius:10px;
}
.btn-cancel:hover { background:#58615bff; }
</style>
<div class="main-area">
    <div class="card-detail">
        <h2>Edit Jurnal</h2>

        <form action="{{ route('sekertaris.jurnal.update', $jurnal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Waktu Mulai</label>
                    <input type="time" class="form-control" name="waktu_mulai"
                        value="{{ old('waktu_mulai', $jurnal->waktu_mulai ? \Carbon\Carbon::parse($jurnal->waktu_mulai)->format('H:i') : '') }}" required>
                    @error('waktu_mulai')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Waktu Selesai</label>
                    <input type="time" class="form-control" name="waktu_selesai"
                        value="{{ old('waktu_selesai', $jurnal->waktu_selesai ? \Carbon\Carbon::parse($jurnal->waktu_selesai)->format('H:i') : '') }}" required>
                    @error('waktu_selesai')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tanggal"
                        value="{{ old('tanggal', $jurnal->tanggal) }}" required>
                    @error('tanggal')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Kegiatan</label>
                    <textarea class="form-control" name="kegiatan" rows="4" required>{{ old('kegiatan', $jurnal->kegiatan) }}</textarea>
                    @error('kegiatan')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-submit btn-sm me-2">
                    <i class="ti ti-check me-1"></i> Update
                </button>
                <a href="{{ route('sekertaris.jurnal.index') }}" class="btn btn-sm btn-cancel">
                    <i class="ti ti-arrow-left me-1"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection


@push('styles')
@endpush

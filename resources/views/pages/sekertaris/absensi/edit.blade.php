@extends('layouts.app-no-sidebar')

@section('title', 'Edit Status Absensi')

@section('content')
<div class="main-area">
    <div class="card-detail">

        <h2>Edit Status - {{ $absensi->user->nama_lengkap ?? '-' }}</h2>

        <form action="{{ route('sekertaris.updatestatus', $absensi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="Hadir" {{ $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                    <option value="Izin" {{ $absensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                    <option value="Tidak Hadir" {{ $absensi->status == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                </select>
                @error('status')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-submit btn-sm me-2">
                    <i class="ti ti-check me-1"></i> Simpan
                </button>
                <a href="{{ route('sekertaris.absensi') }}" class="btn btn-cancel btn-sm">
                    <i class="ti ti-arrow-left me-1"></i> Batal
                </a>
            </div>
        </form>

    </div>
</div>
@endsection

@push('styles')
<style>
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
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    padding: 2.5rem;
    animation: fadeIn 0.6s ease;
    border: 1px solid #cde3df;
}
h2 { color: #164b5c; font-weight: 700; text-align: center; margin-bottom: 1.5rem; }
label { font-weight: 600; color: #176b86; }
.form-select {
    border-radius: 10px;
    border: 1px solid #bcd4da;
    padding: 10px 12px;
}
.form-select:focus {
    border-color: #219EBC;
    box-shadow: 0 0 6px rgba(33,158,188,.3);
}
.btn-submit {
    background-color: #219EBC; color: white; border: none;
    border-radius: 10px; padding: 10px 18px; font-weight: 500;
}
.btn-submit:hover { background:#468d9fff; transform: translateY(-1px); }
.btn-cancel {
    background-color: #6b7770ff; color: white;
    border-radius:10px; padding:10px 18px;
}
.btn-cancel:hover { background:#58615bff; transform: translateY(-1px); }
</style>
@endpush

@push('scripts')
@if(Session::has('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ Session::get("success") }}',
        showConfirmButton: false,
        timer: 3000
    });
</script>
@endif
@endpush

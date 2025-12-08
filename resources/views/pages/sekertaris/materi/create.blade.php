@extends('layouts.app-no-sidebar')

@section('title', 'Tambah Materi')

@section('content')
<div class="main-area">
    <div class="card-detail">
        <h2>Tambah Materi</h2>

        <form action="{{ route('sekertaris.materi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    @error('tanggal')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                    @error('judul')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="isi">Isi</label>
                <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
                @error('isi')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="file">File (opsional)</label>
                <input type="file" class="form-control" id="file" name="file">
                @error('file')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-submit me-2">
                    <i class="ti ti-check me-1"></i> Tambah
                </button>
                <a href="{{ route('sekertaris.materi.index') }}" class="btn btn-cancel">
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
    max-width: 900px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 2.5rem;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    border: 1px solid #cde3df;
    animation: fadeIn 0.6s ease;
}

@keyframes fadeIn { from { opacity:0; transform:translateY(10px);} to {opacity:1; transform:translateY(0);} }

h2 {
    color: #164b5c;
    font-weight: 700;
    text-align: center;
    margin-bottom: 1.5rem;
}

label {
    font-weight: 600;
    color: #176b86;
}

.form-control {
    border-radius: 10px;
    border: 1px solid #bcd4da;
    padding: 10px 12px;
    transition: 0.2s ease;
}

.form-control:focus {
    border-color: #219EBC;
    box-shadow: 0 0 6px rgba(33,158,188,0.3);
}

.btn-submit {
    background-color: #219EBC;
    color: #fff;
    padding: 10px 18px;
    border-radius: 10px;
    font-weight: 500;
}
.btn-submit:hover { background-color: #468d9f; transform: translateY(-1px); }

.btn-cancel {
    background-color: #6b7770;
    color: #fff;
    padding: 10px 18px;
    border-radius: 10px;
    font-weight: 500;
}
.btn-cancel:hover { background-color: #58615b; transform: translateY(-1px); }

.alert { border-radius:10px; padding:8px 12px; margin-top:5px;}
</style>
@endpush

@push('scripts')
@if(Session::has('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ Session::get('success') }}',
    showConfirmButton: false,
    timer: 3000
});
</script>
@endif
@endpush

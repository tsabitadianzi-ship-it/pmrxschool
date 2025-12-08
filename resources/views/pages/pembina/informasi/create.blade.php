@extends('layouts.app-no-sidebar')

@section('title', 'Tambah Informasi')

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
    background: rgba(255,255,255,0.95);
    padding: 2.5rem;
    border: 1px solid #cde3df;
}

h2 { 
    color: #164b5c; 
    font-weight: 700; 
    text-align: center; 
}
label { 
    color: #176b86; 
}

.form-control, textarea {
    border-radius: 10px;
    padding: 10px 12px;
}
.form-control:focus, textarea:focus {
    border-color: #219EBC;
}

.btn-submit {
    background-color: #219EBC;
    color: white;
    border-radius: 10px;
    padding: 10px 18px;
}
.btn-submit:hover {
    background-color: #468d9fff;
}

.btn-cancel {
    background-color: #6b7770ff;
    color: white;
    border-radius: 10px;
    padding: 10px 18px;
}
.btn-cancel:hover {
    background-color: #58615bff;
}

.alert { 
    border-radius: 10px; 
    margin-top: 5px; 
    padding: 8px 12px; }
</style>
<div class="main-area">
    <div class="card-detail">
        <h2>Tambah Informasi</h2>

        <form action="{{ route('pembina.informasi.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                    @error('tanggal')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="kegiatan">Kegiatan Terdekat</label>
                    <textarea rows="3" class="form-control" id="kegiatan" name="kegiatan" required></textarea>
                    @error('kegiatan')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-submit me-2"><i class="ti ti-check me-1"></i> Tambah</button>
                <a href="{{ route('pembina.dashboard') }}" class="btn btn-cancel"><i class="ti ti-arrow-left me-1"></i> Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
@endpush

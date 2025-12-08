@extends('layouts.app-no-sidebar')

@section('title', 'Edit Informasi')

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
    color: #176b86; }

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
        <h2>Edit Informasi</h2>

        <form action="{{ route('pembina.informasi.update', $informasi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $informasi->tanggal) }}">
                    @error('tanggal')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kegiatan">Kegiatan Terdekat</label>
                    <textarea class="form-control" id="kegiatan" name="kegiatan" rows="4" required>{{ old('kegiatan', $informasi->kegiatan) }}</textarea>
                    @error('kegiatan')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-submit me-2"><i class="ti ti-check me-1"></i> Update</button>
                <a href="{{ route('pembina.dashboard') }}" class="btn btn-cancel"><i class="ti ti-arrow-left me-1"></i> Batal</a>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success text-center mt-3">{{ session('success') }}</div>
        @endif
    </div>
</div>
@endsection

@push('styles')
@endpush


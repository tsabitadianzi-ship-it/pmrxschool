@extends('layouts.app-no-sidebar')

@section('title', 'Edit Pembina')

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
    padding: 8px 12px;
}
</style>
<div class="main-area">
    <div class="card-detail">
        <h2>Edit Pembina</h2>

        <form action="{{ route('pembina.pembina.update', $pembina->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nama_lengkap">Nama</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                           value="{{ old('nama_lengkap', $pembina->nama_lengkap) }}" required>
                    @error('nama_lengkap')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nis_k">NIP</label>
                    <input type="text" class="form-control" id="nis_k" name="nis_k"
                           value="{{ old('nis_k', $pembina->nis_k) }}" required>
                    @error('nis_k')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                           value="{{ old('tanggal_lahir', $pembina->tanggal_lahir) }}" required>
                    @error('tanggal_lahir')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="no_telp">No Telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                           value="{{ old('no_telp', $pembina->no_telp) }}" required>
                    @error('no_telp')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin', $pembina->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $pembina->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea rows="3" class="form-control" id="alamat" name="alamat" required>{{ old('alamat', $pembina->alamat) }}</textarea>
                    @error('alamat')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-submit me-2"><i class="ti ti-check me-1"></i> Update</button>
                <a href="{{ route('pembina.anggota') }}" class="btn btn-cancel"><i class="ti ti-arrow-left me-1"></i> Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
@endpush

@extends('layouts.app-no-sidebar')

@section('title', 'Edit Pelaksanaan')

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
    border-radius: 20px;
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
        <h2>Edit Pelaksanaan</h2>

        <form action="{{ route('pembina.pelaksanaan_update', $pelaksanaan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="hari">Hari</label>
                    <select class="form-control" id="hari" name="hari" required>
                        <option value="Senin" {{ $pelaksanaan->hari=='Senin'?'selected':'' }}>Senin</option>
                        <option value="Selasa" {{ $pelaksanaan->hari=='Selasa'?'selected':'' }}>Selasa</option>
                        <option value="Rabu" {{ $pelaksanaan->hari=='Rabu'?'selected':'' }}>Rabu</option>
                        <option value="Kamis" {{ $pelaksanaan->hari=='Kamis'?'selected':'' }}>Kamis</option>
                        <option value="Jumat" {{ $pelaksanaan->hari=='Jumat'?'selected':'' }}>Jumat</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jam">Jam</label>
                    <input type="time" class="form-control" id="jam" name="jam" value="{{ substr($pelaksanaan->jam, 0, 5) }}" required>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-submit me-2"><i class="ti ti-check me-1"></i> Update</button>
                <a href="{{ route('pembina.dashboard') }}" class="btn btn-cancel"><i class="ti ti-arrow-left me-1"></i> Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')

@endpush

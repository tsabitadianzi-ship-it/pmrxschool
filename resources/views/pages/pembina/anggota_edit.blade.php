@extends('layouts.app-no-sidebar')

@section('title', 'Update Jabatan Anggota')

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
    background: rgba(255,255,255,0.95);
    border-radius: 20px;
    padding: 2.5rem;
    border: 1px solid #cde3df;
}
h2 {
    color: #164b5c;
}

.form-control {
    border-radius: 8px;
    padding: 8px 10px;
}

.form-control:focus {
    border-color: #219EBC;
    box-shadow: 0 0 6px rgba(33, 158, 188, 0.3);
}

.btn-submit, .btn-cancel {
    border-radius: 10px;
    padding: 6px 12px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: white;

}

.btn-submit { background-color: #219EBC; }
.btn-cancel { background-color: #6b7770; }

.btn-submit:hover, .btn-cancel:hover {
    opacity: 0.9;
}

.alert { border-radius: 10px; padding: 8px 12px; text-align: center; }
</style>
<div class="main-area">
    <div class="card-detail">
        <h2 class="text-center mb-4">Update Jabatan Anggota</h2>

        <form action="{{ route('pembina.anggota_update', $anggota->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="role">Pilih Jabatan</label>
                <select name="role" id="role" class="form-control">
                    <option value="siswa" {{ $anggota->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                    <option value="sekertaris" {{ $anggota->role == 'sekertaris' ? 'selected' : '' }}>Sekretaris</option>
                    <option value="bendahara" {{ $anggota->role == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
                </select>
            </div>

            <div class="d-flex gap-2 justify-content-center mt-3 flex-wrap">
                <button type="submit" class="btn btn-submit">
                    <i class="ti ti-check me-1"></i> Update
                </button>
                <a href="{{ route('pembina.anggota') }}" class="btn btn-cancel">
                    <i class="ti ti-arrow-left me-1"></i> Batal
                </a>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success text-center mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
@endsection

@push('styles')

@endpush

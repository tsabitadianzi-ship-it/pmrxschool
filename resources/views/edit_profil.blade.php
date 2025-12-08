@extends('layouts.app-no-sidebar')

@section('title', 'Edit Password')

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
    max-width: 700px;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    padding: 2.5rem;
}
h2 { color: #164b5c; font-weight: 700; text-align: center; }
label { font-weight: 600; color: #176b86; }
.form-control { border-radius: 10px; border: 1px solid #bcd4da; padding: 10px 12px; }
.form-control:focus { border-color: #219EBC; box-shadow: 0 0 6px rgba(33,158,188,.3); }
.btn-submit { background-color: #219EBC; color: white; border: none; border-radius: 10px; padding: 10px 18px; font-weight: 500; }
.btn-submit:hover { background:#468d9fff; transform: }
.btn-cancel { background-color: #6b7770ff; color:white; border-radius:10px; padding:10px 18px; }
.btn-cancel:hover { background:#58615bff; transform: }
</style>
<div class="main-area">
    <div class="card-detail">
        <h2>Ubah Password</h2>

        {{-- ✅ Alert Sukses --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- ⚠️ Error --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('update_profil') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="current_password">Password Lama</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="new_password">Password Baru</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-submit btn-sm me-2">
                    <i class="ti ti-check me-1"></i> Simpan
                </button>
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-cancel">
                    <i class="ti ti-arrow-left me-1"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
@endpush

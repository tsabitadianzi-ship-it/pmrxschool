@extends('layouts.app-no-sidebar')

@section('title', 'Edit Password')

@section('content')
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
    max-width: 700px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    padding: 2.5rem;
    animation: fadeIn 0.6s ease;
}
h2 { color: #164b5c; font-weight: 700; text-align: center; margin-bottom: 1.5rem; }
label { font-weight: 600; color: #176b86; }
.form-control { border-radius: 10px; border: 1px solid #bcd4da; padding: 10px 12px; transition: .2s; }
.form-control:focus { border-color: #219EBC; box-shadow: 0 0 6px rgba(33,158,188,.3); }
.btn-submit { background-color: #219EBC; color: white; border: none; border-radius: 10px; padding: 10px 18px; font-weight: 500; }
.btn-submit:hover { background:#468d9fff; transform: translateY(-1px); }
.btn-cancel { background-color: #6b7770ff; color:white; border-radius:10px; padding:10px 18px; }
.btn-cancel:hover { background:#58615bff; transform: translateY(-1px); }
</style>
@endpush

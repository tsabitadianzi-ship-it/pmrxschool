@extends('layouts.app-no-sidebar')

@section('title', 'Tambah Tentang PMR')

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

  label { font-weight: 600; color: #176b86; }

  .form-control, textarea {
    border-radius: 10px;
    border: 1px solid #bcd4da;
    padding: 10px 12px;
  }

  .form-control:focus, textarea:focus {
    border-color: #219EBC;
    box-shadow: 0 0 6px rgba(33,158,188,0.3);
  }

  .btn-submit {
    background-color: #219EBC;
    color: white;
    border-radius: 10px;
    padding: 10px 18px;
    font-weight: 500;
  }

  .btn-submit:hover {
    background-color: #468d9fff;
  }

  .btn-cancel {
    background-color: #6b7770ff;
    color: white;
    border-radius: 10px;
    padding: 10px 18px;
    font-weight: 500;
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
    <h2>Tambah Tentang PMR</h2>

    <form action="{{ route('pembina.crudtentangpmr.tentangpmr_store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" class="form-control" required>
        @error('judul')<div class="alert alert-danger">{{ $message }}</div>@enderror
      </div>

      <div class="mb-3">
        <label for="isi">Isi</label>
        <textarea name="isi" id="isi" class="form-control" rows="5" required></textarea>
        @error('isi')<div class="alert alert-danger">{{ $message }}</div>@enderror
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-submit me-2"><i class="ti ti-check me-1"></i> Simpan</button>
        <a href="{{ route('pembina.landingpage_edit') }}" class="btn btn-cancel"><i class="ti ti-arrow-left me-1"></i> Kembali</a>
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

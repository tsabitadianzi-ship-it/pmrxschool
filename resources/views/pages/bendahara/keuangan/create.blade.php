@extends('layouts.app-no-sidebar')

@section('title', 'Tambah Data Keuangan')

@push('styles')
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
      border-radius: 20px;
      padding: 2.5rem;
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
@endpush

@section('content')
<div class="main-area">
  <div class="card-detail">
    <h2 class="text-center mb-4">Tambah Data Keuangan</h2>

    <form action="{{ route('bendahara.keuangan.store') }}" method="POST">
      @csrf

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="tanggal">Tanggal</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal" required>
          @error('tanggal')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6 mb-3">
          <label for="tipe">Tipe</label>
          <select class="form-control" id="tipe" name="tipe" required>
            <option value="Pemasukan">Pemasukan</option>
            <option value="Pengeluaran">Pengeluaran</option>
          </select>
          @error('tipe')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="jumlah">Jumlah (Rp)</label>
          <input type="number" class="form-control" id="jumlah" name="jumlah" required>
          @error('jumlah')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6 mb-3">
          <label for="keterangan">Keterangan</label>
          <input type="text" class="form-control" id="keterangan" name="keterangan" maxlength="20" required>
          @error('keterangan')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-submit btn-sm me-2">
          <i class="ti ti-check me-1"></i> Tambah
        </button>
        <a href="{{ route('bendahara.keuangan.index') }}" class="btn btn-sm btn-cancel">
          <i class="ti ti-arrow-left me-1"></i> Batal
        </a>
      </div>
    </form>
  </div>
</div>
@endsection

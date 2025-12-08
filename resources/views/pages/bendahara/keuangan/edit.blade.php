@extends('layouts.app-no-sidebar')

@section('title', 'Edit Data Keuangan')

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
      max-width: 700px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 20px;
      padding: 2.5rem;
  }

  h2 {
      color: #164b5c;
      font-weight: 700;
      text-align: center;
  }

  label {
      font-weight: 600;
      color: #176b86;
  }

  .form-control {
      border-radius: 10px;
      border: 1px solid #bcd4da;
      padding: 10px 12px;
  }

  .form-control:focus {
      border-color: #219EBC;
  }

  .btn-submit {
      background-color: #219EBC;
      color: white;
      border: none;
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
    <h2>Edit Data Keuangan</h2>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('bendahara.keuangan.update', $keuangan->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="tanggal">Tanggal</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal"
                 value="{{ old('tanggal', $keuangan->tanggal) }}" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="tipe">Tipe</label>
          <select class="form-control" id="tipe" name="tipe" required>
            <option value="Pemasukan" {{ old('tipe', $keuangan->tipe) == 'Pemasukan' ? 'selected' : '' }}>Pemasukan</option>
            <option value="Pengeluaran" {{ old('tipe', $keuangan->tipe) == 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="jumlah">Jumlah (Rp)</label>
          <input type="number" class="form-control" id="jumlah" name="jumlah"
                 value="{{ old('jumlah', $keuangan->jumlah) }}" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="keterangan">Keterangan</label>
          <input type="text" class="form-control" id="keterangan" name="keterangan" maxlength="20"
                 value="{{ old('keterangan', $keuangan->keterangan) }}" required>
        </div>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-submit btn-sm me-2">
          <i class="ti ti-check me-1"></i> Edit
        </button>
        <a href="{{ route('bendahara.keuangan.index') }}" class="btn btn-cancel btn-sm">
          <i class="ti ti-arrow-left me-1"></i> Batal
        </a>
      </div>
    </form>
  </div>
</div>

@if (Session::has('success'))
  @push('scripts')
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
  @endpush
@endif
@endsection

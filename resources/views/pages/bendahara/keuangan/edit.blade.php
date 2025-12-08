@extends('layouts.app-no-sidebar')

@section('title', 'Edit Data Keuangan')

@push('styles')
<style>
  body {
      background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
      background-size: cover;
      font-family: "Public Sans", sans-serif;
  }

  .main-area {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: calc(100vh - 80px); /* tinggi navbar */
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

  @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
  }

  h2 {
      color: #164b5c;
      font-weight: 700;
      text-align: center;
      margin-bottom: 1.5rem;
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
      box-shadow: 0 0 6px rgba(33, 158, 188, 0.3);
  }

  .btn-submit {
      background-color: #219EBC;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 10px 18px;
      font-weight: 500;
      transition: 0.2s;
  }

  .btn-submit:hover {
      background-color: #468d9fff;
      transform: translateY(-1px);
  }

  .btn-cancel {
      background-color: #6b7770ff;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 10px 18px;
      font-weight: 500;
      transition: 0.2s;
  }

  .btn-cancel:hover {
      background-color: #58615bff;
      transform: translateY(-1px);
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

{{-- Optional: SweetAlert success --}}
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

@extends('layouts.app-no-sidebar')

@section('title', 'Edit Status Absensi')

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
      max-width: 850px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 18px;
      padding: 2.5rem;

  }

  h2 {
      color: #164b5c;
      font-weight: 700;
      text-align: center;
  }

  label { 
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
    <h2>Edit Status - {{ $absensi->user->nama_lengkap ?? '-' }}</h2>

      <form action="{{ route('pembina.absensi.update', $absensi->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-select" required>
          <option value="Hadir" {{ $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
          <option value="Izin" {{ $absensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>
          <option value="Tidak Hadir" {{ $absensi->status == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
        </select>
        @error('status')
          <div class="alert alert-danger mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-submit btn-sm me-2">
          <i class="ti ti-check me-1"></i> Simpan
        </button>
          <a href="{{ route('pembina.absensi') }}" class="btn btn-cancel">
          <i class="ti ti-arrow-left me-1"></i> Batal
        </a>
      </div>
    </form>
  </div>
</div>

@if (Session::has('success'))
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ Session::get('success') }}',
    showConfirmButton: false,
    timer: 3000
  });
</script>
@endif
@endsection


@push('styles')

@endpush

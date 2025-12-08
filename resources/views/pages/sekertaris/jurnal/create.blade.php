@extends('layouts.app-no-sidebar')

@section('title', 'Tambah Jurnal')

@section('content')
<div class="main-area">
  <div class="card-detail">
    <h2>Tambah Jurnal</h2>

    <form action="{{ route('sekertaris.jurnal.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="waktu_mulai">Waktu Mulai</label>
          <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
          @error('waktu_mulai')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6 mb-3">
          <label for="waktu_selesai">Waktu Selesai</label>
          <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" required>
          @error('waktu_selesai')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="tanggal">Tanggal</label>
          <input type="date" class="form-control" id="tanggal" name="tanggal" required>
          @error('tanggal')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-md-6 mb-3">
          <label for="kegiatan">Kegiatan</label>
          <textarea class="form-control" id="kegiatan" name="kegiatan" rows="3" required></textarea>
          @error('kegiatan')
            <div class="alert alert-danger mt-1">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-submit btn-sm me-2">
          <i class="ti ti-check me-1"></i> Tambah
        </button>
        <a href="{{ route('sekertaris.jurnal.index') }}" class="btn btn-sm btn-cancel">
          <i class="ti ti-arrow-left me-1"></i> Batal
        </a>
      </div>
    </form>
  </div>
</div>
@endsection

@push('styles')
<style>
/* 🔥 Styling mengikuti halaman Edit Materi */
body {
  background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
  background-size: cover;
  font-family: "Public Sans", sans-serif;
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
  max-width: 900px;
  background: rgba(255, 255, 255, 0.96);
  backdrop-filter: blur(10px);
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.15);
  padding: 2.5rem;
  border: 1px solid #cde3df;
  animation: fadeIn .6s ease;
}

h2 {
  text-align: center;
  color: #164b5c;
  font-weight: bold;
  margin-bottom: 1.5rem;
}

label {
  font-weight: 600;
  color: #176b86;
}

.form-control {
  border-radius: 10px;
  border: 1px solid #bcd4da;
  transition: .2s ease;
}

.form-control:focus {
  border-color: #219EBC;
  box-shadow: 0 0 6px rgba(33,158,188,.3);
}

.btn-submit {
  background-color: #219EBC;
  color: #fff;
  border-radius: 10px;
  padding: 10px 18px;
  font-weight: 500;
}

.btn-submit:hover {
  background: #468d9fff;
  transform: translateY(-1px);
}

.btn-cancel {
  background-color: #6b7770;
  color: #fff;
  border-radius: 10px;
  padding: 10px 18px;
}

.btn-cancel:hover {
  background-color: #58615b;
  transform: translateY(-1px);
}
</style>
@endpush

@push('scripts')
@if (Session::has('success'))
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
@endif
@endpush

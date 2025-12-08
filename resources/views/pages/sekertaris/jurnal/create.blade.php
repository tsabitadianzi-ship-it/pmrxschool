@extends('layouts.app-no-sidebar')

@section('title', 'Tambah Jurnal')

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
  background: rgba(255, 255, 255, 0.96);
  border-radius: 20px;
  padding: 2.5rem;
}

h2 {
  text-align: center;
  color: #164b5c;
  font-weight: bold;
}

label {
  font-weight: 600;
  color: #176b86;
}

.form-control {
  border-radius: 10px;
  border: 1px solid #bcd4da;
}

.form-control:focus {
  border-color: #219EBC;
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
}

.btn-cancel {
  background-color: #6b7770;
  color: #fff;
  border-radius: 10px;
  padding: 10px 18px;
}

.btn-cancel:hover {
  background-color: #58615b;
}
</style>
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

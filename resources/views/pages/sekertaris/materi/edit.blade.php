@extends('layouts.app-no-sidebar')

@section('title', 'Edit Materi')

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
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    padding: 2.5rem;
}
h2 { color: #164b5c; font-weight: 700; text-align: center; margin-bottom: 1.5rem; }
label { font-weight: 600; color: #176b86; }
.form-control { border-radius: 10px; border: 1px solid #bcd4da; padding: 10px 12px;  }
.form-control:focus { border-color: #219EBC; box-shadow: 0 0 6px rgba(33,158,188,.3); }
.btn-submit {
    background-color: #219EBC; color: white; border: none;
    border-radius: 10px; padding: 10px 18px; font-weight: 500;
}
.btn-submit:hover { background:#468d9fff; 
}
.btn-cancel {
    background-color: #6b7770ff; color:white;
    border-radius:10px; padding:10px 18px;
}
.btn-cancel:hover { background:#58615bff; 
}
</style>
<div class="main-area">
    <div class="card-detail">
        <h2>Edit Materi</h2>

        <form action="{{ route('sekertaris.materi.update', $materi->id) }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal"
                           value="{{ old('tanggal', $materi->tanggal) }}" required>
                    @error('tanggal')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul"
                           value="{{ old('judul', $materi->judul) }}" required>
                    @error('judul')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="isi">Isi</label>
                <textarea class="form-control" name="isi" rows="4" required>{{ old('isi', $materi->isi) }}</textarea>
                @error('isi')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>File Materi</label>
                @if($materi->file)
                    <p class="text-muted mb-1">File saat ini:
                        <a href="{{ asset('uploads/materi/' . $materi->file) }}" target="_blank">
                            {{ $materi->file }}
                        </a>
                    </p>
                @endif
                <input type="file" class="form-control" name="file">
                @error('file')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-submit btn-sm me-2">
                    <i class="ti ti-check me-1"></i> Update
                </button>
                <a href="{{ route('sekertaris.materi.index') }}" class="btn btn-sm btn-cancel">
                    <i class="ti ti-arrow-left me-1"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
@endpush

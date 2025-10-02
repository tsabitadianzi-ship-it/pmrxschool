@extends('layouts.app')
@section('title', 'Edit Materi')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2> Edit Materi </h2>
            <div class="card card-body">
                <form action="{{ route('sekertaris.materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col mb-6">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" 
                                value="{{ old('tanggal', $materi->tanggal) }}" required>
                            @error('tanggal')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col mb-6">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" 
                                value="{{ old('judul', $materi->judul) }}" required>
                            @error('judul')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="isi">Isi</label>
                        <textarea class="form-control" id="isi" name="isi" rows="4" required>{{ old('isi', $materi->isi) }}</textarea>
                        @error('isi')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="file">File</label>
                        @if($materi->file)
                            <p class="text-muted">File saat ini: 
                                <a href="{{ asset('uploads/materi/' . $materi->file) }}" target="_blank">
                                    {{ $materi->file }}
                                </a>
                            </p>
                        @endif
                        <input type="file" class="form-control" id="file" name="file">
                        @error('file')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm" style="background-color: #4b9669ff; color: white;">
                            <span class="ti ti-check me-1"></span> Update</button>
                        <a href="{{ route('sekertaris.materi.index') }}" class="btn btn-sm" style="background-color: #6b7770ff; color:white;">
                            <span class="ti ti-arrow-left me-1"></span> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@if (Session::has('success'))
    <script type="text/javascript">
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ Session::get('success') }}',
        showConfirmButten: false,
        timer: 3000
    });
    </script>
@endif

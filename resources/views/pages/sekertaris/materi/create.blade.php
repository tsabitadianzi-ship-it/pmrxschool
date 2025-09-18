@extends('layouts.app')
@section('title', 'Dashboard Siswa')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2> Tambah Materi </h2>
            <div class="card card-body">
            <form action="{{ route('sekertaris.materi.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                  <div class="form-group mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    @error('tanggal')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                    @error('judul')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="isi">Isi</label>
                    <textarea class="form-control" id="isi" name="isi" rows="4" required></textarea>
                    @error('isi')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="file">File</label>
                    <input type="file" class="form-control" id="file" name="file">
                    @error('file')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                     @enderror
                </div>
                <div class="form-group mb-3">
                <button type="submit" class="btn btn-sm btn-success">
                    <span class="ti ti-check me-1"></span> Tambah</button>
                 <a href="{{ route('sekertaris.materi.index') }}" class="btn btn-sm btn-secondary">
                    <span class="ti ti-arrow-left me-1"></span> Batal
                </a>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

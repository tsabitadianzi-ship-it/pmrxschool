@extends('layouts.app')
@section('title', 'Dashboard Siswa')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('sekertaris.materi.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                      <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        @error('tanggal')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                        @error('judul')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <input type="text" class="form-control" id="isi" name="isi" required>
                        @error('isi')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                   <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control" id="file" name="file">
                    @error('file')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                   </div>

                   <div class="form-group">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                     <a href="{{ route('sekertaris.materi.index') }}" class="btn btn-secondary">
                                Batal
                    </a>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

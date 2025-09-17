@extends('layouts.app')
@section('title', 'Dashboard Siswa')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('sekertaris.jurnal.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
        
                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        @error('tanggal')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="kegiatan">Kegiatan</label>
                        <input type="text" class="form-control" id="kegiatan" name="kegiatan" required>
                        @error('kegiatan')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="waktu_mulai">Waktu Mulai</label>
                        <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                        @error('waktu_mulai')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="waktu_selesai">Waktu Selesai</label>
                        <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" required>
                        @error('waktu_selesai')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                   <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                     <a href="{{ route('sekertaris.jurnal.index') }}" class="btn btn-secondary">
                                Batal
                    </a>
                   </div>
                </div>
            </div>
        </div>
    </div>

@endsection

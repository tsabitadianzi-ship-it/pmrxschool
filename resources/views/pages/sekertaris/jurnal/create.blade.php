@extends('layouts.app')
@section('title', 'Dashboard Siswa')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2> Tambah Jurnal </h2>
            <div class="card card-body">
            <form action="{{ route('sekertaris.jurnal.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf   
                 <div class="row"> 
                    <div class="col mb-6">
                        <label for="waktu_mulai">Waktu Mulai :</label>
                        <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                        @error('waktu_mulai')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-6">
                        <label for="waktu_selesai">Waktu Selesai :</label>
                        <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" required>
                        @error('waktu_selesai')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-6">
                        <label for="tanggal">Tanggal :</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        @error('tanggal')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-6">
                        <label for="kegiatan">Kegiatan :</label>
                        <textarea class="form-control" id="kegiatan" name="kegiatan" required></textarea>
                        @error('kegiatan')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               <div class="form-group mb-3">
                <button type="submit" class="btn btn-sm btn-success">
                    <span class="ti ti-check me-1"></span> Tambah</button>
                 <a href="{{ route('sekertaris.jurnal.index') }}" class="btn btn-sm btn-secondary">
                    <span class="ti ti-arrow-left me-1"></span> Batal
                </a>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection

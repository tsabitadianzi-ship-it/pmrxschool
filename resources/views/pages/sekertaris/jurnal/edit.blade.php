@extends('layouts.app')
@section('title', 'Dashboard Siswa')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2 class="fw-bold"> Edit Jurnal</h2>
            <div class="card card-body">
            <form action="{{ route('sekertaris.jurnal.update', $jurnal->id) }}" method="POST" enctype="multipart/form-data">
                 @csrf
                    @method('PUT') 
                <div class="row">
                    <div class="col mb-6">
                        <label for="waktu_mulai">Waktu Mulai : </label>
                        <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" 
                            value="{{ old('waktu_mulai', $jurnal->waktu_mulai) }}" required>
                        @error('waktu_mulai')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mbb-6">
                        <label for="waktu_selesai">Waktu Selesai :</label>
                        <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" 
                            value="{{ old('waktu_selesai', $jurnal->waktu_selesai) }}" required>
                        @error('waktu_selesai')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div> 
                </div>
                <div class="row">  
                    <div class="col mb-6">
                        <label for="tanggal">Tanggal :</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" 
                            value="{{ old('tanggal', $jurnal->tanggal) }}" required>
                        @error('tanggal')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-6">
                        <label for="kegiatan">Kegiatan :</label>
                        <textarea class="form-control" id="kegiatan" name="kegiatan" required>{{ old('kegiatan', $jurnal->kegiatan) }}</textarea>

                        @error('kegiatan')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               <div class="form-group mb-3">
                <button type="submit" class="btn btn-sm" style="background-color: #4b9669ff; color: white;">
                    <span class="ti ti-check"></span> Edit</button>
                 <a href="{{ route('sekertaris.jurnal.index') }}" class="btn btn-sm" style="background-color: #6b7770ff; color:white;">
                    <span class="ti ti-arrow-left"></span> Batal
                </a>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')
@section('title', 'Edit Informasi')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h2> Edit Informasi </h2>
        <div class="card card-body">
            <form action="{{ route('pembina.informasi.update', $informasi->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- penting untuk update --}}

                <div class="row">
                    <div class="col mb-6">
                        <label for="kegiatan">Kegiatan Terdekat</label>
                        <textarea class="form-control" id="kegiatan" name="kegiatan" rows="4" required>{{ old('kegiatan', $informasi->kegiatan) }}</textarea>
                        @error('kegiatan')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
     

                    <div class="col mb-6">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ old('tanggal', $informasi->tanggal) }}">
                        @error('tanggal')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <button type="submit" class="btn btn-sm" style="background-color: #4b9669ff; color:white;">
                    <span class="ti ti-check me-1"></span> Update
                </button>
                <a href="{{ route('pembina.dashboard') }}" class="btn btn-sm" style="background-color: #6b7770ff; color:white;">
                    <span class="ti ti-arrow-left me-1"></span> Batal
                </a>
            </form>
        </div>
    </div>
</div>
@endsection

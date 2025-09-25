@extends('layouts.app')
@section('title', 'Edit Informasi')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h2> Edit Informasi </h2>
        <div class="card card-body">
            <form action="{{ route('pembina.informasi_update', $informasi->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- penting untuk update --}}

                <div class="form-group mb-3">
                    <label for="kegiatan">Kegiatan Terdekat</label>
                    <input type="text" 
                           class="form-control" 
                           id="kegiatan" 
                           name="kegiatan" 
                           value="{{ old('kegiatan', $informasi->kegiatan) }}" 
                           required> 
                    @error('kegiatan')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>      

                <div class="form-group mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" 
                           class="form-control" 
                           id="tanggal" 
                           name="tanggal"
                           value="{{ old('tanggal', $informasi->tanggal) }}">
                    @error('tanggal')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-sm btn-primary">
                    <span class="ti ti-check me-1"></span> Update
                </button>
                <a href="{{ route('pembina.dashboard') }}" class="btn btn-sm btn-secondary">
                    <span class="ti ti-arrow-left me-1"></span> Batal
                </a>
            </form>
        </div>
    </div>
</div>
@endsection

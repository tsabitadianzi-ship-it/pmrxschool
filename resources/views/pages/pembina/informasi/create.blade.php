@extends('layouts.app')
@section('title', 'Tambah Informasi')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h2> Tambah Informasi </h2>
        <div class="card card-body">
            <form action="{{ route('pembina.informasi.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col mb-6">
                        <label for="tanggal">Tanggal : </label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                        @error('tanggal')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-6">
                        <label for="kegiatan">Kegiatan Terdekat : </label>
                        <textarea class="form-control" id="kegiatan" name="kegiatan" required> </textarea>
                        @error('kegiatan')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>      
                </div>
                <button type="submit" class="btn btn-sm btn-success">
                    <span class="ti ti-check me-1"></span> Tambah</button>
                <a href="{{ route('pembina.dashboard') }}" class="btn btn-sm btn-secondary">
                    <span class="ti ti-arrow-left me-1"></span> Batal
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
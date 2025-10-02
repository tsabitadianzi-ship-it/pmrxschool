@extends('layouts.app')
@section('title', 'Tambah Data Keuangan')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2>Tambah Data</h2>
                <div class="card card-body">
                    <form action="{{ route('bendahara.keuangan.store') }}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col mb-6">
                            <label for="tanggal">Tanggal :</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            @error('tanggal')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col mb-6">
                            <label for="tipe">Tipe :</label>
                            <select class="form-control" id="tipe" name="tipe" required>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                            </select>
                        @error('tipe')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col mb-6">
                            <label for="jumlah">Jumlah (Rp) :</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                            @error('jumlah')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col mb-6">
                            <label for="keterangan">Keterangan :</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" maxlength="20" required>
                            @error('keterangan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group mt-3">
                            <button type="submit" class="btn btn-sm" style="background-color: #4b9669ff; color:white;">
                                <span class="ti ti-check me-1"></span> Tambah</button>
                        <a href="{{ route('bendahara.keuangan.index') }}" class="btn btn-sm" style="background-color: #6b7770ff; color: white;">
                            <span class="ti ti-arrow-left me-1"></span> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

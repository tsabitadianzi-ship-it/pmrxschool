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
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        @error('tanggal')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <select class="form-control" id="tipe" name="tipe" required>
                        <option value="Pemasukan">Pemasukan</option>
                        <option value="Pengeluaran">Pengeluaran</option>
                        </select>
                    @error('tipe')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" maxlength="20" required>
                        @error('keterangan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah (Rp)</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        @error('jumlah')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                            <button type="submit" class="btn btn-sm btn-success">
                                <span class="ti ti-check me-1"></span> Tambah</button>
                        <a href="{{ route('bendahara.keuangan.index') }}" class="btn btn-sm btn-secondary">
                            <span class="ti ti-arrow-left me-1"></span> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

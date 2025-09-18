@extends('layouts.app')
@section('title', 'Tambah Anggota')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2> Tambah Pembina </h2>
            <div class="card card-body">
            <form action="{{ route('pembina.pembina_store') }}" method="POST">

                 @csrf 
                 {{-- Nama & NIS --}}
                 <div class="row mb-2">   
                    <div class="col mb-3">
                        <label for="nama_lengkap">Nama</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                        @error('nama_lengkap')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="nis_k">NIP</label>
                        <input type="text" class="form-control" id="nis_k" name="nis_k" required>
                        @error('nis_k')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- Tanggal Lahir & Nomor Telepon --}}
                <div class="row mb-2">
                    <div class="col mb-3">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        @error('tanggal_lahir')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="no_telp">No Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                        @error('no_telp')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- Alamat , Jenis Kelamin--}}
                <div class="row mb-2">
                    <div class="col mb-2">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="col mb-2">
                            <label for="alamat">Alamat</label>
                            <textarea row="3" class="form-control" id="alamat" name="alamat" required></textarea>
                            @error('alamat')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
               <div class="form-group mb-2">
                <button type="submit" class="btn btn-sm btn-success">
                    <span class="ti ti-check me-1"></span> Tambah</button>
                 <a href="{{ route('pembina.anggota') }}" class="btn btn-sm btn-secondary">
                    <span class="ti ti-arrow-left me-1"></span> Batal
                </a>
               </div>
            </div>
        </div>
    </div>
</div>

@endsection

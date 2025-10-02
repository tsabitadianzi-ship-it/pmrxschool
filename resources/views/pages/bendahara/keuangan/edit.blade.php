@extends('layouts.app')

@section('title', 'Edit Data Keuangan')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h2> Edit Data </h2>
        <div class="col-md-12">
            <div class="card card-body">
                <form action="{{ route('bendahara.keuangan.update', $keuangan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col mb-6">
                            <label for="tanggal">Tanggal : </label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="{{ old('tanggal', $keuangan->tanggal) }}" required>
                            @error('tanggal')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col mb-6">
                            <label for="tipe">Tipe : </label>
                            <select class="form-control" id="tipe" name="tipe" required>
                                <option value="Pemasukan" {{ old('tipe', $keuangan->tipe) == 'Pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                                <option value="Pengeluaran" {{ old('tipe', $keuangan->tipe) == 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                            </select>
                            @error('tipe')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-6">
                            <label for="jumlah">Jumlah (Rp) :</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah"
                                value="{{ old('jumlah', $keuangan->jumlah) }}" required>
                            @error('jumlah')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col mb-6">
                            <label for="keterangan">Keterangan : </label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" maxlength="20"
                                value="{{ old('keterangan', $keuangan->keterangan) }}" required>
                            @error('keterangan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-sm" style="background-color: #4b9669ff; color:white;">
                            <span class="ti ti-check me-1"></span> Edit</button>
                        <a href="{{ route('bendahara.keuangan.index') }}" class="btn btn-sm" style="background-color: #6b7770ff; color:white;">
                            <span class="ti ti-arrow-left me-1"></span> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@if (Session::has('success'))
        <script type="text/javascript">
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ Session::get('success') }}',
            showConfirmButten: false,
            timer: 3000
        });
        </script>
    @endif

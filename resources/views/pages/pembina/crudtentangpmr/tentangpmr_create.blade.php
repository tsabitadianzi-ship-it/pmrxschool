@extends('layouts.app')

@section('title', 'Tambah Tentang PMR')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Tambah Tentang PMR</h3>

    <div class="card p-4">
        <form action="{{ route('pembina.crudtentangpmr.tentangpmr_store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Isi</label>
                <textarea name="isi" class="form-control" rows="5" required></textarea>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('pembina.landingpage_edit') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection

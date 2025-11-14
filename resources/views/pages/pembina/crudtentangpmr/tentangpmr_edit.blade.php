@extends('layouts.app')

@section('title', 'Edit Tentang PMR')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Edit Tentang PMR</h3>

    <div class="card p-4">
        <form action="{{ route('pembina.crudtentangpmr.tentangpmr_update', $tentangpmr->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $tentangpmr->judul }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Isi</label>
                <textarea name="isi" class="form-control" rows="5" required>{{ $tentangpmr->isi }}</textarea>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('pembina.landingpage_edit') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection

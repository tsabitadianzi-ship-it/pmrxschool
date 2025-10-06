@extends('layouts.app')
@section('title', 'Edit Pelaksanaan')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h2 class="fw-bold">Edit Pelaksanaan</h2>
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <form action="{{ route('pembina.pelaksanaan_update', $pelaksanaan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col mb-6">
                            <label for="hari">Hari</label>
                            <select class="form-control" id="hari" name="hari">
                                <option value="Senin" {{ $pelaksanaan->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                                <option value="Selasa" {{ $pelaksanaan->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                <option value="Rabu" {{ $pelaksanaan->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                <option value="Kamis" {{ $pelaksanaan->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                <option value="Jumat" {{ $pelaksanaan->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                            </select>
                        </div>
                        <div class="col mb-6">
                            <label for="jam">Jam</label>
                            <input type="time" class="form-control" id="jam" name="jam" value="{{ $pelaksanaan->jam }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm" style="background-color: #4b9669ff; color: white;">
                        <span class="ti ti-check me-1"></span> Update</button>
                    <a href="{{ route('pembina.dashboard') }}" class="btn btn-sm" style="background-color: #6b7770ff; color:white;">
                        <span class="ti ti-arrow-left me-1"></span> Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('title', 'Dashboard Siswa')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <form action="{{ route('pembina.anggota_update', $anggota->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                    <label for="role">Pilih Jabatan</label>
                    </div>
                    <select name="role" id="role" class="form-control mb-3">
                        <option value="siswa" {{ $anggota->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                        <option value="sekertaris" {{ $anggota->role == 'sekertaris' ? 'selected' : '' }}>Sekretaris</option>
                        <option value="bendahara" {{ $anggota->role == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
                    </select>
                    <button type="submit" class="btn btn-sm" style="background-color: #4b9669ff; color: white;">
                        <span class="ti ti-check me-1"></span> Update</button>
                    <a href="{{ route('pembina.anggota') }}" class="btn btn-sm" style="background-color: #6b7770ff; color: white;">
                    <span class="ti ti-arrow-left"></span> Batal
                </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

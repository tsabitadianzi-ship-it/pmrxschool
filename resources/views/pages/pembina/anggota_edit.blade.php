@extends('layouts.app')
@section('title', 'Dashboard Siswa')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pembina.anggota_update', $anggota->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="role">Pilih Jabatan</label>
                        <select name="role" id="role" class="form-control">
                            <option value="siswa" {{ $anggota->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                            <option value="sekertaris" {{ $anggota->role == 'sekertaris' ? 'selected' : '' }}>Sekretaris</option>
                            <option value="bendahara" {{ $anggota->role == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
                        </select>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

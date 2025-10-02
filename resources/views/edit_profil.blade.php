@extends('layouts.app')
@section('title', 'Edit Profil')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h2> Edit Password</h2>
        <div class="card card-body">
            {{-- Alert sukses --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('update_profil') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col mb-6">
                        <label for="current_password">Password Lama</label>
                        <input type="password" name="current_password" id="current_password" 
                            class="form-control" required>
                    </div>

                    <div class="col mb-6">
                        <label for="new_password">Password Baru</label>
                        <input type="password" name="new_password" id="new_password" 
                            class="form-control" required>
                    </div>
                </div>
                    
                <div class="form-group mb-3">
                    <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation" 
                           id="new_password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-sm" style="background-color: #4b9669ff; color: white;">
                    <span class="ti ti-check me-1"></span> Edit
                </button>
                <a href="{{ url()->previous() }}" class="btn btn-sm" style="background-color: #6b7770ff; color: white;">
                    <span class="ti ti-arrow-left me-1"></span> Batal
                </a>
            </form>
        </div>
    </div>
</div>

@endsection

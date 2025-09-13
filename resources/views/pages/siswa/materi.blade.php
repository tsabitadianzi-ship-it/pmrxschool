@extends('layouts.app')
@section('title', 'Dashboard Siswa')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>HOLLA APAKAH INI MATERI SISWA?</h2>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 hover:underline">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

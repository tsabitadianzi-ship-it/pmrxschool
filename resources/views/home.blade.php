@extends('layouts.app-no-sidebar')

@section('title', 'Session Expired')

@push('styles')
<style>
body {
    background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Poppins', sans-serif;
}

.main-area {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.card-message {
    background: rgba(255,255,255,0.95);
    border-radius: 20px;
    padding: 3rem 2.5rem;
    max-width: 600px;
    text-align: center;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

.card-message h2 {
    color: #164b5c;
    font-weight: 700;
    margin-bottom: 2rem;
}

.btn-logout {
    background-color: #d14f4f;
    color: #fff;
    padding: 10px 20px;
    font-weight: 600;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    transition: 0.2s;
}

.btn-logout:hover {
    background-color: #a83838;
    transform: translateY(-2px);
}

</style>
@endpush

@section('content')
<div class="main-area">
    <div class="card-message">
        <h2>Hai! Silahkan Kembali dan Login Ulang</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">
                Logout
            </button>
        </form>
    </div>
</div>
@endsection

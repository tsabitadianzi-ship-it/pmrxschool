@extends('layouts.app')

@section('title', 'Edit Landing Page')

@section('content')
<div class="container mt-5">
    <h2>Edit Landing Page</h2>

    <!-- Tutorial -->
    <div class="card mb-4 p-3">
        <h4>Tutorial</h4>
        <a href="{{ route('pembina.tutorial_edit', $tutorial->id) }}" class="btn btn-primary btn-sm mb-2">Edit Tutorial</a>
        <ol>
            @foreach([
                $tutorial->tutor_pertama,
                $tutorial->tutor_kedua,
                $tutorial->tutor_ketiga,
                $tutorial->tutor_keempat,
                $tutorial->tutor_kelima
            ] as $step)
                @if($step)
                    <li>{{ $step }}</li>
                @endif
            @endforeach
        </ol>
    </div>

    <!-- Tentang PMR -->
    <div class="card p-3">
        <h4>Tentang PMR</h4>
        <a href="{{ route('pembina.crudtentangpmr.tentangpmr_create') }}" class="btn btn-success btn-sm mb-2">Tambah Baru</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tentangpmr as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->isi }}</td>
                        <td>
                            <a href="{{ route('pembina.crudtentangpmr.tentangpmr_edit', $item->id) }}" 
                            class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('pembina.crudtentangpmr.tentangpmr_delete', $item->id) }}" 
                                method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

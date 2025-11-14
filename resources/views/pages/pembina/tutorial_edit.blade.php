@extends('layouts.app')
@section('title', 'Edit Tutorial')

@section('content')
<div class="container py-4 fade-in">
    <h2 class="fw-bold mb-4">Edit Tutorial</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            @if($tutorial)

            @php
                $tutorFields = [
                    1 => 'tutor_pertama',
                    2 => 'tutor_kedua',
                    3 => 'tutor_ketiga',
                    4 => 'tutor_keempat',
                    5 => 'tutor_kelima',
                    6 => 'tutor_keenam',
                    7 => 'tutor_ketujuh',
                    8 => 'tutor_kedelapan',
                    9 => 'tutor_kesembilan',
                    10 => 'tutor_kesepuluh',
                ];
            @endphp

            <form action="{{ route('pembina.tutorial_update', $tutorial->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" maxlength="20" value="{{ old('judul', $tutorial->judul) }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tutor 1-5 (wajib) -->
                @for ($i = 1; $i <= 5; $i++)
                    @php $field = $tutorFields[$i]; @endphp
                    <div class="mb-3">
                        <label for="{{ $field }}" class="form-label">Tutor {{ $i }}</label>
                        <textarea name="{{ $field }}" id="{{ $field }}" rows="3" class="form-control @error($field) is-invalid @enderror" required>{{ old($field, $tutorial->$field) }}</textarea>
                        @error($field)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endfor

                <!-- Tutor 6-10 (opsional) -->
                @for ($i = 6; $i <= 10; $i++)
                    @php $field = $tutorFields[$i]; @endphp
                    <div class="mb-3">
                        <label for="{{ $field }}" class="form-label">Tutor {{ $i }} (Opsional)</label>
                        <textarea name="{{ $field }}" id="{{ $field }}" rows="3" class="form-control @error($field) is-invalid @enderror">{{ old($field, $tutorial->$field) }}</textarea>
                        @error($field)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endfor

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pembina.dashboard') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-main">
                        <i class="ti ti-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>

            @else
                <p class="text-center text-danger">Tutorial tidak ditemukan.</p>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ session('success') }}",
            confirmButtonColor: '#219EBC'
        });
    @endif
</script>
@endpush
@endsection

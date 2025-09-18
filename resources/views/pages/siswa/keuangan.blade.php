@extends('layouts.app')

@section('title', 'Data Keuangan')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2> Data Keuangan </h2>
        <div class="card card-body">
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Tanggal </th>
                        <th> Tipe </th>
                        <th> Keterangan </th>
                        <th class="text-end"> Jumlah </th>
                        <th class="text-end"> Total </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($keuangan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</td>
                            <td>
                                @if($item->tipe == 'Pemasukan')
                                    <span class="text-success">+ {{ $item->tipe }}</span>
                                @else
                                    <span class="text-danger">- {{ $item->tipe }}</span>
                                @endif
                            </td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="text-end">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                            <td class="text-end">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Belum ada data keuangan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/libs/sweetalert2/sweetalert2.css') }}" />

@endpush

@push('scripts')
    <script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script>
    $(function () {
        $('.dataTable').DataTable();
    });
    </script>
    
@endpush

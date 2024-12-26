@extends('layouts.app')

@section('title', 'Lowongan Pekerjaan')

@section('content')
<div class="container mx-auto my-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Lowongan Pekerjaan</h1>
        <a href="{{ route('pekerjaans.create') }}" class="btn btn-primary">Tambah Lowongan</a>
    </div>

    <!-- Tabel Data Pekerjaan -->
    <div class="bg-white shadow rounded-lg p-4">
        <table class="table-auto w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">Nama Pekerjaan</th>
                    <th class="px-4 py-2">Deskripsi</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pekerjaans as $pekerjaan)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $pekerjaan->nama_pekerjaan }}</td>
                        <td class="px-4 py-2">{{ $pekerjaan->deskripsi }}</td>
                        <td class="px-4 py-2">
                            <!-- Tambahkan tombol untuk aksi seperti edit dan delete -->
                            <a href="#" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination (Jika diperlukan) -->
        @if ($pekerjaans->isEmpty())
            <p class="text-center py-4">No data available.</p>
        @endif
    </div>
</div>
@endsection

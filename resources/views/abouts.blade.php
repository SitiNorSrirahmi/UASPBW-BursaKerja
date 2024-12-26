@extends('layouts.app')

@section('title', 'Abouts')

@section('content')
<div class="container mx-auto my-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Abouts</h1>
    </div>

    <!-- Tabel Data -->
    <div class="bg-white shadow rounded-lg p-4">
        <table class="table-auto w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">NIM</th>
                    <th class="px-4 py-2">Program Studi</th>
                    <th class="px-4 py-2">Jurusan</th>
                    <th class="px-4 py-2">Tempat Lahir</th>
                    <th class="px-4 py-2">Tanggal Lahir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($abouts as $about)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $about->nama }}</td>
                        <td class="px-4 py-2">{{ $about->nim }}</td>
                        <td class="px-4 py-2">{{ $about->prodi }}</td>
                        <td class="px-4 py-2">{{ $about->jurusan }}</td>
                        <td class="px-4 py-2">{{ $about->tempat_lahir }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($about->tanggal_lahir)->format('M d, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        @if ($abouts->isEmpty())
            <p class="text-center py-4">No data available.</p>
        @endif
    </div>
</div>
@endsection

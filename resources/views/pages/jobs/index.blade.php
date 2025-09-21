@extends('layouts.app')

@section('title', 'Cari Lowongan Kerja')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Hasil Pencarian Lowongan</h1>

    {{-- TODO: Tampilkan filter sidebar di sini jika perlu --}}

    <div class="space-y-6">
        {{-- Loop untuk setiap lowongan yang ditemukan --}}
        @forelse ($jobs as $job)
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between">
            <div>
                <div class="text-sm text-gray-500">{{ $job->company->name }}</div>
                <h2 class="text-2xl font-bold text-primary hover:underline">
                    <a href="#">{{-- Nanti arahkan ke detail loker --}}
                        {{ $job->title }}
                    </a>
                </h2>
                <div class="text-gray-600 mt-2 text-sm">
                    <span>{{ $job->location }}</span> - <span>{{ $job->jobType->name }}</span>
                </div>
            </div>
            <div class="ml-4">
                <a href="{{ $job->application_link }}" target="_blank" class="bg-primary text-white font-semibold py-2 px-5 rounded-lg hover:bg-opacity-90 transition duration-300">
                    Lamar
                </a>
            </div>
        </div>
        @empty
        {{-- Tampilkan ini jika tidak ada loker yang ditemukan --}}
        <div class="bg-white p-8 rounded-lg shadow-md text-center">
            <h3 class="text-2xl font-bold">Oops!</h3>
            <p class="text-gray-600 mt-2">Tidak ada lowongan kerja yang cocok dengan kriteria pencarian Anda.</p>
        </div>
        @endforelse
    </div>

    {{-- Tampilkan Link Paginasi --}}
    <div class="mt-10">
        {{-- appends() penting agar filter tetap aktif saat pindah halaman --}}
        {{ $jobs->appends(request()->query())->links() }}
    </div>

</div>
@endsection

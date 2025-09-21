@extends('layouts.app')

@section('title', 'Cari Lowongan Kerja')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-8">Hasil Pencarian Lowongan</h1>

    {{-- TODO: Tampilkan filter sidebar di sini jika perlu --}}

    <div class="space-y-6">
        @forelse ($jobs as $job)
        <x-job-card :job="$job" />

        @empty
        <div class="bg-white p-8 rounded-lg shadow-md text-center">
            <h3 class="text-2xl font-bold">Oops!</h3>
            <p class="text-gray-600 mt-2">Tidak ada lowongan kerja yang cocok dengan kriteria pencarian Anda.</p>
        </div>
        @endforelse
    </div>

    {{-- Link Paginasi --}}
    <div class="mt-10">
        {{ $jobs->appends(request()->query())->links() }}
    </div>

</div>
@endsection

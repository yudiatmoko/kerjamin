@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
{{-- ====================================================== --}}
{{-- =================== HERO SECTION =================== --}}
{{-- ====================================================== --}}
<section class="bg-primary w-full pt-12 pb-16 md:pt-16 md:pb-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center gap-12">

        {{-- 1. Search Bar --}}
        {{-- Kita panggil komponen search-bar yang sudah kita buat --}}
        @include('components.search-bar')

        {{-- 2. Ads Section --}}
        {{-- Kita panggil komponen ads-placeholder yang sudah kita buat --}}
        <div class="w-full max-w-4xl">
            <x-ads-placeholder />
        </div>

    </div>
</section>


{{-- ====================================================== --}}
{{-- ============= SECTION LOWONGAN TERBARU ============= --}}
{{-- ====================================================== --}}
<section class="bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <h2 class="text-3xl font-bold text-center mb-8">Lowongan Kerja Terbaru</h2>

        {{-- TODO: Loop data lowongan kerja dari controller dan tampilkan di sini --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Contoh 1 Kartu Loker --}}
            <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg shadow-sm">
                <h3 class="font-bold text-xl text-primary">Staff Quality Control</h3>
                <p class="text-gray-600 mt-2">PT Maju Mundur</p>
                <p class="text-gray-500 text-sm mt-1">Tangerang, Banten</p>
            </div>

            {{-- Contoh 2 Kartu Loker --}}
            <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg shadow-sm">
                <h3 class="font-bold text-xl text-primary">Backend Developer</h3>
                <p class="text-gray-600 mt-2">PT Cipta Solusi Digital</p>
                <p class="text-gray-500 text-sm mt-1">Jakarta Selatan</p>
            </div>

            {{-- Contoh 3 Kartu Loker --}}
            <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg shadow-sm">
                <h3 class="font-bold text-xl text-primary">Operator Mesin</h3>
                <p class="text-gray-600 mt-2">PT Makmur Abadi Garmen</p>
                <p class="text-gray-500 text-sm mt-1">Bandung, Jawa Barat</p>
            </div>
        </div>
    </div>
</section>

@endsection

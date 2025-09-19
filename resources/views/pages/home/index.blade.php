{{-- 1. Beritahu Blade untuk menggunakan layout 'app.blade.php' --}}
@extends('layouts.app')

{{-- 2. Isi bagian 'title' di layout --}}
@section('title', 'Beranda')

{{-- 3. Isi bagian 'content' di layout --}}
@section('content')
{{-- Di sinilah semua konten unik untuk halaman homepage Anda akan diletakkan --}}

{{-- Contoh Section Hero --}}
<div class="bg-gray-200 py-20 text-center">
    <h1 class="text-4xl font-bold">Temukan Pekerjaan Impian Anda</h1>
    <p class="mt-4 text-lg">Jelajahi ribuan lowongan kerja terbaru di seluruh Indonesia.</p>
    {{-- TODO: Tambahkan form pencarian di sini --}}
</div>

{{-- Contoh Section Lowongan Terbaru --}}
<div class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-center mb-8">Lowongan Kerja Terbaru</h2>
    {{-- TODO: Loop data lowongan kerja dari controller dan tampilkan di sini --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {{-- Contoh 1 Kartu Loker --}}
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="font-bold text-xl">Staff Quality Control</h3>
            <p class="text-gray-600 mt-2">PT Maju Mundur</p>
            <p class="text-gray-500 text-sm mt-1">Tangerang, Banten</p>
        </div>
        {{-- Ulangi kartu ini untuk setiap loker --}}
    </div>
</div>

{{-- TODO: Tambahkan section Kategori, Pendidikan, dan Blog di sini --}}

@endsection

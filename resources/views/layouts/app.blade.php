<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>{{ config('app.name', 'Kerjamin') }} - @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-gray-100 text-gray-800">
    {{-- Memuat Navbar --}}
    @include('components.navbar')

    {{-- Konten Utama yang akan diisi oleh setiap halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Memuat Footer --}}
    @include('components.footer')
</body>
</html>

@props([
'title' => 'Judul Halaman',
])

<section class="bg-primary text-white py-22 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl md:text-5xl font-bold font-sans">
            {{ $title }}
        </h1>
    </div>
</section>

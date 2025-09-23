@props([
'blog' => null,
])

@if ($blog)
<a href="#" {{-- Ganti dengan route('blogs.show', $blog) --}} class="block bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 group overflow-hidden">

    <div class="relative aspect-video overflow-hidden">
        <img src="{{ Storage::disk('cloudinary')->url($blog->thumbnail) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-300">
        <div class="absolute inset-0 bg-black/20"></div>
        <span class="absolute top-4 left-4 bg-primary text-white text-xs font-semibold px-3 py-1 rounded-full">Blog</span>
    </div>

    <div class="p-6 flex flex-col gap-4 relative z-10">
        <p class="text-sm text-gray-500">
            {{ $blog->created_at->format('d F Y') }}
        </p>

        <h3 class="text-xl font-bold text-gray-900 transition-colors duration-300">
            {{ $blog->title }}
        </h3>

        <div class="inline-flex items-center gap-2 text-primary font-semibold">
            <span>Baca selengkapnya</span>
            <span class="material-symbols-outlined transition-transform duration-300 group-hover:translate-x-1">
                arrow_forward
            </span>
        </div>
    </div>
</a>
@endif

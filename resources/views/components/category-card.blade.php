@props([
'category' => null,
])

@if ($category)
<a href="{{ route('jobs.index', ['categories[]' => $category->slug]) }}" class="block bg-white p-6 rounded-xl shadow-md hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
    <div class="flex flex-col items-center justify-center text-center space-y-4 h-full">
        <span class="material-symbols-outlined text-gray-800 group-hover:text-primary" style="font-size: 48px;">
            {{ $category->icon ?? 'work' }}
        </span>

        <h3 class="text-lg font-bold text-gray-800 group-hover:text-primary transition-colors duration-300 text-center leading-snug">
            {{ $category->name }}
        </h3>

        <span class="text-sm font-medium text-primary bg-secondary px-3 py-1 rounded-full">
            {{ $category->job_listings_count }} Lowongan
        </span>
    </div>
</a>
@endif

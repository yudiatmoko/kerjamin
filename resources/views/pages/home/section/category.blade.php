<section class="bg-primary/5 py-12 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-8 flex flex-col items-center text-center md:flex-row md:justify-between md:text-left">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 capitalize">
                Kategori Lowongan
            </h2>
        </div>

        <div class="flex overflow-x-auto space-x-6 pb-4 snap-x snap-mandatory scrollbar-hide">
            @forelse ($categories as $category)
            <div class="flex-shrink-0 w-64 snap-start">
                <x-category-card :category="$category" />
            </div>
            @empty
            <p class="text-gray-500">
                Belum ada kategori yang tersedia.
            </p>
            @endforelse
        </div>
    </div>
</section>

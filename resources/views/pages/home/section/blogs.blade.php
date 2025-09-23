<section class="bg-white py-12 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-8 flex flex-col items-center text-center md:flex-row md:justify-between md:text-left">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 capitalize">
                Artikel & Blog
            </h2>
            <a href="{{ route('blogs.index') }}" class="mt-4 md:mt-0 text-base font-semibold text-primary underline">
                Lihat Semua
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse ($latestBlogs as $blog)
            <x-blog-card :blog="$blog" />
            @empty
            <p class="col-span-full text-center text-gray-500">
                Belum ada artikel yang dipublikasikan.
            </p>
            @endforelse
        </div>
    </div>
</section>

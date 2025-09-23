<section class="bg-gray-50 py-12 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8 flex flex-col items-center text-center md:flex-row md:justify-between md:text-left">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 capitalize">
                Lowongan Kerja Terbaru
            </h2>
            <a href="{{ route('jobs.index') }}" class="mt-4 md:mt-0 text-base font-semibold underline text-primary">
                Lihat Semua
            </a>
        </div>

        <div class="space-y-6">
            @forelse ($latestJobs as $job)
            <x-job-card :job="$job" />
            @empty
            <div class="bg-white p-8 rounded-lg shadow-md text-center">
                <p class="text-gray-600">Saat ini belum ada lowongan kerja terbaru.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

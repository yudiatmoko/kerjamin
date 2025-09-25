<section class="bg-primary/5 py-12 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="mb-8 text-center md:text-left text-3xl md:text-4xl font-bold text-gray-900 capitalize">
            Hasil Pencarian
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            <div class="col-span-1">
                @include('components.job-filter-card', [
                'categories' => $categories,
                'jobTypes' => $jobTypes,
                'experiences' => $experiences,
                'educations' => $educations,
                ])
            </div>

            <div class="col-span-1 lg:col-span-3">
                <div class="space-y-6">
                    @forelse ($jobs as $job)
                    <x-job-card :job="$job" variant="jobs" />
                    @empty
                    <div class="bg-white p-8 rounded-lg shadow-md text-center">
                        <h3 class="text-2xl font-bold">Oops!</h3>
                        <p class="text-gray-600 mt-2">Tidak ada lowongan kerja yang cocok dengan kriteria pencarian Anda.</p>
                    </div>
                    @endforelse
                </div>

                <div class="mt-10">
                    {{ $jobs->appends(request()->query())->links() }}
                </div>
            </div>

        </div>
    </div>
</section>

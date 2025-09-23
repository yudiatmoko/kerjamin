<section class="bg-gray-100 py-12 md:py-16 font-sans">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 text-center mb-12">
            Pendidikan
        </h2>

        <div class="flex flex-col gap-8">
            @foreach ($jobsByEducation as $educationLevel => $jobs)
            <div>
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800">{{ $educationLevel }}</h3>
                    <a href="#" class="text-sm font-semibold text-primary underline">
                        Lihat Semua
                    </a>
                </div>

                <div class="relative dots-wrapper">
                    <div class="scroll-container grid grid-flow-col auto-cols-[100%] sm:auto-cols-[50%] md:auto-cols-[15%] lg:auto-cols-[25%] xl:auto-cols-[20%] gap-4 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-10">
                        @forelse ($jobs as $job)
                        <div class="snap-start">
                            <x-job-by-education-card :job="$job" />
                        </div>
                        @empty
                        <p class="text-gray-500 py-8">
                            Belum ada lowongan untuk jenjang ini.
                        </p>
                        @endforelse
                    </div>
                    <div class="dots-indicator"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

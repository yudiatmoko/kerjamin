@props([
'jobsByEducation' => [],
])

<section class="bg-gray-100 py-12 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Judul Utama Section --}}
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 text-center md:text-left mb-8">
            Pendidikan
        </h2>

        <div class="flex flex-col gap-8">
            @foreach ($jobsByEducation as $educationLevel => $jobs)
            <div>
                {{-- Header Pendidikan --}}
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">{{ $educationLevel }}</h3>
                    <a href="#" class="text-sm font-semibold text-primary hover:underline">
                        Lihat Semua
                    </a>
                </div>

                {{-- List Lowongan (Scroll Horizontal) --}}
                <div class="flex overflow-x-auto gap-4 pb-4">
                    @foreach ($jobs as $job)
                    <div class="flex-shrink-0 w-full">
                        <x-job-card :job="$job" />
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>



    </div>
</section>

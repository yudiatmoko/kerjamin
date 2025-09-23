@if ($job)
<a href="#" {{-- Ganti dengan route('jobs.show', $job) --}} class="block w-full h-full p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 group">
    <div class="flex flex-col h-full">
        <div class="w-full flex justify-between items-start mb-4">
            <span class="bg-primary/10 text-primary text-xs font-semibold px-3 py-1 rounded-full">
                @if ($job->created_at->isToday() || $job->created_at->isYesterday())
                Hari ini
                @else
                {{ $job->created_at->diffForHumans() }}
                @endif
            </span>
        </div>

        <div class="flex items-center gap-4 mb-6">
            <img src="https://res.cloudinary.com/{{ config('filesystems.disks.cloudinary.cloud') }}/image/upload/c_thumb,h_128,w_128,z_1/{{ $job->company->logo ?? '61f4d73b-45f4-4c44-94f9-867fcccf2611.png' }}" alt="{{ $job->company->name }}" class="w-12 h-12 rounded-full object-cover bg-gray-200">
            <div class="flex-grow">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-primary transition-colors duration-300">
                    {{ $job->title }}
                </h3>
                <p class="text-sm text-gray-800 group-hover:text-primary">{{ $job->company->name }}</p>
            </div>
        </div>

        <div class="mt-auto flex flex-col gap-6">
            <div class="flex flex-wrap w-full">
                <div class="w-full inline-flex items-center gap-2 text-gray-600 py-1">
                    <span class="material-symbols-outlined text-base text-primary">work</span>
                    <span class="text-sm truncate">{{ $job->category->name }}</span>
                </div>
                <div class="w-full inline-flex items-center gap-2 text-gray-600 py-1">
                    <span class="material-symbols-outlined text-base text-primary">schedule</span>
                    <span class="text-sm truncate">{{ $job->jobType->name }}</span>
                </div>
                <div class="w-full inline-flex items-center gap-2 text-gray-600 py-1">
                    <span class="material-symbols-outlined text-base text-primary">school</span>
                    <span class="text-sm truncate">{{ $job->education->name }}</span>
                </div>
                <div class="w-full inline-flex items-center gap-2 text-gray-600 py-1">
                    <span class="material-symbols-outlined text-base text-primary">location_on</span>
                    <span class="text-sm truncate">{{ $job->location }}</span>
                </div>
            </div>
            <div class="w-full text-center">
                <span class="w-full inline-block bg-primary text-white text-base font-semibold px-6 py-3 rounded-xl group-hover:bg-opacity-90 transition-colors duration-300">
                    Detail
                </span>
            </div>
        </div>
    </div>
</a>
@endif

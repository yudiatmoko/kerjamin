@props([
'categories' => [],
'jobTypes' => [],
'experiences' => [],
'educations' => [],
'locations' => [],
])

<aside {{ $attributes->merge(['class' => 'bg-white p-6 rounded-xl border border-gray-200 lg:sticky top-24']) }}>

    <button id="filter-toggle-button" class="w-full flex items-center justify-between lg:hidden bg-primary text-white p-3 rounded-lg mb-4">
        <span id="filter-toggle-text" class="font-semibold">Tampilkan Filter</span>
        <span class="material-symbols-outlined">tune</span>
    </button>

    <form id="filter-form" action="{{ route('jobs.index') }}" method="GET" class="hidden lg:block">
        <div class="space-y-8">

            <div>
                <h3 class="text-xl font-semibold mb-4">Cari Lowongan Kerja</h3>
                <div class="relative mb-4">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-primary">search</span>
                    <input type="text" name="keyword" placeholder="Posisi atau Perusahaan" class="w-full pl-10 pr-4 py-2 border border-primary rounded-lg focus:outline-none focus:ring-primary focus:border-2 truncate" value="{{ request('keyword') }}">
                </div>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-primary">location_on</span>
                    <select name="location" class="w-full pl-10 pr-8 py-2 border border-primary rounded-lg focus:ring-primary focus:border-2 appearance-none truncate">
                        <option value="">Semua Lokasi</option>
                        @foreach ($locations as $location)
                        <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                            {{ $location }}
                        </option>
                        @endforeach
                    </select>
                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-primary pointer-events-none">expand_more</span>
                </div>
            </div>

            <div data-filter-group>
                <h3 class="text-xl font-semibold mb-4">Kategori</h3>
                <div class="space-y-2">
                    <label class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-gray-700">
                            <input type="checkbox" name="categories[]" value="" class="filter-all rounded text-primary focus:ring-primary/50" @if(!request('categories')) checked @endif>
                            Semua Kategori
                        </span>
                    </label>
                    @foreach ($categories as $category)
                    <label class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-gray-700">
                            <input type="checkbox" name="categories[]" value="{{ $category->slug }}" class="filter-option rounded text-primary focus:ring-primary/50" @if(in_array($category->slug, request('categories', []))) checked @endif>
                            {{ $category->name }}
                        </span>
                        <span class="text-sm text-primary bg-secondary px-2 py-0.5 rounded-full">{{ $category->job_listings_count }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div data-filter-group>
                <h3 class="text-xl font-semibold mb-4">Tipe Pekerjaan</h3>
                <div class="space-y-2">
                    <label class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-gray-700">
                            <input type="checkbox" name="job_types[]" value="" class="filter-all rounded text-primary focus:ring-primary/50" @if(!request('job_types')) checked @endif>
                            Semua Tipe
                        </span>
                    </label>
                    @foreach ($jobTypes as $jobType)
                    <label class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-gray-700">
                            <input type="checkbox" name="job_types[]" value="{{ $jobType->slug }}" class="filter-option rounded text-primary focus:ring-primary/50" @if(in_array($jobType->slug, request('job_types', []))) checked @endif>
                            {{ $jobType->name }}
                        </span>
                        <span class="text-sm text-primary bg-secondary px-2 py-0.5 rounded-full">{{ $jobType->job_listings_count }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div data-filter-group>
                <h3 class="text-xl font-semibold mb-4">Pengalaman</h3>
                <div class="space-y-2">
                    <label class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-gray-700">
                            <input type="checkbox" name="experiences[]" value="" class="filter-all rounded text-primary focus:ring-primary/50" @if(!request('experiences')) checked @endif>
                            Semua Pengalaman
                        </span>
                    </label>
                    @foreach ($experiences as $experience)
                    <label class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-gray-700">
                            <input type="checkbox" name="experiences[]" value="{{ $experience->slug }}" class="filter-option rounded text-primary focus:ring-primary/50" @if(in_array($experience->slug, request('experiences', []))) checked @endif>
                            {{ $experience->name }}
                        </span>
                        <span class="text-sm text-primary bg-secondary px-2 py-0.5 rounded-full">{{ $experience->job_listings_count }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div data-filter-group>
                <h3 class="text-xl font-semibold mb-4">Pendidikan</h3>
                <div class="space-y-2">
                    <label class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-gray-700">
                            <input type="checkbox" name="educations[]" value="" class="filter-all rounded text-primary focus:ring-primary/50" @if(!request('educations')) checked @endif>
                            Semua Pendidikan
                        </span>
                    </label>
                    @foreach ($educations as $education)
                    <label class="flex items-center justify-between">
                        <span class="inline-flex items-center gap-2 text-gray-700">
                            <input type="checkbox" name="educations[]" value="{{ $education->slug }}" class="filter-option rounded text-primary focus:ring-primary/50" @if(in_array($education->slug, request('educations', []))) checked @endif>
                            {{ $education->name }}
                        </span>
                        <span class="text-sm text-primary bg-secondary px-2 py-0.5 rounded-full">{{ $education->job_listings_count }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="space-y-3 pt-4 border-t">
                <button type="submit" class="w-full bg-primary text-white font-semibold py-3 rounded-lg hover:bg-opacity-90 transition-colors">
                    Terapkan Filter
                </button>
                <a href="{{ route('jobs.index') }}" class="w-full block text-center bg-gray-200 text-gray-800 font-semibold py-3 rounded-lg hover:bg-gray-300 transition-colors">
                    Bersihkan Filter
                </a>
            </div>
        </div>
    </form>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('filter-toggle-button');
        const filterForm = document.getElementById('filter-form');
        const toggleButtonText = toggleButton ? toggleButton.querySelector('#filter-toggle-text') : null;

        const updateButtonText = () => {
            if (!toggleButtonText) return;
            toggleButtonText.textContent = filterForm.classList.contains('hidden') ? 'Tampilkan Filter' : 'Sembunyikan Filter';
        };

        if (toggleButton) {
            const urlParams = new URLSearchParams(window.location.search);
            let hasFilters = false;
            for (const key of urlParams.keys()) {
                if (key !== 'page') {
                    hasFilters = true;
                    break;
                }
            }

            if (hasFilters) {
                filterForm.classList.remove('hidden');
                toggleButton.classList.add("mb-4");
            } else {
                toggleButton.classList.remove("mb-4");
            }

            updateButtonText();

            toggleButton.addEventListener('click', () => {
                filterForm.classList.toggle('hidden');
                toggleButton.classList.toggle("mb-4");
                updateButtonText();
            });
        }


        document.querySelectorAll('[data-filter-group]').forEach(group => {
            const allCheckbox = group.querySelector('.filter-all');
            const optionCheckboxes = group.querySelectorAll('.filter-option');
            if (!allCheckbox) return;

            allCheckbox.addEventListener('change', () => {
                if (allCheckbox.checked) optionCheckboxes.forEach(cb => cb.checked = false);
            });

            optionCheckboxes.forEach(cb => {
                cb.addEventListener('change', () => {
                    const anyChecked = Array.from(optionCheckboxes).some(c => c.checked);
                    allCheckbox.checked = !anyChecked;
                });
            });
        });

        filterForm.addEventListener('submit', (e) => {
            const inputs = filterForm.querySelectorAll('input[name], select[name]');
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.removeAttribute('name');
                }
            });

            document.querySelectorAll('[data-filter-group]').forEach(group => {
                const allCheckbox = group.querySelector('.filter-all');
                const optionCheckboxes = group.querySelectorAll('.filter-option');
                const checkedOptions = Array.from(optionCheckboxes).filter(cb => cb.checked);

                if (allCheckbox && (allCheckbox.checked || checkedOptions.length === optionCheckboxes.length)) {
                    allCheckbox.checked = false;
                    optionCheckboxes.forEach(cb => cb.checked = false);
                }
            });
        });
    });

</script>

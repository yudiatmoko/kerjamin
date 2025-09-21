<form action="{{ route('jobs.index') }}" method="GET" class="w-full max-w-4xl mx-auto">
    <div class="bg-white p-6 md:p-2 rounded-xl shadow-lg flex flex-col md:flex-row items-center overflow-hidden">

        <div class="w-full flex flex-col md:flex-row">

            <div class="w-full p-3 flex-3">
                <input type="text" name="keyword" placeholder="Cari Lowongan Kerja" class="w-full text-base font-medium text-gray-800 placeholder-gray-400 border-b-2 border-gray-200 md:border-b-0 md:border-r-3 focus:outline-none focus:border-primary transition duration-300">
            </div>

            <div class="w-full p-3 flex-3 relative">
                <select name="location" class="w-full text-base font-medium text-gray-800 bg-white border-b-2 border-gray-200 
               md:border-b-0 md:border-r-3 focus:outline-none focus:border-primary transition duration-300 
               appearance-none pr-6 truncate">
                    <option value="">Semua Lokasi</option>
                    @foreach ($searchLocations as $location)
                    <option value="{{ $location }}">{{ $location }}</option>
                    @endforeach
                </select>

                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-600">
                    expand_more
                </span>
            </div>

            <div class="w-full p-3 flex-3 relative">
                <select name="category" class="w-full text-base font-medium text-gray-800 bg-white border-b-2 border-gray-200 
               md:border-b-0 md:border-r-3 focus:outline-none focus:border-primary transition duration-300 
               appearance-none pr-6 truncate">
                    <option value="">Semua Kategori</option>
                    @foreach ($searchCategories as $category)
                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-600">
                    expand_more
                </span>
            </div>

        </div>

        <button type="submit" class="w-full md:w-auto mt-6 md:mt-0 bg-primary text-white font-semibold text-base px-7 rounded-xl py-4 flex items-center justify-center gap-2.5 hover:bg-opacity-90 transition duration-300">
            <span class="material-symbols-outlined">search</span>
            <span>Cari</span>
        </button>

    </div>
</form>

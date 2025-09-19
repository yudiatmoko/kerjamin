{{-- Ini adalah contoh footer sederhana berdasarkan desain Anda --}}
<footer class="bg-[#084463] text-white">
    <div class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Kolom 1: Tentang Kerjamin --}}
            <div>
                <h3 class="font-bold text-lg mb-4">Kerjamin</h3>
                <p class="text-gray-300">
                    #DijaminKerja. Platform informasi lowongan kerja terpercaya di Indonesia.
                </p>
                <div class="mt-4">
                    <p>&copy; {{ date('Y') }} Kerjamin. All Rights Reserved.</p>
                </div>
            </div>

            {{-- Kolom 2: Tautan Penting --}}
            <div>
                <h3 class="font-bold text-lg mb-4">Tautan</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-white">{{-- route('jobs.index') --}}Lowongan Kerja</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">{{-- route('blogs.index') --}}Blog</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">{{-- route('about') --}}Tentang Kami</a></li>
                </ul>
            </div>

            {{-- Kolom 3: Sosial Media --}}
            <div>
                <h3 class="font-bold text-lg mb-4">Sosial Media</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-white">Facebook</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Instagram</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">LinkedIn</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

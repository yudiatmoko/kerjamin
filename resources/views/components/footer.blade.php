<footer class="bg-primary text-white">
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 text-center md:text-left">

            <div class="col-span-1 lg:col-span-2 flex flex-col items-center md:items-start space-y-4">
                <a href="{{ route('home.index') }}">
                    <img src="{{ asset('images/white-logo-w-text-navbar.svg') }}" alt="Logo Kerjamin" class="h-12 w-auto">
                </a>
                <p class="text-white font-medium text-lg">#DijaminKerja</p>
            </div>

            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Tautan</h3>
                <div class="flex flex-col space-y-3 text-white/80 font-medium text-base">
                    <a href="{{ route('home.index') }}" class="hover:underline">Beranda</a>
                    <a href="{{ route('jobs.index') }}" class="hover:underline">Lowongan Kerja</a>
                    <a href="{{ route('blogs.index') }}" class="hover:underline">Blog</a>
                    <a href="{{ route('about') }}" class="hover:underline">Tentang Kami</a>
                </div>
            </div>

            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Sosial Media</h3>
                <div class="flex flex-col space-y-3 text-white/80">
                    <a href="#" class="items-center gap-3">
                        <i class="fa-brands fa-instagram fa-fw text-xl"></i>
                        <span class="hover:underline">Instagram</span>
                    </a>
                    <a href="#" class="items-center gap-3">
                        <i class="fa-brands fa-facebook-f fa-fw text-xl"></i>
                        <span class="hover:underline">Facebook</span>
                    </a>
                    <a href="#" class="items-center gap-3">
                        <i class="fa-brands fa-tiktok fa-fw text-xl"></i>
                        <span class="hover:underline">Tiktok</span>
                    </a>
                    <a href="#" class="items-center gap-3">
                        <i class="fa-brands fa-telegram fa-fw text-xl"></i>
                        <span class="hover:underline">Telegram</span>
                    </a>
                    <a href="#" class="items-center gap-3">
                        <i class="fa-brands fa-whatsapp fa-fw text-xl"></i>
                        <span class="hover:underline">Whatsapp</span>
                    </a>
                </div>
            </div>

            {{-- <div class="space-y-4">
                <h3 class="font-semibold text-lg">Sosial Media</h3>
                <div class="flex flex-col space-y-2 text-white/80">
                    <a href="#" class="inline-flex items-center gap-3">
                        <i class="fa-brands fa-instagram fa-fw text-xl"></i>
                        <span class="hover:underline">Instagram</span>
                    </a>
                    <a href="#" class="inline-flex items-center gap-3">
                        <i class="fa-brands fa-facebook-f fa-fw text-xl"></i>
                        <span class="hover:underline">Facebook</span>
                    </a>
                    <a href="#" class="inline-flex items-center gap-3">
                        <i class="fa-brands fa-tiktok fa-fw text-xl"></i>
                        <span class="hover:underline">Tiktok</span>
                    </a>
                    <a href="#" class="inline-flex items-center gap-3">
                        <i class="fa-brands fa-telegram fa-fw text-xl"></i>
                        <span class="hover:underline">Telegram</span>
                    </a>
                    <a href="#" class="inline-flex items-center gap-3">
                        <i class="fa-brands fa-whatsapp fa-fw text-xl"></i>
                        <span class="hover:underline">Whatsapp</span>
                    </a>
                </div>
            </div> --}}
        </div>

        <hr class="border-white/20 my-8">

        <div class="flex flex-col-reverse items-center gap-4 md:flex-row md:justify-between text-sm text-white/60">
            <p>© Kerjamin 2025. All Rights Reserved.</p>
            <a href="#" class="hover:underline">Privacy Policy</a>
        </div>
    </div>
</footer>

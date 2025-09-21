<header class="bg-[#084463] text-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
        <a href="{{ route('home.index') }}">
            <img src="{{ asset('images/white-logo-w-text-navbar.svg') }}" alt="Logo Kerjamin" class="h-12 w-auto grayscale">
        </a>

        <div class="hidden md:flex items-center space-x-8">
            <a href="{{ route('home.index') }}" class="py-2 text-base transition duration-200 {{ request()->is('/') ? 'font-bold text-white' : 'font-medium opacity-60 hover:opacity-80' }}">Beranda</a>
            <a href="{{ route('jobs.index') }}" class="py-2 text-base transition duration-200 {{ request()->is('lowongan-kerja*') ? 'font-bold text-white' : 'font-medium opacity-60 hover:opacity-80' }}">Lowongan Kerja</a>
            <a href="{{ route('blogs.index') }}" class="py-2 text-base transition duration-200 {{ request()->is('blog*') ? 'font-bold text-white' : 'font-medium opacity-60 hover:opacity-80' }}">Blog</a>
            <a href="{{ route('about.index') }}" class="py-2 text-base transition duration-200 {{ request()->is('tentang-kami') ? 'font-bold text-white' : 'font-medium opacity-60 hover:opacity-80' }}">Tentang Kami</a>
        </div>

        <div class="hidden md:block">
            <span class="font-medium text-base">#DijaminKerja</span>
        </div>

        <div class="md:hidden">
            <button id="mobile-menu-button" class="min-h-10 min-w-10 p-1.5 text-primary bg-white rounded-lg flex justify-center items-center gap-2.5 overflow-hidden">
                <span id="menu-icon" class="material-symbols-outlined">
                    menu
                </span>
            </button>
        </div>
    </nav>

    <div id="mobile-menu" class="hidden md:hidden bg-primary border-t border-white/10">
        <div class="pt-6 pb-6 space-y-4 flex flex-col items-center">
            <a href="{{ route('home.index') }}" class="text-base {{ request()->is('/') ? 'font-bold text-white' : 'font-medium opacity-60' }}">Beranda</a>
            <a href="{{ route('jobs.index') }}" class="text-base {{ request()->is('lowongan-kerja*') ? 'font-bold text-white' : 'font-medium opacity-60' }}">Lowongan Kerja</a>
            <a href="{{ route('blogs.index') }}" class="text-base {{ request()->is('blog*') ? 'font-bold text-white' : 'font-medium opacity-60' }}">Blog</a>
            <a href="{{ route('about.index') }}" class="text-base {{ request()->is('tentang-kami') ? 'font-bold text-white' : 'font-medium opacity-60' }}">Tentang Kami</a>
        </div>
    </div>
</header>

<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');

        if (mobileMenu.classList.contains('hidden')) {
            menuIcon.textContent = 'menu';
        } else {
            menuIcon.textContent = 'close';
        }
    });

</script>

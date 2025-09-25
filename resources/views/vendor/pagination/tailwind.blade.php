@if ($paginator->hasPages())
<nav role="navigation" aria-label="Navigasi Paginasi" class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
    <div class="text-sm text-gray-700 text-center">
        Menampilkan
        @if ($paginator->firstItem())
        <span class="font-medium">{{ $paginator->firstItem() }}</span>
        sampai
        <span class="font-medium">{{ $paginator->lastItem() }}</span>
        @else
        {{ $paginator->count() }}
        @endif
        dari
        <span class="font-medium">{{ $paginator->total() }}</span>
        hasil
    </div>

    <div class="flex justify-between sm:hidden">
        @if ($paginator->onFirstPage())
        <span class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-primary/40 border border-primary/30 rounded-md cursor-default">
            <span class="material-symbols-outlined text-base">chevron_left</span>
            Sebelumnya
        </span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex items-center gap-1 px-4 py-2 text-sm font-medium text-primary border border-primary rounded-md hover:bg-primary hover:text-white transition">
            <span class="material-symbols-outlined text-base">chevron_left</span>
            Sebelumnya
        </a>
        @endif

        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex items-center gap-1 px-4 py-2 ml-3 text-sm font-medium text-primary border border-primary rounded-md hover:bg-primary hover:text-white transition">
            Berikutnya
            <span class="material-symbols-outlined text-base">chevron_right</span>
        </a>
        @else
        <span class="inline-flex items-center gap-1 px-4 py-2 ml-3 text-sm font-medium text-primary/40 border border-primary/30 rounded-md cursor-default">
            Berikutnya
            <span class="material-symbols-outlined text-base">chevron_right</span>
        </span>
        @endif
    </div>

    <div class="hidden sm:flex">
        <span class="relative z-0 inline-flex shadow-sm rounded-md">
            @if ($paginator->onFirstPage())
            <span class="inline-flex items-center px-3 py-2 text-sm font-medium text-primary/40 border border-primary/30 rounded-l-md cursor-default">
                <span class="material-symbols-outlined">chevron_left</span>
            </span>
            @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-3 py-2 text-sm font-medium text-primary border border-primary rounded-l-md hover:bg-primary hover:text-white transition">
                <span class="material-symbols-outlined">chevron_left</span>
            </a>
            @endif

            @foreach ($elements as $element)
            @if (is_string($element))
            <span class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-primary/60 border border-primary/30 cursor-default">
                {{ $element }}
            </span>
            @endif

            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <span aria-current="page" class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium bg-primary text-white border border-primary cursor-default">
                {{ $page }}
            </span>
            @else
            <a href="{{ $url }}" class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-primary border border-primary hover:bg-primary hover:text-white transition">
                {{ $page }}
            </a>
            @endif
            @endforeach
            @endif
            @endforeach

            @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-3 py-2 -ml-px text-sm font-medium text-primary border border-primary rounded-r-md hover:bg-primary hover:text-white transition">
                <span class="material-symbols-outlined">chevron_right</span>
            </a>
            @else
            <span class="inline-flex items-center px-3 py-2 -ml-px text-sm font-medium text-primary/40 border border-primary/30 rounded-r-md cursor-default">
                <span class="material-symbols-outlined">chevron_right</span>
            </span>
            @endif
        </span>
    </div>
</nav>
@endif

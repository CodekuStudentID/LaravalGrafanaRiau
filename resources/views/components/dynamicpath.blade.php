<nav class="flex text-sm text-gray-500" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-2">
        <li>
            <a href="/dunia-kampar" class="hover:text-green-900 transition-colors capitalize">Beranda</a>
        </li>

        @php $link = ''; @endphp

        @foreach(request()->segments() as $segment)
            @php $link .= '/' . $segment; @endphp

            <li>
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                </svg>
            </li>

            @if($loop->last)
                {{-- Segment terakhir (Halaman aktif) --}}
                <li class="text-green-900 font-semibold italic text-xs md:text-sm capitalize">
                    {{ str_replace('-', ' ', $segment) }}
                </li>
            @else
                {{-- Segment tengah (Bisa diklik) --}}
                <li>
                    <a href="{{ $link }}" class="hover:text-green-900 transition-colors capitalize">
                        {{ str_replace('-', ' ', $segment) }}
                    </a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>

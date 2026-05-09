{{-- Modern & Stable News Header --}}
<div class="pt-8 max-w-7xl mx-auto px-6 lg:px-8">

    <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-12">
        <div class="max-w-2xl">
            <div class="flex items-center space-x-3 mb-6">
                <span class="h-[2px] w-8 bg-green-600"></span>
                <span class="text-xs font-bold uppercase tracking-widest text-green-700">Headline Portal</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-slate-900 leading-tight tracking-tighter">
                Navigasi Informasi <br>
                <span class="text-green-700">Terpercaya</span> di Kampar.
            </h1>
        </div>

        <div class="flex flex-col items-start md:items-end gap-4">
            {{-- <p class="text-slate-500 font-medium md:text-right max-w-[250px]">
                Menyajikan fakta dari jantung Riau untuk audiens global.
            </p> --}}
            <a href="{{route('web.category', 'nasional')}}" class="inline-flex items-center px-6 py-3 bg-yellow-500 hover:bg-slate-900 text-slate-900 hover:text-white font-bold rounded-xl transition-all duration-300 shadow-lg shadow-yellow-100" wire:navigate>
                Lihat Semua Berita
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>

    <div class="w-full h-px bg-gray-100 mb-12"></div>

    <div class="flex flex-col lg:flex-row gap-10 lg:gap-20">

    </div>
</div>


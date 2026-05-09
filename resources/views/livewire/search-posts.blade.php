<div x-data="{ open: false }"
     @keydown.window.ctrl.k.prevent="open = true"
     @keydown.window.cmd.k.prevent="open = true"
     @keydown.window.escape="open = false">

    {{-- 1. TOMBOL (Tetap di Navbar) --}}
    <button @click="open = true" class="group flex items-center gap-3 px-4 py-2 bg-slate-100 hover:bg-emerald-50 border border-slate-200 rounded-full transition-all duration-300 shadow-sm">
        <i class="fa-solid fa-magnifying-glass text-emerald-500 group-hover:scale-110 transition"></i>
        <span class="text-sm text-slate-500 font-medium tracking-tight">Cari...</span>
        <kbd class="hidden lg:inline-block text-[10px] font-mono text-slate-400 bg-white border border-slate-200 px-1.5 py-0.5 rounded shadow-sm">Ctrl K</kbd>
    </button>

    {{-- 2. MODAL (Gunakan Teleport agar pindah ke <body>) --}}
    {{-- Teleport memastikan modal keluar dari keterbatasan z-index navbar --}}
    <template x-teleport="body">
        <div x-show="open"
             class="fixed inset-0 z-[9999] p-4 sm:p-6 md:p-20 flex items-start justify-center"
             style="display: none;">

            {{-- Background Blur Full Layar --}}
            <div x-show="open"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-slate-900/60 backdrop-blur-2xl"
                 @click="open = false"></div>

            {{-- Panel Box Pencarian --}}
            <div x-show="open"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95 translate-y-10"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                 x-transition:leave-end="opacity-0 scale-95 translate-y-10"
                 class="relative w-full max-w-2xl transform divide-y divide-slate-100 overflow-hidden rounded-[2.5rem] bg-white shadow-2xl ring-1 ring-slate-200 transition-all mt-10">

                {{-- Input Box --}}
                <div class="relative flex items-center px-8 py-7 bg-white">
                    <i class="fa-solid fa-magnifying-glass text-emerald-500 text-2xl mr-5"></i>
                    <input
                        wire:model.live.debounce.300ms="search"
                        type="text"
                        class="h-12 w-full border-0 bg-transparent p-0 text-xl text-slate-900 placeholder:text-slate-400 focus:ring-0 font-medium"
                        placeholder="Ketik kata kunci berita..."
                        x-init="$el.focus()" {{-- Auto focus saat terbuka --}}
                    >
                    <div wire:loading class="ml-4">
                        <i class="fa-solid fa-circle-notch animate-spin text-emerald-600 text-xl"></i>
                    </div>
                </div>

                {{-- Hasil Pencarian --}}
                <div class="max-h-[60vh] overflow-y-auto bg-white custom-scrollbar">
                    @if(strlen($search) >= 2)
                        <div class="p-4 space-y-3">
                            @forelse($posts as $post)
                                <a href="{{ route('web.show', $post->slug) }}"
                                   class="flex items-center gap-5 p-4 rounded-3xl hover:bg-emerald-600 group transition-all duration-300 border border-transparent hover:border-emerald-400">

                                    <div class="h-16 w-16 shrink-0 overflow-hidden rounded-2xl shadow-md">
                                        <img src="{{ asset('storage/' . $post->images) }}" class="h-full w-full object-cover group-hover:scale-110 transition duration-500">
                                    </div>

                                    <div class="flex-grow">
                                        <span class="text-[9px] font-black uppercase tracking-widest text-emerald-600 group-hover:text-emerald-100">{{ $post->category }}</span>
                                        <p class="font-bold text-slate-900 group-hover:text-white leading-tight text-sm uppercase">{{ Str::limit($post->title, 60) }}</p>
                                    </div>
                                    <i class="fa-solid fa-arrow-right text-slate-300 group-hover:text-white group-hover:translate-x-2 transition px-4"></i>
                                </a>
                            @empty
                                <div wire:loading.remove class="text-center py-16 px-10">
                                    <p class="text-slate-500 font-medium text-sm text-slate-900">Wah, Ndak Jumpa Ocu... 🙁</p>
                                </div>
                            @endforelse
                        </div>
                    @else
                        <div class="py-20 text-center text-slate-400 uppercase tracking-widest text-[10px] font-black">
                            Mulai mengetik...
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </template>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 5px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #10b981; border-radius: 10px; }
    </style>
</div>

@extends('layouts.frontend.layout')

@section('content')
<div class="min-h-screen py-8 text-slate-800">
    <div class="max-w-7xl mx-auto px-4">

        <div class="mb-10 border-b border-slate-100 pb-6">
            <div class="flex items-center space-x-2 mb-1">
                <span class="w-8 h-1 bg-emerald-500 rounded-full"></span>
                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-emerald-600">Kategori Terkini</span>
            </div>
            <h1 class="text-4xl font-black uppercase tracking-tighter text-slate-900">
                {{ $title }} <span class="text-emerald-500">Update</span>
            </h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <div class="lg:col-span-8 space-y-8">
                @forelse($mainPosts as $post)
                <article class="group flex flex-col md:flex-row gap-6 pb-8 border-b border-slate-100 last:border-0">

                    <div class="md:w-1/3 shrink-0">
                        <div class="overflow-hidden rounded-xl aspect-video border border-slate-100 shadow-sm">
                            <img src="{{ asset('storage/'.$post->images) }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                    </div>

                    <div class="md:w-2/3 flex flex-col">
                        <div class="flex flex-wrap items-center gap-4 mb-3">
                            <div class="flex items-center text-slate-400">
                                <i class="fa-regular fa-calendar-check text-emerald-500 text-sm mr-1.5"></i>
                                <span class="text-[10px] font-bold uppercase">{{ $post->date }}</span>
                            </div>
                            <div class="flex items-center text-slate-400">
                                <i class="fa-regular fa-eye text-blue-500 text-sm mr-1.5"></i>
                                <span class="text-[10px] font-bold">{{ number_format($post->views) }}</span>
                            </div>
                            <div class="flex items-center text-slate-400">
                                <i class="fa-regular fa-heart text-pink-500 text-sm mr-1.5"></i>
                                <span class="text-[10px] font-bold">{{ $post->likes }}</span>
                            </div>
                            <div class="flex items-center text-slate-400">
                                <i class="fa-regular fa-comment text-orange-500 text-sm mr-1.5"></i>
                                <span class="text-[10px] font-bold">0</span>
                            </div>
                            <div class="flex items-center text-slate-400">
                                <i class="fa-solid fa-folder-open text-slate-400 text-sm mr-1.5"></i>
                                <span class="text-[10px] font-bold uppercase">{{ $post->category }}</span>
                            </div>
                        </div>

                        <h2 class="text-xl font-black text-slate-900 leading-tight mb-2 group-hover:text-emerald-600 transition">
                            <a href="{{ route('web.show', $post->slug) }}" wire:navigate>{{ $post->title }}</a>
                        </h2>

                        <p class="text-slate-500 text-xs leading-relaxed line-clamp-2 mb-4">
                            {{ Str::limit(strip_tags($post->content), 150) }}
                        </p>

                        <div class="mt-auto">
                            <a href="{{ route('web.show', $post->slug) }}" class="text-[10px] font-black uppercase text-emerald-600 flex items-center tracking-widest">
                                BACA SELENGKAPNYA <i class="fa-solid fa-arrow-right-long ml-2"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @empty
                    <p class="text-slate-400 text-sm">Belum ada berita di kategori ini.</p>
                @endforelse

                <div class="pt-4">
                    {{ $mainPosts->links() }}
                </div>
            </div>

            <div class="lg:col-span-4 space-y-10">
                <div>
                    <h3 class="text-sm font-black uppercase tracking-[0.2em] mb-6 flex items-center text-slate-900">
                        <i class="fa-solid fa-fire-flame-curved text-emerald-500 mr-2"></i> Terpopuler
                    </h3>
                    <div class="space-y-5">
                        @foreach($sidebarPopuler as $key => $pop)
                        <div class="flex items-center gap-4 group border-b border-slate-50 pb-4 last:border-0">
                            <div class="w-16 h-16 shrink-0 overflow-hidden rounded-lg border border-slate-100">
                                <img src="{{ asset('storage/'.$pop->images) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-[11px] font-bold text-slate-800 leading-snug group-hover:text-emerald-600 transition">
                                    <a href="{{ route('web.show', $pop->slug) }}">{{ Str::limit($pop->title, 55) }}</a>
                                </h4>
                                <div class="flex items-center gap-3 text-[8px] font-black text-slate-400 uppercase">
                                    <span class="text-emerald-500"><i class="fa-regular fa-eye mr-1"></i> {{ $pop->views }}</span>
                                    <span><i class="fa-regular fa-heart mr-1 text-pink-400"></i> {{ $pop->likes }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-gradient-to-br from-emerald-500 to-teal-700 rounded-2xl p-6 text-white shadow-xl shadow-emerald-100 relative overflow-hidden group">
                    <div class="relative z-10">
                        <h4 class="text-lg font-black uppercase leading-tight">Pasang Iklan<br>Di Bulletin Kampar</h4>
                        <p class="text-[10px] mt-2 opacity-90 font-medium">Jangkau ribuan pembaca di wilayah Kampar & sekitarnya setiap hari.</p>
                        <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Bulletin%20Kampar,%20saya%20ingin%20pasang%20iklan"
                           target="_blank"
                           class="mt-5 inline-flex items-center justify-center w-full bg-white text-emerald-700 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-emerald-50 transition shadow-lg">
                            <i class="fa-brands fa-whatsapp text-lg mr-2"></i> Hubungi WA Ocu
                        </a>
                    </div>
                    <i class="fa-solid fa-bullhorn absolute -bottom-4 -right-4 text-white/10 text-7xl rotate-12 group-hover:scale-110 transition duration-500"></i>
                </div>
            </div>
        </div>

       <div class="mt-20 pt-10 border-t border-slate-100">
    <h2 class="text-xl font-black uppercase tracking-widest mb-8 flex items-center text-slate-900 leading-none">
        <i class="fa-solid fa-layer-group text-emerald-500 mr-3 text-2xl"></i>
        Kategori <span class="text-emerald-500 ml-2">Lainnya</span>
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
        @foreach(['ekonomi', 'teknologi', 'hiburan', 'budaya', 'olahraga', 'lifestyle'] as $catName)
        <div class="flex flex-col group/cat">
            <h3 class="font-black text-[10px] uppercase tracking-widest text-emerald-600 mb-5 flex justify-between items-center border-b border-emerald-50 pb-2 group-hover/cat:border-emerald-500 transition-colors">
                {{ $catName }}
                <i class="fa-solid fa-chevron-right text-[8px] animate-pulse"></i>
            </h3>

            <div class="space-y-6">
                @if(isset($$catName))
                    @foreach($$catName as $item)
                    <div class="flex flex-col group/item gap-3">
                        <div class="relative w-full aspect-video overflow-hidden rounded-lg border border-slate-100 shadow-sm">
                            <img src="{{ asset('storage/'.$item->images) }}"
                                 class="w-full h-full object-cover group-hover/item:scale-110 transition duration-500 grayscale-[30%] group-hover/item:grayscale-0"
                                 alt="{{ $item->title }}">
                        </div>

                        <div class="flex flex-col space-y-2">
                            <h4 class="text-[11px] font-bold text-slate-800 group-hover/item:text-emerald-600 transition leading-tight h-9 overflow-hidden">
                                <a href="{{ route('web.show', $item->slug) }}" wire:navigate>
                                    {{ Str::limit($item->title, 45) }}
                                </a>
                            </h4>

                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-[8px] font-black text-slate-400 uppercase tracking-tighter">
                                <div class="flex items-center text-blue-500">
                                    <i class="fa-regular fa-eye mr-1"></i> {{ $item->views }}
                                </div>
                                <div class="flex items-center text-pink-500">
                                    <i class="fa-regular fa-heart mr-1"></i> {{ $item->likes }}
                                </div>
                                <div class="flex items-center">
                                    <i class="fa-regular fa-calendar mr-1"></i> {{ $item->date }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

            <a href="{{ route('web.category', $catName) }}" class="mt-6 text-center py-2 border border-slate-100 rounded-lg text-[9px] font-black text-slate-400 uppercase tracking-widest hover:bg-slate-50 transition">
                Lihat Semua {{ $catName }}
            </a>
        </div>
        @endforeach
    </div>
</div>
    </div>
</div>
@endsection

@extends('layouts.frontend.layout')
@section('content')
    <x-textartikel />
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <section class="py-10 border-b border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-extrabold text-gray-900 border-l-4 border-red-600 pl-3 uppercase tracking-tight">
                    Terbaru
                </h2>
                <a href="{{ route('web.category', 'asn') }}" class="text-sm font-bold text-red-600 hover:underline">Lihat
                    Semua</a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <div class="lg:col-span-7">
                    <div class="flex flex-col gap-4">

                        @php $headline = $newPosts->first(); @endphp
                        @if ($headline)
                            <div class="group relative rounded-2xl overflow-hidden h-80 shadow-sm cursor-pointer">
                                <img src="{{ asset('storage/' . $headline->images) }}" alt="{{ $headline->title }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent">
                                </div>

                                <div class="absolute bottom-0 p-6 w-full">
                                    <div class="flex gap-2 mb-3">
                                        <span
                                            class="bg-red-600 text-[10px] text-white px-2 py-1 rounded font-bold uppercase tracking-wider">
                                            TERKINI
                                        </span>
                                        <span
                                            class="bg-white/20 backdrop-blur-sm text-[10px] text-white px-2 py-1 rounded font-bold uppercase tracking-wider">
                                            {{ $headline->category }}
                                        </span>
                                    </div>

                                    <a href="{{ route('web.show', $headline->slug) }}" wire:navigate>
                                        <h3
                                            class="text-2xl font-bold text-white mb-3 leading-tight group-hover:text-red-400 transition-colors">
                                            {{ $headline->title }}
                                        </h3>
                                    </a>

                                    <div class="flex items-center gap-4 text-gray-300 text-xs">
                                        <span class="flex items-center gap-1.5">
                                            <livewire:like-button :post="$headline" :key="'like-main-' . $headline->id" />
                                            {{ number_format($headline->likes) }}
                                        </span>

                                        <span class="flex items-center gap-1.5">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                            {{ number_format($headline->views) }}
                                        </span>

                                        <span class="text-[10px] opacity-70">ID: #{{ $headline->id }}</span>

                                        <a href="{{ route('web.show', $headline->slug) }}"
                                            class="ml-auto text-white font-bold hover:text-red-400 transition-colors"
                                            wire:navigate>
                                            Baca Selengkapnya &rarr;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($newPosts->slice(1, 2) as $subPost)
                                <div class="group relative rounded-2xl overflow-hidden h-48 shadow-sm cursor-pointer">
                                    <img src="{{ asset('storage/' . $subPost->images) }}" alt="{{ $subPost->title }}"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent">
                                    </div>

                                    <div class="absolute bottom-0 p-4 w-full">
                                        <div class="flex gap-2 mb-2">
                                            <span
                                                class="bg-emerald-600 text-[8px] text-white px-1.5 py-0.5 rounded font-bold uppercase">
                                                {{ $subPost->category }}
                                            </span>
                                        </div>

                                        <a href="{{ route('web.show', $subPost->slug) }}" wire:navigate>
                                            <h4
                                                class="text-sm font-bold text-white leading-tight line-clamp-2 group-hover:text-emerald-400 transition-colors">
                                                {{ $subPost->title }}
                                            </h4>
                                        </a>

                                        <div class="flex items-center justify-between mt-2 text-[9px] text-gray-300">
                                            <div class="flex items-center gap-2">
                                                <span>ID: #{{ $subPost->id }}</span>
                                                <span>•</span>
                                                <span>{{ number_format($subPost->views) }} Views</span>
                                            </div>
                                            <livewire:like-button :post="$subPost" :key="'like-sub-' . $subPost->id" />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 space-y-4">
                    @forelse ($newPosts as $post)
                        <div
                            class="group relative flex gap-4 p-3 bg-white hover:bg-emerald-50/50 rounded-2xl transition-all duration-300 border border-gray-100 hover:border-emerald-200 hover:shadow-md">

                            <div class="relative flex-shrink-0">
                                @if ($post->images)
                                    <img src="{{ asset('storage/' . $post->images) }}"
                                        class="w-28 h-24 object-cover rounded-xl shadow-sm group-hover:rotate-1 transition duration-500"
                                        alt="{{ $post->title }}" loading="lazy" decoding="async" width="112"
                                        height="96">
                                @else
                                    <div class="w-28 h-24 bg-emerald-100 rounded-xl flex items-center justify-center">
                                        <svg class="w-10 h-10 text-emerald-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                stroke-width="1.5" />
                                        </svg>
                                    </div>
                                @endif
                                <span
                                    class="absolute -top-2 -left-2 px-2 py-0.5 bg-emerald-600 text-[8px] font-black text-white rounded-lg shadow-lg uppercase tracking-tighter">
                                    {{ $post->category }}
                                </span>
                            </div>

                            <div class="flex flex-col flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1">
                                    <span
                                        class="text-[9px] font-bold text-emerald-600 bg-emerald-100 px-1.5 py-0.5 rounded">TERBARU</span>
                                    <span
                                        class="text-[9px] text-gray-400 font-medium">{{ \Carbon\Carbon::parse($post->date)->diffForHumans() }}</span>
                                </div>

                                <a href="{{ route('web.show', $post->slug) }}" wire:navigate class="block">
                                    <h4
                                        class="text-sm font-black text-gray-900 group-hover:text-emerald-700 line-clamp-2 leading-tight transition-colors mb-1 uppercase tracking-tight">
                                        {{ $post->title }}
                                    </h4>
                                </a>

                                <p class="text-[10px] text-gray-500 line-clamp-1 mb-2 italic">
                                    {{ Str::limit(strip_tags($post->content), 80) }}
                                </p>

                                <div class="flex items-center justify-between mt-auto pt-2 border-t border-gray-100/50">
                                    <div class="flex items-center gap-3">
                                        <span class="flex items-center gap-1 text-[10px] font-bold text-slate-600">
                                            <svg aria-label="views artikel ini" class="w-3 h-3 text-emerald-500"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                                    stroke-width="2" />
                                            </svg>
                                            {{ number_format($post->views) }}
                                        </span>
                                        <span class="flex items-center gap-1 text-[10px] font-bold text-slate-600">
                                            <svg aria-label="likes artikel ini" class="w-3 h-3 text-red-500"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                            </svg>
                                            {{ $post->likes }}
                                        </span>
                                    </div>

                                    <a href="{{ route('web.show', $post->slug) }}"
                                        class="text-[9px] font-black text-emerald-600 bg-white border border-emerald-200 px-2 py-1 rounded-md group-hover:bg-emerald-600 group-hover:text-white transition-all"
                                        wire:navigate>
                                        BACA
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="py-12 text-center bg-white rounded-[2rem] border-2 border-dashed border-emerald-100">
                            <div class="text-5xl mb-4 opacity-50">🍃</div>
                            <p class="text-emerald-800 font-black uppercase text-xs tracking-widest">Belum ada kabar terbaru
                                hari ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <section class="py-12" x-data="{
            skip: 1,
            next() {
                this.$refs.placeholder.scrollBy({ left: this.$refs.placeholder.firstElementChild.clientWidth + 24, behavior: 'smooth' })
            },
            prev() {
                this.$refs.placeholder.scrollBy({ left: -this.$refs.placeholder.firstElementChild.clientWidth - 24, behavior: 'smooth' })
            }
        }">
            <div class="flex items-center justify-between mb-8">
                <h2
                    class="text-2xl font-extrabold text-gray-900 border-l-4 border-emerald-600 pl-3 uppercase tracking-tight">
                    ASN & Kesejahteraan
                </h2>

                @if ($culturePost->count() > 0)
                    <div class="flex gap-2">
                        <button @click="prev"
                            class="p-2 bg-gray-100 rounded-full hover:bg-emerald-600 hover:text-white transition shadow-sm"
                            aria-label="Images Slider Button">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <button @click="next"
                            class="p-2 bg-gray-100 rounded-full hover:bg-emerald-600 hover:text-white transition shadow-sm"
                            aria-label="Images Slider Button">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                    </div>
                @endif
            </div>

            <div x-ref="placeholder" class="flex gap-6 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-6"
                style="scroll-behavior: smooth; -webkit-overflow-scrolling: touch;">
                @forelse ($culturePost as $post)
                    <article
                        class="min-w-[85%] md:min-w-[45%] lg:min-w-[23%] snap-start bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition-all duration-300">

                        <div class="relative h-44 overflow-hidden">
                            <img src="{{ asset('storage/' . $post->images) }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                alt="{{ $post->title }}" loading="lazy" width="150" height="50"
                                fetchpriority="high" loading="eager">
                            <span
                                class="absolute top-3 right-3 bg-emerald-600 text-white text-[9px] font-black px-2 py-1 rounded shadow-lg uppercase tracking-widest">
                                {{ $post->category }}
                            </span>
                        </div>

                        <div class="p-5">
                            <a href="{{ route('web.show', $post->slug) }}" wire:navigate>
                                <h3
                                    class="font-black text-gray-900 mb-3 line-clamp-2 h-12 leading-tight group-hover:text-emerald-600 transition-colors uppercase text-sm tracking-tighter">
                                    {{ $post->title }}
                                </h3>
                            </a>

                            <div
                                class="flex items-center justify-between mb-4 text-[10px] font-bold text-gray-400 uppercase">
                                <span class="flex items-center gap-1 text-red-500">
                                    <svg aria-label="Suka artikel ini" class="w-3.5 h-3.5" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z">
                                        </path>
                                    </svg>
                                    {{ $post->likes }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg aria-label="views artikel ini" class="w-3.5 h-3.5 text-emerald-500"
                                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                    {{ number_format($post->views) }}
                                </span>
                            </div>

                            <a href="{{ route('web.show', $post->slug) }}" wire:navigate
                                class="block w-full text-center py-2.5 bg-gray-50 rounded-xl text-[10px] font-black text-gray-600 hover:bg-emerald-600 hover:text-white transition-all uppercase tracking-widest shadow-inner">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </article>
                @empty
                    <div
                        class="w-full py-20 text-center bg-gray-50 rounded-[2.5rem] border-2 border-dashed border-emerald-100">
                        <div class="text-5xl mb-4">🎭</div>
                        <h3 class="text-gray-400 font-black uppercase tracking-widest text-sm">Belum ada konten Budaya &
                            Hiburan</h3>
                        <p class="text-gray-300 text-xs mt-2">Nantikan cerita menarik dari Ocu Kampar segera!</p>
                    </div>
                @endforelse
            </div>
        </section>

        <style>
            .scrollbar-hide::-webkit-scrollbar {
                display: none;
            }

            .scrollbar-hide {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>

        <section class="py-12 border-t border-gray-100 mb-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                @php
                    $sections = [
                        [
                            'title' => 'PPK & HONORER',
                            'data' => $ppkPost,
                            'color' => 'bg-blue-600',
                            'hover' => 'group-hover:text-blue-600',
                        ],
                        [
                            'title' => 'PGRI',
                            'data' => $pgriPost,
                            'color' => 'bg-yellow-500',
                            'hover' => 'group-hover:text-yellow-600',
                        ],
                        [
                            'title' => 'KARIR',
                            'data' => $karirPost,
                            'color' => 'bg-orange-500',
                            'hover' => 'group-hover:text-orange-600',
                        ],
                    ];
                @endphp

                @foreach ($sections as $section)
                    <div class="space-y-6">
                        <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                            <h2 class="text-xl font-black text-gray-900 flex items-center gap-2 uppercase">
                                <span class="w-2 h-6 {{ $section['color'] }} rounded"></span> {{ $section['title'] }}
                            </h2>
                            <span class="text-[10px] font-bold text-gray-400">{{ $section['data']->count() }} Post</span>
                        </div>

                        @forelse ($section['data'] as $post)
                            <div class="flex gap-4 group cursor-pointer border-b border-gray-50 pb-4 last:border-0">
                                <div
                                    class="relative w-24 h-24 rounded-2xl overflow-hidden flex-shrink-0 shadow-sm border border-gray-100">
                                    <img src="{{ asset('storage/' . $post->images) }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                        alt="{{ $post->title }}" loading="lazy" width="150" height="50"
                                        fetchpriority="high" loading="eager">

                                    <div class="absolute bottom-0 inset-x-0 bg-black/60 backdrop-blur-sm py-1 text-center">
                                        <span class="text-[8px] font-bold text-white uppercase">
                                            {{ \Carbon\Carbon::parse($post->date)->format('d M Y') }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex flex-col justify-between flex-1 py-0.5">
                                    <div>
                                        <a href="{{ route('web.show', $post->slug) }}" wire:navigate>
                                            <h4
                                                class="text-[13px] font-black text-gray-800 {{ $section['hover'] }} transition-colors leading-tight uppercase mb-1 tracking-tight">
                                                {{ Str::limit($post->title, 50) }}
                                            </h4>
                                        </a>
                                        <p class="text-[10px] text-gray-500 line-clamp-1 italic mb-2">
                                            {{ Str::limit(strip_tags($post->content), 60) }}
                                        </p>
                                    </div>

                                    <div class="flex items-center gap-3 mt-auto">
                                        <div class="flex items-center gap-1 text-[9px] font-bold text-slate-400">
                                            <svg aria-label="views artikel ini" class="w-3 h-3 text-gray-300"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            {{ number_format($post->views) }}
                                        </div>
                                        <div class="flex items-center gap-1 text-[9px] font-bold text-slate-400">
                                            <svg aria-label="Sukai artikel ini" class="w-3 h-3 text-red-400"
                                                fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                            </svg>
                                            {{ $post->likes }}
                                        </div>
                                        <div class="flex items-center gap-1 text-[9px] font-bold text-slate-400">
                                            <svg aria-label="komentar artikel ini" class="w-3 h-3 text-blue-400"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                            </svg>
                                            {{ $post->comments->count() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="p-6 text-center bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">No Content in
                                    {{ $section['title'] }}</p>
                            </div>
                        @endforelse

                        @if ($section['data']->count() > 0)
                            <a href="#"
                                class="block w-full text-center py-2 border border-gray-100 rounded-xl text-[9px] font-black text-gray-400 hover:bg-gray-50 transition uppercase tracking-widest">
                                Lihat Semua {{ $section['title'] }}
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection

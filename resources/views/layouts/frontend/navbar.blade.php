<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-adsense-account" content="ca-pub-5365219857720500">
        <meta name="description" content="@yield('meta_description', 'Portal berita resmi Buletin Kampar - Informasi terkini seputar Riau.')">
        <meta property="og:image" content="{{ asset('img/logo.webp') }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-1DDD3WDG5P"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-1DDD3WDG5P');
        </script>

        <title>@yield('title', 'Dunia Kampar')</title>

        <!-- Fonts -->
        <link rel="icon" type="image/png" href="{{ asset('img/logo-v1.png') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5365219857720500"
        crossorigin="anonymous"></script>

    @livewireStyles
    </head>
<body class="bg-white text-slate-900 antialiased relative overflow-x-hidden">
<div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none bg-white">

    <div class="absolute -top-[5%] -left-[10%] w-[300px] h-[300px] md:w-[600px] md:h-[600px] bg-emerald-400/20 rounded-full blur-[80px] md:blur-[150px] animate-pulse"></div>

    <div class="hidden md:block absolute top-[20%] -right-[10%] w-[700px] h-[700px] bg-green-300/25 rounded-full blur-[160px]"></div>

    <div class="absolute -bottom-[10%] left-1/2 -translate-x-1/2 md:left-[10%] md:translate-x-0 w-[350px] h-[350px] md:w-[500px] md:h-[500px] bg-emerald-500/15 rounded-full blur-[100px] md:blur-[140px]"></div>

    <div class="absolute inset-0 bg-white/30 backdrop-blur-[40px] md:backdrop-blur-[80px]"></div>
</div>

    <nav x-data="{ open: false, userMenu: false }" class="bg-white/90 backdrop-blur-md border-b border-gray-100 fixed w-full z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('web.index') }}" class="flex items-center gap-2 group" wire:navigate>
                    <img src="{{ asset('img/logo-kampar.webp') }}" class="h-9 w-auto transition-transform group-hover:scale-105" alt="Logo">
                    <img src="{{ asset('img/logo-v1.png') }}" class="h-9 w-auto transition-transform group-hover:scale-105" alt="Logo">
                    <span class="text-lg font-bold tracking-tight text-gray-800 hidden lg:block">Grafana<span class="text-green-600">Riau</span></span>
                </a>
            </div>

            <div class="hidden xl:flex items-center space-x-5">
                <div class="flex items-center space-x-4 text-[13px] font-medium text-gray-600">
                    <a href="{{ route('web.about') }}" class="hover:text-green-600 transition" wire:navigate>About</a>
                    <a href="{{ route('web.contacts') }}" class="hover:text-green-600 transition" wire:navigate>Contacts</a>
                    <div class="h-4 w-px bg-gray-200 mx-1"></div>
                    <a href="{{ route('web.category', 'Nasional') }}" class="hover:text-green-600 transition uppercase" wire:navigate>Nasional</a>
                    <a href="{{ route('web.category', 'Riau') }}" class="hover:text-green-600 transition uppercase" wire:navigate>Riau</a>
                    <a href="{{ route('web.category', 'ASN & Kesejahteraan') }}" class="hover:text-green-600 transition uppercase" wire:navigate>ASN & Kesejahteraan</a>
                    <a href="{{ route('web.category', 'PPK & Honorer') }}" class="hover:text-green-600 transition uppercase" wire:navigate>PPK & Honorer</a>
                    <a href="{{ route('web.category', 'PGRI') }}" class="hover:text-green-600 transition uppercase" wire:navigate>PGRI</a>
                    <a href="{{ route('web.category', 'Karir') }}" class="hover:text-green-600 transition uppercase" wire:navigate>Karir</a>
                </div>

                <div class="h-6 w-px bg-gray-200 mx-2"></div>

                <livewire:search-posts />

                @auth
                    <div class="relative ml-2">
                        <button @click="userMenu = !userMenu" @click.away="userMenu = false" class="flex items-center gap-2 text-sm font-semibold text-gray-700 hover:text-green-600 focus:outline-none transition">
                            <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-700">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <svg class="w-4 h-4 transition-transform" :class="userMenu ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <div x-show="userMenu" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" class="absolute right-0 mt-3 w-48 bg-white border border-gray-100 rounded-xl shadow-xl py-2 z-50" style="display: none;">
                           <div class="w-72 sm:w-80 bg-white rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.15)] border border-slate-100 overflow-hidden">

    <div class="p-5 bg-gradient-to-b from-slate-50 to-white border-b border-slate-100">
        <div class="flex items-center justify-between mb-4">
            <span class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em]">Sesi Kontributor</span>

            <div class="flex items-center gap-1.5 px-2.5 py-1 bg-emerald-50 rounded-full border border-emerald-100">
                <span class="relative flex h-1.5 w-1.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-emerald-500"></span>
                </span>
                <span class="text-[9px] font-bold text-emerald-600 uppercase">Aktif</span>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-full bg-emerald-500 flex items-center justify-center text-white font-bold text-sm shadow-inner">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="flex flex-col">
                <span class="text-sm font-bold text-slate-900 leading-none mb-1">{{ Auth::user()->name }}</span>
                <span class="text-[11px] text-slate-500 truncate w-40">{{ Auth::user()->email }}</span>
            </div>
        </div>
    </div>

    <div class="p-4 space-y-3">
        <div class="p-3.5 bg-slate-50 rounded-2xl border border-slate-100">
            <p class="text-[11px] text-slate-600 leading-relaxed font-medium">
                👋 Kamu sudah bisa berkomentar dan berinteraksi di seluruh berita.
            </p>
        </div>

        <div class="space-y-1">
            @if(Auth::user()->email === 'admin@gmail.com')
                <a href="/admin" class="group flex items-center justify-between w-full p-3 bg-slate-900 hover:bg-red-600 text-white rounded-xl transition-all duration-300 shadow-lg shadow-slate-900/10 hover:shadow-red-600/20">
                    <div class="flex items-center gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        </svg>
                        <span class="text-xs font-bold tracking-wide uppercase">Admin Panel</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 opacity-50 group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2.5 p-3 text-slate-600 hover:text-red-600 hover:bg-red-50 rounded-xl transition-all duration-200 text-xs font-bold uppercase tracking-wider text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Keluar Sesi
                </button>
            </form>
        </div>
    </div>
</div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('auth.choice') }}" class="text-sm font-bold text-white bg-green-600 px-5 py-2 rounded-full hover:bg-green-700 transition shadow-sm" wire:navigate>Login</a>
                @endauth
            </div>

            <div class="xl:hidden flex items-center gap-3">
                <livewire:search-posts />

                <button aria-label="Navbar artikel ini" @click="open = !open" class="text-gray-600 hover:text-green-600 focus:outline-none p-2 rounded-xl bg-gray-50 border border-gray-100 transition-colors">
                    <svg class="w-6 h-6" x-show="!open" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    <svg class="w-6 h-6" x-show="open" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="xl:hidden bg-white border-b border-gray-100 overflow-hidden"
         style="display: none;">

        <div class="px-4 pt-2 pb-6 space-y-1">
            <div class="py-2 text-[10px] font-black uppercase tracking-widest text-gray-400">Main Menu</div>
            <a href="{{ route('web.about') }}" class="block px-4 py-2.5 text-base font-semibold text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-xl transition" wire:navigate>About</a>
            <a href="{{ route('web.contacts') }}" class="block px-4 py-2.5 text-base font-semibold text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-xl transition" wire:navigate>Contacts</a>

            <div class="py-2 text-[10px] font-black uppercase tracking-widest text-gray-400 mt-2">Kategori Berita</div>
            <div class="grid grid-cols-2 gap-1">
                <a href="{{ route('web.category', 'Nasional') }}" class="px-4 py-2.5 text-sm font-bold text-gray-600 hover:text-green-600 transition uppercase" wire:navigate>Nasional</a>
                <a href="{{ route('web.category', 'Riau') }}" class="px-4 py-2.5 text-sm font-bold text-gray-600 hover:text-green-600 transition uppercase" wire:navigate>Riau</a>
                <a href="{{ route('web.category', 'ASN & Kesejahteraan') }}" class="px-4 py-2.5 text-sm font-bold text-gray-600 hover:text-green-600 transition uppercase" wire:navigate>ASN & Kesejahteraan</a>
                <a href="{{ route('web.category', 'PPK & Honorer') }}" class="px-4 py-2.5 text-sm font-bold text-gray-600 hover:text-green-600 transition uppercase" wire:navigate>PPK & Honorer</a>
                <a href="{{ route('web.category', 'PGRI') }}" class="px-4 py-2.5 text-sm font-bold text-gray-600 hover:text-green-600 transition uppercase" wire:navigate>PGRI</a>
                <a href="{{ route('web.category', 'Karir') }}" class="px-4 py-2.5 text-sm font-bold text-gray-600 hover:text-green-600 transition uppercase" wire:navigate>Karir</a>
            </div>

            <hr class="border-gray-100 my-4">

            @auth
                <div class="bg-gray-50 rounded-2xl p-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-green-600 flex items-center justify-center text-white font-bold">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-sm font-black text-gray-800">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="space-y-2">
    <div class="max-w-sm bg-white border border-slate-100 rounded-3xl p-6 shadow-[0_10px_40px_-10px_rgba(0,0,0,0.05)]">
    <div class="flex items-center justify-between mb-6">
        <div class="flex flex-col">
            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-1">Account Control</span>
            <h3 class="font-extrabold text-slate-800 text-lg">Sesi Kontributor</h3>
        </div>
        <div class="flex items-center gap-2 px-3 py-1.5 bg-emerald-50 rounded-full border border-emerald-100">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
            </span>
            <span class="text-[11px] font-bold text-emerald-600 uppercase tracking-wider">Aktif</span>
        </div>
    </div>

    <div class="space-y-4">
        <div class="p-4 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
            <p class="text-sm text-slate-600 leading-relaxed">
                👋 Halo, <span class="font-bold text-slate-900">{{ Auth::user()->name }}</span>!
                Sekarang kamu sudah bisa **berkomentar** dan berinteraksi di seluruh berita kami.
            </p>
        </div>

        @if(Auth::user()->email === 'admin@gmail.com')
            <a href="/admin" class="group flex items-center justify-between w-full px-5 py-3.5 bg-slate-900 hover:bg-red-600 text-white rounded-2xl transition-all duration-300 shadow-lg shadow-slate-900/20 hover:shadow-red-600/30">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-500 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="text-sm font-bold tracking-wide">Akses Admin Panel</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                </svg>
            </a>
                       <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left py-2 text-sm font-bold text-red-600">Logout</button>
                        </form>
        @endif
    </div>
</div>

                    </div>
                </div>
            @else
                <div class="flex flex-col gap-3 pt-2">
                    <a href="{{ route('auth.choice') }}" class="flex justify-center items-center py-3 text-sm font-bold text-gray-700 border-2 border-gray-100 rounded-2xl hover:bg-gray-50 transition" wire:navigate>Login</a>
                    <a href="{{ route('register') }}" class="flex justify-center items-center py-3 text-sm font-bold text-white bg-green-600 rounded-2xl shadow-md" wire:navigate>Daftar Sekarang</a>
                </div>
            @endauth
        </div>
    </div>
</nav>

    <div class="h-16"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <x-dynamicpath />
    </div>

    <main class="py-2">
        @yield('content')
    </main>

@extends('layouts.frontend.layout')
@section('content')
<div class="bg-emerald-50 min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-emerald-200/50 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-green-200/50 rounded-full blur-3xl animate-pulse"></div>

    <div class="max-w-4xl w-full z-10">
        <div class="text-center mb-12">
            <img src="{{ asset('img/logo-v1.png') }}" class="h-20 mx-auto mb-4 drop-shadow-lg" alt="Logo">
            <h1 class="text-3xl font-black text-slate-800 uppercase tracking-tighter">Selamat Datang Ocu!</h1>
            <p class="text-slate-500 font-medium mt-2">Silakan pilih akses masuk sesuai kebutuhan Anda</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">

            <a href="{{route('user.login')}}" class="group relative bg-white/80 backdrop-blur-xl p-8 rounded-[2.5rem] border-2 border-transparent hover:border-emerald-500 transition-all duration-500 shadow-xl hover:shadow-emerald-200/50 flex flex-col items-center text-center overflow-hidden" wire:navigate>
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <i class="fa-solid fa-shield-halved text-8xl text-emerald-900"></i>
                </div>

                <div class="w-20 h-20 bg-emerald-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-emerald-200 group-hover:scale-110 transition-transform duration-500">
                    <i class="fa-solid fa-user-tie text-3xl text-white"></i>
                </div>

                <h3 class="text-xl font-black text-slate-800 mb-3 uppercase tracking-wide">Redaksi & Admin</h3>
                <p class="text-sm text-slate-500 leading-relaxed mb-6">Akses khusus untuk Editor, Jurnalis, dan Administrator untuk mengelola konten berita Kampar.</p>

                <span class="mt-auto px-6 py-2 bg-slate-900 text-white text-xs font-bold rounded-full group-hover:bg-emerald-600 transition-colors">MASUK PANEL ADMIN <i class="fa-solid fa-arrow-right ml-2"></i></span>
            </a>

            {{-- <a href="{{ route('user.login') }}" class="group relative bg-white/80 backdrop-blur-xl p-8 rounded-[2.5rem] border-2 border-transparent hover:border-emerald-500 transition-all duration-500 shadow-xl hover:shadow-emerald-200/50 flex flex-col items-center text-center overflow-hidden" wire:navigate>
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <i class="fa-solid fa-comments text-8xl text-emerald-900"></i>
                </div>

                <div class="w-20 h-20 bg-amber-400 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-amber-100 group-hover:scale-110 transition-transform duration-500">
                    <i class="fa-solid fa-users text-3xl text-white"></i>
                </div>

                <h3 class="text-xl font-black text-slate-800 mb-3 uppercase tracking-wide">Pembaca Setia</h3>
                <p class="text-sm text-slate-500 leading-relaxed mb-6">Masuk sebagai pembaca untuk berdiskusi, memberikan komentar, dan berlangganan berita terbaru.</p>

                <span class="mt-auto px-6 py-2 bg-slate-900 text-white text-xs font-bold rounded-full group-hover:bg-emerald-600 transition-colors">MASUK SEBAGAI USER <i class="fa-solid fa-arrow-right ml-2"></i></span>
            </a> --}}

<div class="group relative bg-gray-500/50 backdrop-blur-xl p-8 rounded-[2.5rem] border-2 border-dashed border-slate-300 transition-all duration-500 flex flex-col items-center text-center overflow-hidden cursor-not-allowed">

    <div class="absolute top-4 left-4 flex items-center gap-2 bg-slate-900 text-white px-3 py-1 rounded-full z-20 shadow-lg">
        <i class="fa-solid fa-lock text-[10px]"></i>
        <span class="text-[9px] font-black uppercase tracking-widest">Coming Soon</span>
    </div>

    <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
        <i class="fa-solid fa-graduation-cap text-8xl text-indigo-900"></i>
    </div>

    <div class="w-20 h-20 bg-indigo-400 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-indigo-100 grayscale group-hover:grayscale-0 transition-all duration-500">
        <i class="fa-solid fa-school text-3xl text-white"></i>
    </div>

    <h3 class="text-xl font-black text-slate-400 mb-3 uppercase tracking-wide group-hover:text-indigo-600 transition-colors">Student & School</h3>
    <p class="text-sm text-slate-400 leading-relaxed mb-6">Ruang kreatif khusus pelajar dan sekolah di Kampar. Publikasikan karya dan prestasi sekolahmu secara gratis.</p>

    <span class="mt-auto px-6 py-2 bg-slate-300 text-white text-xs font-bold rounded-full flex items-center gap-2">
        SEGERA HADIR <i class="fa-solid fa-hourglass-start animate-spin-slow"></i>
    </span>

    <div class="absolute inset-0 bg-white/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-[2px]">
        <div class="bg-slate-900 text-white px-4 py-2 rounded-xl text-[10px] font-bold uppercase tracking-tighter">
            Sedang Tahap Pengembangan
        </div>
    </div>
</div>

        </div>



        <div class="mt-12 text-center">
            <a href="/" class="text-emerald-700 font-bold hover:underline decoration-2 underline-offset-4 transition text-sm" wire:navigate>
                <i class="fa-solid fa-house-chimney mr-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection

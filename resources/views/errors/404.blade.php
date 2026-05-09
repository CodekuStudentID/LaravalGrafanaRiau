@extends('layouts.frontend.layout')

@section('title', 'Alamak, Tersesat Ocu? - Dunia Kampar')

@section('content')
{{-- Container Utama dengan Min-Height Screen agar Footer tetap di bawah --}}
<div class="min-h-[85vh] flex flex-col justify-center items-center relative overflow-hidden bg-white px-4 py-12">
    
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] h-[300px] md:w-[500px] md:h-[500px] bg-emerald-500/5 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="text-center relative z-10 max-w-2xl w-full">
        
        <div class="relative flex flex-col items-center justify-center mb-8">
            <h1 class="text-[120px] md:text-[200px] font-black text-emerald-900/5 leading-none select-none absolute">
                404
            </h1>

            <div class="relative z-10 animate-wiggle">
                <svg width="180" height="180" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-40 h-40 md:w-52 md:h-52">
                    <path d="M170 100C170 138.66 138.66 170 100 170C61.3401 170 30 138.66 30 100C30 61.3401 61.3401 30 100 30C138.66 30 170 61.3401 170 100Z" fill="#065F46" stroke="#047857" stroke-width="4"/>
                    <circle cx="75" cy="85" r="10" fill="white" stroke="#1F2937" stroke-width="3"/>
                    <circle cx="75" cy="85" r="4" fill="#1F2937"/>
                    <circle cx="125" cy="85" r="10" fill="white" stroke="#1F2937" stroke-width="3"/>
                    <circle cx="125" cy="85" r="4" fill="#1F2937"/>
                    <path d="M80 120C85 115 95 115 100 120C105 125 115 125 120 120" stroke="white" stroke-width="4" stroke-linecap="round"/>
                    <path d="M60 165L80 150L100 165L120 150L140 165" stroke="#047857" stroke-width="4" stroke-linecap="round"/>
                    <rect x="135" y="115" width="45" height="60" rx="4" transform="rotate(15 135 115)" fill="#FBBF24" stroke="#B45309" stroke-width="3"/>
                    <path d="M148 135L165 165M142 155L170 145" stroke="#B45309" stroke-width="2" stroke-linecap="round"/>
                    <text x="148" y="185" transform="rotate(15 148 185)" fill="#B45309" font-family="sans-serif" font-weight="bold" font-size="10">MAP</text>
                </svg>
            </div>
        </div>

        <div class="px-4">
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 mb-4 tracking-tight">
                Alamak! Jalan Ke Sini <span class="text-emerald-600">Putus</span>, Cu.
            </h2>
            <p class="text-slate-500 text-sm md:text-lg mb-10 leading-relaxed max-w-lg mx-auto">
                Sepertinya Ocu salah belok atau alamatnya sudah pindah. Tenang, si <span class="text-emerald-700 font-bold">Ocu Patin</span> bakal bantu Ocu balik ke jalur yang benar.
            </p>

            <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                <a href="{{ url('/') }}" 
                   class="w-full md:w-auto px-10 py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-2xl transition-all shadow-xl shadow-emerald-100 hover:scale-105 flex items-center justify-center gap-2" wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    Balik ke Beranda
                </a>
                
                <button onclick="history.back()" 
                        class="w-full md:w-auto px-10 py-4 bg-white text-slate-700 font-bold rounded-2xl border border-slate-200 hover:bg-slate-50 transition-all flex items-center justify-center gap-2 shadow-sm" wire:navigate>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Halaman Sebelumnya
                </button>
            </div>
        </div>
    </div>
</div>

{{-- CSS Khusus untuk Animasi --}}
<style>
    @keyframes wiggle {
        0%, 100% { transform: rotate(-3deg) translateY(0); }
        50% { transform: rotate(3deg) translateY(-10px); }
    }
    .animate-wiggle {
        animation: wiggle 3s ease-in-out infinite;
    }
</style>
@endsection
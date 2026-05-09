@extends('layouts.frontend.layout')
@section('content')
    <div class="relative pb-20">
    <section class="max-w-7xl mx-auto px-4 pt-16 pb-12 text-center">
        <h6 class="text-emerald-600 font-black uppercase tracking-[0.3em] text-xs mb-4">Tentang DuniaKampar</h6>
        <h1 class="text-4xl md:text-6xl font-black text-slate-900 leading-tight mb-6">
            Membawa Cerita <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-green-400">Ocu Kampar</span> <br>ke Jendela Dunia.
        </h1>
        <p class="max-w-2xl mx-auto text-slate-500 leading-relaxed text-lg">
            Lebih dari sekadar portal berita. Kami adalah ruang kolaborasi, arsip digital, dan suara bagi setiap sudut Bumi Lancang Kuning.
        </p>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">

            <div class="md:col-span-8 group relative overflow-hidden rounded-[2.5rem] bg-emerald-900 h-[400px]">
                <img 
                src="{{asset('img/ulu-kasok.webp')}}"
                class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:scale-105 transition duration-700" 
                alt="Kampar Culture"
                width="150" 
                height="50"
                fetchpriority="high"
                loading="eager"
                class="object-contain"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-emerald-900 via-transparent p-10 flex flex-col justify-end">
                    <h3 class="text-white text-3xl font-black mb-4">Akar Lokal, Visi Global</h3>
                    <p class="text-emerald-100 max-w-lg">
                        DuniaKampar lahir dari kerinduan akan informasi yang akurat, cepat, dan mendalam tentang kemajuan daerah. Kami merawat tradisi lewat teknologi.
                    </p>
                </div>
            </div>

            <div class="md:col-span-4 rounded-[2.5rem] bg-white border border-emerald-100 p-10 flex flex-col justify-center shadow-xl shadow-emerald-900/5">
                <div class="mb-6">
                    <span class="text-5xl font-black text-emerald-600">100%</span>
                    <p class="font-bold text-slate-800 mt-2 uppercase tracking-tighter">Konten Orisinal Ocu</p>
                </div>
                <p class="text-slate-500 text-sm italic border-l-4 border-emerald-500 pl-4">
                    "Setiap baris kalimat yang kami tulis adalah bentuk dedikasi untuk tanah kelahiran."
                </p>
            </div>

            <div class="md:col-span-5 rounded-[2.5rem] bg-emerald-50 p-10 border border-white">
                <h3 class="text-2xl font-black text-slate-900 mb-4 uppercase">Wadah Kolaborasi</h3>
                <p class="text-slate-600 mb-6">
                    Kami membuka pintu seluas-luasnya bagi organisasi, komunitas, dan jurnalis warga untuk berbagi inspirasi di platform kami.
                </p>
                <div class="flex -space-x-4">
                    <div class="w-12 h-12 rounded-full bg-emerald-200 border-2 border-white flex items-center justify-center font-bold text-emerald-700">O</div>
                    <div class="w-12 h-12 rounded-full bg-green-200 border-2 border-white flex items-center justify-center font-bold text-green-700">C</div>
                    <div class="w-12 h-12 rounded-full bg-teal-200 border-2 border-white flex items-center justify-center font-bold text-teal-700">U</div>
                </div>
            </div>

            <div class="md:col-span-7 group relative overflow-hidden rounded-[2.5rem] bg-slate-200 h-[300px]">
                <img 
                src="{{asset('img/kolaborasi.webp')}}"
                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700" 
                alt="Media Digital"
                width="150" 
                height="50"
                fetchpriority="high"
                loading="eager"
                class="object-contain"
                >
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition"></div>
            </div>

        </div>
    </section>
</div>
@endsection

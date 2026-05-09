@extends('layouts.frontend.layout')
@section('content')

<div class="min-h-screen flex items-center justify-center bg-slate-50 py-12 px-4 sm:px-6 lg:px-8 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:24px_24px]">
    
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h1 class="text-4xl font-black tracking-tighter text-slate-900">
                BULLETIN<span class="text-green-600">KAMPAR</span>
            </h1>
            <h2 class="mt-4 text-xl font-bold text-slate-800">
                Buat Akun Baru
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                Silakan isi data untuk bergabung sebagai kontributor.
            </p>
        </div>

        <div class="bg-white p-8 sm:p-10 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100">
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div class="space-y-1">
                    <label for="name" class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Nama Lengkap</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" 
                           class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 focus:bg-white transition-all text-slate-700"
                           placeholder="Jhon Doe" required autofocus />
                    @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-1">
                    <label for="email" class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" 
                           class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 focus:bg-white transition-all text-slate-700"
                           placeholder="admin@kampar.com" required />
                    @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <div class="space-y-1">
                        <label for="password" class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Kata Sandi</label>
                        <input id="password" type="password" name="password" 
                               class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 focus:bg-white transition-all text-slate-700"
                               placeholder="••••••••" required />
                    </div>
                    
                    <div class="space-y-1">
                        <label for="password_confirmation" class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Konfirmasi Sandi</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" 
                               class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 focus:bg-white transition-all text-slate-700"
                               placeholder="••••••••" required />
                    </div>
                </div>
                @error('password') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror

                <div class="pt-2">
                    <button type="submit" 
                            class="w-full py-4 bg-[#10B981] hover:bg-[#059669] text-white font-bold rounded-xl shadow-md transition-all duration-300 transform active:scale-95 uppercase tracking-widest text-sm">
                        Daftar Akun
                    </button>
                </div>

                <div class="text-center pt-4">
                    <p class="text-sm text-slate-500">
                        Sudah punya akun? 
                        <a href="{{ route('user.login') }}" class="font-bold text-emerald-600 hover:text-emerald-700 transition-colors underline decoration-2 underline-offset-4">
                            Masuk Disini
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <p class="text-center text-slate-400 text-[10px] font-bold uppercase tracking-widest">
            &copy; {{ date('Y') }} Bulletin Kampar Digital Media
        </p>
    </div>
</div>

@endsection
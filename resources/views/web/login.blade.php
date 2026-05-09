
@extends('layouts.frontend.layout')
@section('content')

<body class="bg-[#F8FAFC] antialiased grid-pattern">

    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        
        <div class="w-full max-w-md">
            <div class="text-center mb-10">
                <a href="/" class="inline-block transition-transform hover:scale-105">
                    <h1 class="text-4xl font-extrabold tracking-tight text-[#0F172A]">
                        BULLETIN<span class="text-[#DC2626]">KAMPAR</span>
                    </h1>
                </a>
                <p class="text-[#64748B] text-sm mt-3 font-medium">Selamat Datang di Panel Kontributor</p>
            </div>

            <div class="bg-white rounded-3xl shadow-[0_15px_60px_-15px_rgba(0,0,0,0.1)] border border-[#EDF2F7] overflow-hidden">
                <div class="p-8 sm:p-11">
                    
                    @if (session('status'))
                        <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 text-sm rounded-r-lg">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-semibold text-[#1E293B] mb-2">Alamat Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                   class="w-full px-5 py-4 bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl focus:ring-4 focus:ring-emerald-100/50 focus:border-emerald-500 transition-all duration-200 outline-none text-[#1E293B] placeholder:text-[#94A3B8]"
                                   placeholder="nama@email.com" required autofocus autocomplete="username" />
                            @if($errors->has('email'))
                                <p class="mt-2 text-xs text-red-600 font-medium">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div>
                            <div class="flex justify-between mb-2">
                                <label for="password" class="block text-sm font-semibold text-[#1E293B]">Kata Sandi</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-xs font-semibold text-emerald-700 hover:text-emerald-900">Lupa?</a>
                                @endif
                            </div>
                            <input id="password" type="password" name="password" 
                                   class="w-full px-5 py-4 bg-[#F8FAFC] border border-[#E2E8F0] rounded-2xl focus:ring-4 focus:ring-emerald-100/50 focus:border-emerald-500 transition-all duration-200 outline-none text-[#1E293B] placeholder:text-[#94A3B8]"
                                   placeholder="••••••••" required autocomplete="current-password" />
                            @if($errors->has('password'))
                                <p class="mt-2 text-xs text-red-600 font-medium">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <div class="flex items-center">
                            <input id="remember_me" type="checkbox" name="remember" 
                                   class="w-5 h-5 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500 cursor-pointer">
                            <label for="remember_me" class="ml-3 text-sm font-medium text-[#475569] cursor-pointer">Ingat saya</label>
                        </div>

                        <button type="submit" 
                                class="w-full py-4 bg-[#10B981] hover:bg-[#059669] text-white font-bold rounded-2xl shadow-lg shadow-emerald-500/30 transition-all duration-300 transform active:scale-[0.98] uppercase tracking-wider text-sm">
                            MASUK SEKARANG
                        </button>

                        @if (Route::has('register'))
                            <div class="text-center mt-9 pt-6 border-t border-[#F1F5F9]">
                                <p class="text-sm text-[#64748B]">
                                    Belum memiliki akun? 
                                    <a href="{{ route('user.register') }}" class="font-bold text-[#0F172A] hover:text-emerald-700 transition-colors">Daftar Sekarang</a>
                                </p>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            <p class="text-center mt-12 text-[#94A3B8] text-xs font-medium tracking-widest uppercase">
                &copy; {{ date('Y') }} Bulletin Kampar Digital Media
            </p>
        </div>
    </div>

</body>
    
@endsection
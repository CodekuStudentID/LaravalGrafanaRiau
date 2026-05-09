@extends('layouts.frontend.layout')
@section('content')
<div class="py-12 flex items-center justify-center bg-green-50">
    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-lg border border-green-100 text-center">
        <div class="mb-6 inline-flex p-4 bg-green-100 text-green-600 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>

        <h1 class="text-2xl font-bold text-gray-800 mb-2">System Maintenance</h1>
        <p class="text-sm text-gray-500 mb-8">Panel kendali artisan untuk sinkronisasi server produksi.</p>

        <div class="grid grid-cols-1 gap-4">
            <a href="{{ url('/cek-koneksi') }}"
               class="px-4 py-3 bg-gray-800 text-white rounded-lg font-medium hover:bg-gray-900 transition shadow-sm">
                🔍 Cek Koneksi
            </a>

            <a href="{{ url('/gas-deploy') }}"
               onclick="return confirm('Apakah Anda yakin ingin menjalankan seluruh perintah deploy di server?')"
               class="px-4 py-3 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition shadow-sm">
                🚀 Jalankan Deploy (All-in-One)
            </a>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-100">
            <p class="text-xs text-gray-400">Pastikan database sudah dikonfigurasi di file .env sebelum eksekusi.</p>
        </div>
    </div>
</div>
@endsection

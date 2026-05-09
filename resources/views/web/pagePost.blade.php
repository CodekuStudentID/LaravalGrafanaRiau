@extends('layouts.frontend.layout')

@section('content')
<div class="bg-white min-h-screen">

    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="flex items-center bg-red-50 border-l-4 border-red-600 p-2 mb-6">
            <span class="font-bold text-red-600 px-3 text-sm italic uppercase">Breaking</span>
            <marquee class="text-sm font-medium text-gray-700">
                @foreach($nasional as $n) {{ $n->title }} • @endforeach
            </marquee>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <div class="lg:col-span-7">
                @if($nasional->first())
                <div class="relative group overflow-hidden rounded-lg">
                    <img src="{{ asset('storage/posts/'.$nasional->first()->images) }}" class="w-full h-[450px] object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent"></div>
                    <div class="absolute bottom-0 p-6 text-white">
                        <span class="bg-red-600 px-3 py-1 text-xs font-bold uppercase mb-2 inline-block">Nasional</span>
                        <h2 class="text-3xl font-bold leading-tight hover:underline">
                            <a href="{{ route('web.detail', $nasional->first()->slug) }}">{{ $nasional->first()->title }}</a>
                        </h2>
                        <div class="flex items-center mt-3 text-sm opacity-80 space-x-4">
                            <span><i class="far fa-eye mr-1"></i> {{ $nasional->first()->views }}</span>
                            <span><i class="far fa-thumbs-up mr-1"></i> {{ $nasional->first()->likes }}</span>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <div class="lg:col-span-5 space-y-4">
                @foreach($nasional->skip(1) as $n)
                <div class="flex space-x-4 border-b border-gray-100 pb-3 group">
                    <img src="{{ asset('storage/posts/'.$n->images) }}" class="w-24 h-24 object-cover rounded shadow-sm">
                    <div>
                        <h3 class="font-bold text-sm leading-snug group-hover:text-red-600">
                            <a href="{{ route('web.detail', $n->slug) }}">{{ $n->title }}</a>
                        </h3>
                        <p class="text-[10px] text-gray-400 mt-1 uppercase">{{ $n->date }} | {{ $n->category }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-10 border-y border-gray-200">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-12 gap-8">

            <div class="lg:col-span-8">
                <div class="flex items-center justify-between border-b-2 border-blue-600 mb-6">
                    <h2 class="bg-blue-600 text-white px-4 py-1 font-bold uppercase tracking-widest text-sm">Internasional</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($internasional as $i)
                    <article class="bg-white shadow-sm border border-gray-200">
                        <img src="{{ asset('storage/posts/'.$i->images) }}" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h3 class="font-bold text-sm mb-2 hover:text-blue-600">
                                <a href="{{ route('web.detail', $i->slug) }}">{{ $i->title }}</a>
                            </h3>
                            <div class="flex justify-between text-[10px] text-gray-400">
                                <span><i class="far fa-eye"></i> {{ $i->views }}</span>
                                <span>{{ $i->date }}</span>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-4">
                <h2 class="font-bold text-xl mb-6 border-b-2 border-gray-800 pb-2 uppercase italic">Paling <span class="text-red-600">Populer</span></h2>
                <div class="space-y-6">
                    @foreach($populer as $p)
                    <div class="flex items-center space-x-4 group">
                        <div class="text-3xl font-black text-gray-200 group-hover:text-red-600 transition">0{{ $loop->iteration }}</div>
                        <h4 class="text-sm font-bold leading-tight hover:underline">
                            <a href="{{ route('web.detail', $p->slug) }}">{{ $p->title }}</a>
                        </h4>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div>
                <h2 class="font-bold uppercase border-l-4 border-green-600 pl-3 mb-6">Ekonomi</h2>
                @foreach($ekonomi as $e)
                <div class="mb-4 border-b border-gray-50 pb-3">
                    <p class="text-[10px] font-bold text-green-600 uppercase mb-1">{{ $e->date }}</p>
                    <a href="{{ route('web.detail', $e->slug) }}" class="font-bold text-sm hover:underline tracking-tight block">{{ $e->title }}</a>
                </div>
                @endforeach
            </div>

            <div>
                <h2 class="font-bold uppercase border-l-4 border-yellow-600 pl-3 mb-6">Budaya</h2>
                @foreach($budaya as $b)
                <div class="flex space-x-3 mb-4">
                    <img src="{{ asset('storage/posts/'.$b->images) }}" class="w-16 h-16 rounded object-cover">
                    <a href="{{ route('web.detail', $b->slug) }}" class="font-bold text-[13px] hover:text-yellow-600 leading-snug">{{ $b->title }}</a>
                </div>
                @endforeach
            </div>

            <div>
                <h2 class="font-bold uppercase border-l-4 border-purple-600 pl-3 mb-6">Teknologi</h2>
                @foreach($teknologi as $t)
                <div class="flex items-center space-x-3 mb-4 group">
                    <div class="w-2 h-2 bg-purple-600 rounded-full"></div>
                    <a href="{{ route('web.detail', $t->slug) }}" class="text-sm font-medium group-hover:text-purple-600">{{ $t->title }}</a>
                </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-center italic uppercase">Hiburan & <span class="text-pink-500">Lifestyle</span></h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($hiburan as $h)
                <div class="relative group cursor-pointer overflow-hidden rounded-xl">
                    <img src="{{ asset('storage/posts/'.$h->images) }}" class="w-full h-72 object-cover opacity-60 group-hover:opacity-100 group-hover:scale-110 transition duration-700">
                    <div class="absolute bottom-0 p-4 w-full bg-gradient-to-t from-black">
                        <p class="text-[10px] text-pink-400 font-bold uppercase">Hiburan</p>
                        <h4 class="text-sm font-bold leading-tight">{{ $h->title }}</h4>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection

@extends('layouts.frontend.layout')
@section('meta_description', Str::limit(strip_tags($post->konten), 150))
@section('content')
<style>

.article-content {
  line-height: 1.8;
  font-size: 16px;
  color: #333;
}

/* PARAGRAF */
.article-content p {
  margin-bottom: 16px;
}

/* HEADING */
.article-content h2 {
  font-size: 28px;
  font-weight: 700;
  margin-top: 32px;
  margin-bottom: 12px;
}

.article-content h3 {
  font-size: 22px;
  font-weight: 600;
  margin-top: 24px;
  margin-bottom: 10px;
}

/* LIST */
.article-content ul,
.article-content ol {
  padding-left: 20px;
  margin-bottom: 16px;
}

/* BLOCKQUOTE */
.article-content blockquote {
  border-left: 4px solid #ddd;
  padding-left: 12px;
  margin: 16px 0;
  font-style: italic;
  color: #666;
}

/* CODE BLOCK */
.article-content pre {
  background: #1e1e1e;
  color: #fff;
  padding: 12px;
  border-radius: 6px;
  overflow-x: auto;
}

/* LINK */
.article-content a {
  color: #2563eb;
  text-decoration: underline;
}

.article-content {
  max-width: 750px !important;
  margin-left: auto !important;
  margin-right: auto !important;
  padding-left: 16px;
  padding-right: 16px;

  word-break: break-word;
}
</style>
    <div class="bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

                <div class="lg:col-span-8">

                    <header class="mb-8">
                        <h1 class="text-3xl md:text-5xl font-black text-slate-900 leading-[1.1] mb-6 tracking-tight">
                            {{ $post->title }}
                        </h1>

                        <div
                            class="flex flex-col md:flex-row md:items-center justify-between border-y border-gray-100 py-6 gap-6">
                            <div class="flex items-center space-x-4">
                                <div
                                    class="w-12 h-12 bg-gradient-to-br from-green-600 to-green-800 rounded-2xl flex items-center justify-center font-bold text-white shadow-lg shadow-green-100 rotate-3">
                                    {{ substr($post->author ?? 'R', 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-black text-slate-900 uppercase tracking-tight">
                                        {{ $post->author ?? 'Redaksi Buletin Kampar' }}</p>
                                    <p class="text-xs text-slate-500 font-medium">
                                        {{ $post->created_at->translatedFormat('l, d F Y | H:i') }} WIB</p>
                                </div>
                            </div>



                            <div style="display:flex; gap:10px; flex-wrap:wrap;">

                                <button onclick="shareFacebook()"
                                    style="padding:8px 12px; background:#1877F2; color:white; border:none; border-radius:6px;">
                                    Facebook
                                </button>

                                <button onclick="shareWhatsApp()"
                                    style="padding:8px 12px; background:#25D366; color:white; border:none; border-radius:6px;">
                                    WhatsApp
                                </button>

                                <button onclick="shareX()"
                                    style="padding:8px 12px; background:black; color:white; border:none; border-radius:6px;">
                                    X / Twitter
                                </button>

                                <button onclick="shareTelegram()"
                                    style="padding:8px 12px; background:#229ED9; color:white; border:none; border-radius:6px;">
                                    Telegram
                                </button>

                                <button onclick="shareLinkedIn()"
                                    style="padding:8px 12px; background:#0A66C2; color:white; border:none; border-radius:6px;">
                                    LinkedIn
                                </button>

                                <button onclick="copyLink()"
                                    style="padding:8px 12px; background:#16a34a; color:white; border:none; border-radius:6px;">
                                    Salin Link
                                </button>

                            </div>

                        </div>
                    </header>

                    <div class="relative group mb-12">
                        <div
                            class="relative overflow-hidden rounded-[2.5rem] shadow-2xl border-4 border-white shadow-slate-200">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/20 z-10 pointer-events-none">
                            </div>

                            <img src="{{ asset('storage/' . $post->images) }}" alt="{{ $post->title }}"
                                class="w-full h-auto max-h-[550px] object-cover scale-105 group-hover:scale-100 transition-transform duration-1000">

                            <div
                                class="absolute top-6 right-6 z-20 bg-white/90 backdrop-blur-md px-4 py-2 rounded-2xl shadow-xl border border-white/50">
                                <p class="text-xs font-black text-slate-900 flex items-center uppercase tracking-widest">
                                    <i class="far fa-eye mr-2 text-green-600"></i> {{ number_format($post->views ?? 0) }}
                                    Views
                                </p>
                            </div>
                        </div>
                    </div>

                    <article>
                        <div class="prose prose-lg max-w-none mb-6 px-2">
                            <div
                                class="text-slate-800 leading-[1.8] text-justify md:text-left
                    first-letter:text-6xl first-letter:font-black
                    first-letter:text-green-700 first-letter:mr-3 first-letter:float-left">

                                <div class="my-4">
                                    <ins class="adsbygoogle" style="display:block; text-align:center;"
                                        data-ad-layout="in-article" data-ad-format="fluid"
                                        data-ad-client="ca-pub-5365219857720500" data-ad-slot="3172329561"></ins>
                                    <script>
                                        (adsbygoogle = window.adsbygoogle || []).push({});
                                    </script>
                                </div>

                                <div class="max-w-3xl mx-auto px-4 article-content">
    {!! $post->content !!}
</div>
                            </div>
                        </div>
                    </article>
                    <div
                        class="flex flex-wrap items-center justify-between gap-6 p-8 bg-slate-50 rounded-[2rem] border border-slate-100 mb-16">
                        <div class="flex items-center space-x-8">
                            <livewire:like-button :post="$post" :key="$post->id" />
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-black text-slate-400 uppercase tracking-widest mr-2">Category:</span>
                            <span
                                class="px-4 py-1.5 bg-white border border-slate-200 rounded-full text-xs font-bold text-green-700 shadow-sm">
                                #{{ $post->category }}

                        </div>
                    </div>

                    <section class="space-y-12">
                        <div class="flex items-center space-x-4">
                            <h3 class="text-2xl font-black text-slate-900 uppercase tracking-tight">Komentar</h3>
                            <div class="h-1 flex-1 bg-slate-100 rounded-full"></div>
                            <span class="text-sm font-bold text-slate-400">({{ $post->comments->count() }})</span>
                        </div>

                        @livewire('post-comment', ['postId' => $post->id])

                        <div class="grid grid-cols-1 gap-6 mt-8">
                            @forelse($post->comments as $comment)
                                <div
                                    class="flex gap-5 p-6 bg-white rounded-[2rem] border border-slate-100 shadow-sm hover:shadow-md transition">
                                    <div
                                        class="flex-shrink-0 w-12 h-12 bg-green-50 text-green-700 rounded-2xl flex items-center justify-center font-black border border-green-100 shadow-inner">
                                        {{ substr($comment->name, 0, 1) }}
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-bold text-slate-900">{{ $comment->name }}</h4>
                                            <span
                                                class="text-[10px] font-black text-slate-300 uppercase tracking-widest">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-slate-600 text-sm leading-relaxed">{{ $comment->body }}</p>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="text-center py-12 bg-slate-50 rounded-[2.5rem] border-2 border-dashed border-slate-200 text-slate-400 italic">
                                    Belum ada diskusi di sini. Mulailah percakapan!
                                </div>
                            @endforelse
                        </div>
                    </section>
                </div>

                <aside class="lg:col-span-4 space-y-12">
                    <div class="bg-slate-900 rounded-[2.5rem] p-8 text-white shadow-2xl shadow-slate-200 sticky top-24">
                        <h2 class="text-2xl font-black mb-8 flex items-center tracking-tight">
                            <span class="w-2 h-8 bg-yellow-500 mr-4 rounded-full"></span> Terpopuler
                        </h2>

                        <div class="space-y-8">
                            @foreach ($popularPosts as $index => $item)
                                <div class="flex gap-5 group items-start">
                                    <div
                                        class="text-3xl font-black text-slate-700 group-hover:text-yellow-500 transition-colors">
                                        0{{ $index + 1 }}</div>
                                    <div class="space-y-2">
                                        <a href="{{ route('web.show', $item->slug) }}"
                                            class="font-bold text-sm leading-snug group-hover:text-green-400 transition-colors line-clamp-2">
                                            {{ $item->title }}
                                        </a>
                                        <div
                                            class="flex items-center text-[10px] font-bold uppercase tracking-widest text-slate-500">
                                            <span class="text-yellow-500 mr-2">{{ $item->views }} views</span>
                                            <span>� {{ $item->created_at->format('M Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-10 pt-8 border-t border-slate-800">
                            <a href="/"
                                class="block w-full py-4 bg-green-700 hover:bg-green-600 text-center rounded-2xl font-black text-xs uppercase tracking-[0.2em] transition shadow-xl">
                                Lihat Semua Berita
                            </a>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="mt-32 pt-16 border-t border-slate-100">
                <h2 class="text-3xl font-black mb-12 text-slate-900 flex items-center">
                    Rekomendasi <span class="text-green-700 ml-2 italic">Untuk Anda</span>
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach ($latestPosts as $item)
                        <a href="{{ route('web.show', $item->slug) }}" class="group block space-y-4">
                            <div class="relative aspect-[4/3] overflow-hidden rounded-3xl shadow-lg border-2 border-white">
                                <div
                                    class="absolute inset-0 bg-black/20 z-10 group-hover:bg-transparent transition duration-500">
                                </div>
                                <img src="{{ asset('storage/' . $item->images) }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700"
                                    loading="lazy">
                            </div>
                            <h3
                                class="font-bold text-sm leading-tight text-slate-800 group-hover:text-green-700 transition line-clamp-2">
                                {{ $item->title }}
                            </h3>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        // Tunggu 5 detik (5000 ms) setelah halaman dimuat sepenuhnya
        setTimeout(function() {
            fetch("{{ route('posts.track-view', $post->id) }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}", // Wajib di Laravel
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        id: "{{ $post->id }}"
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Views tracked:", data.status);
                })
                .catch(error => {
                    console.error("Error tracking view:", error);
                });
        }, 5000);

        const url = window.location.href;

        function shareFacebook() {
            window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url), "_blank");
        }

        function shareWhatsApp() {
            window.open("https://wa.me/?text=" + encodeURIComponent(url), "_blank");
        }

        function shareX() {
            window.open("https://x.com/intent/tweet?url=" + encodeURIComponent(url), "_blank");
        }

        function shareTelegram() {
            window.open("https://t.me/share/url?url=" + encodeURIComponent(url), "_blank");
        }

        function shareLinkedIn() {
            window.open("https://www.linkedin.com/sharing/share-offsite/?url=" + encodeURIComponent(url), "_blank");
        }

        function copyLink() {
            navigator.clipboard.writeText(url)
                .then(() => alert("Link berhasil disalin"))
                .catch(() => alert("Gagal menyalin link"));
        }
    </script>


@endsection

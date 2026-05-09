@extends('layouts.frontend.layout')
@section('content')
<div class="bg-gray-50 min-h-screen py-12 md:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="bg-white shadow-xl shadow-green-900/5 border border-gray-100 rounded-3xl p-8 md:p-12">

            <header class="border-b border-gray-100 pb-8 mb-10">
                <h1 class="text-3xl md:text-4xl font-black text-green-900 mb-4 tracking-tight">
                    Terms & Conditions
                </h1>
                <p class="text-gray-400 text-sm italic">
                    Syarat dan Ketentuan Penggunaan Layanan dunia-kampar.my.id
                </p>
            </header>

            <div class="space-y-8 text-gray-600 leading-relaxed text-justify">

                <section>
                    <h2 class="text-xl font-bold text-green-900 mb-3 flex items-center">
                        <span class="bg-green-100 text-green-700 w-8 h-8 rounded-lg flex items-center justify-center mr-3 text-sm">01</span>
                        Penerimaan Ketentuan
                    </h2>
                    <p>Dengan mengakses dan menggunakan <strong>dunia-kampar.my.id</strong>, Anda dianggap telah membaca, memahami, dan setuju untuk terikat dengan syarat dan ketentuan ini. Jika Anda tidak setuju, mohon untuk tidak melanjutkan penggunaan situs ini.</p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-green-900 mb-3 flex items-center">
                        <span class="bg-green-100 text-green-700 w-8 h-8 rounded-lg flex items-center justify-center mr-3 text-sm">02</span>
                        Hak Kekayaan Intelektual
                    </h2>
                    <p>Seluruh konten yang dipublikasikan di situs ini (termasuk namun tidak terbatas pada teks, foto, grafis, dan logo) adalah milik Dunia Kampar atau penyedia konten pihak ketiga. Dilarang keras menyalin, memproduksi ulang, atau menyebarluaskan konten tanpa izin tertulis atau mencantumkan sumber asli secara jelas.</p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-green-900 mb-3 flex items-center">
                        <span class="bg-green-100 text-green-700 w-8 h-8 rounded-lg flex items-center justify-center mr-3 text-sm">03</span>
                        Batasan Tanggung Jawab
                    </h2>
                    <p class="bg-yellow-50 p-4 rounded-xl border-l-4 border-yellow-400 text-gray-700">
                        Informasi yang kami sediakan bertujuan sebagai informasi umum. Kami berupaya menjaga keakuratan data, namun tidak bertanggung jawab atas kerugian yang timbul akibat kesalahan informasi atau ketidaktersediaan akses ke situs.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-green-900 mb-3 flex items-center">
                        <span class="bg-green-100 text-green-700 w-8 h-8 rounded-lg flex items-center justify-center mr-3 text-sm">04</span>
                        Komentar dan Konten Pengguna
                    </h2>
                    <p>Pengguna dilarang memposting konten yang mengandung unsur SARA, ujaran kebencian, fitnah, atau melanggar hukum Republik Indonesia. Kami berhak menghapus konten pengguna yang dianggap tidak layak tanpa pemberitahuan sebelumnya.</p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-green-900 mb-3 flex items-center">
                        <span class="bg-green-100 text-green-700 w-8 h-8 rounded-lg flex items-center justify-center mr-3 text-sm">05</span>
                        Perubahan Ketentuan
                    </h2>
                    <p>Dunia Kampar berhak mengubah Syarat dan Ketentuan ini sewaktu-waktu. Perubahan akan berlaku segera setelah dipublikasikan di halaman ini. Kami menyarankan Anda memeriksa halaman ini secara berkala.</p>
                </section>

            </div>

            <footer class="mt-16 pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center text-gray-400 text-xs gap-4">
                <p>&copy; {{ date('Y') }} Dunia Kampar - Negeri Seribu Parit.</p>
                <div class="flex space-x-4 italic">
                    <a href="/privacy-policy" class="hover:text-green-700 underline">Privacy Policy</a>
                    <span>|</span>
                    <a href="/contact" class="hover:text-green-700 underline">Hubungi Kami</a>
                </div>
            </footer>

        </article>
    </div>
</div>
@endsection

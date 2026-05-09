@extends('layouts.frontend.layout')
@section('content')
    <div class="container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-gray-800 uppercase tracking-tighter">Hubungi Redaksi</h1>
        <div class="h-1 w-20 bg-blue-600 mx-auto mt-2"></div>
        <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
            Punya informasi berita, saran, atau ingin bekerjasama dengan **Bulletin Kampar**? Silakan hubungi kami melalui saluran di bawah ini.
        </p>
    </div>

    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow">
            <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-envelope text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-800">Email Resmi</h3>
            <p class="text-gray-500 text-sm mb-4">Kirimkan rilis berita atau dokumen</p>
            <a href="mailto:rahmattaufik14720@gmail.com" class="text-blue-600 font-semibold break-all">
                rahmattaufik14720@gmail.com
            </a>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow">
            <div class="w-16 h-16 bg-green-50 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fab fa-whatsapp text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-800">WhatsApp / HP</h3>
            <p class="text-gray-500 text-sm mb-4">Respon cepat via pesan instan</p>
            <a href="https://wa.me/628217711216" target="_blank" class="text-green-600 font-semibold">
                0821-7711-216
            </a>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 text-center hover:shadow-md transition-shadow">
            <div class="w-16 h-16 bg-red-50 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-map-marker-alt text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-800">Lokasi Kami</h3>
            <p class="text-gray-500 text-sm mb-4">Air Tiris, Kec. Kampar</p>
            <p class="text-gray-700 font-medium">Kabupaten Kampar, Riau</p>
        </div>

    </div>

    <div class="max-w-5xl mx-auto mt-12">
        <div class="bg-gray-900 text-white p-8 rounded-3xl overflow-hidden relative">
            <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-bold mb-4">Kenapa Hubungi Kami?</h2>
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-3 text-gray-300">
                            <span class="text-blue-400">✔</span>
                            <span>Menyampaikan aspirasi warga Kampar</span>
                        </li>
                        <li class="flex items-center space-x-3 text-gray-300">
                            <span class="text-blue-400">✔</span>
                            <span>Kerjasama periklanan (Ads & Promosi)</span>
                        </li>
                        <li class="flex items-center space-x-3 text-gray-300">
                            <span class="text-blue-400">✔</span>
                            <span>Hak jawab dan klarifikasi pemberitaan</span>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col justify-center">
                    <p class="text-gray-400 text-sm italic border-l-4 border-blue-600 pl-4">
                        "Menjadi jembatan informasi terpercaya bagi masyarakat Air Tiris dan sekitarnya."
                    </p>
                    <div class="mt-6 flex space-x-4">
                        <span class="text-xs uppercase tracking-widest text-gray-500 font-bold">Media Sosial: @bulletinkampar</span>
                    </div>
                </div>
            </div>
            <div class="absolute top-0 right-0 -mt-8 -mr-8 w-40 h-40 bg-blue-600 rounded-full blur-3xl opacity-20"></div>
        </div>
    </div>
</div>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "mainEntity": {
    "@type": "Organization",
    "name": "Bulletin Kampar",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Air Tiris",
      "addressRegion": "Kampar, Riau",
      "addressCountry": "ID"
    },
    "email": "rahmattaufik14720@gmail.com",
    "telephone": "+62-821-7711-216"
  }
}
</script>
@endsection

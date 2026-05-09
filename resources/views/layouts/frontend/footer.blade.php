{{-- resources/views/footer.blade.php --}}
<footer class="bg-gray-900 text-white pt-10 pb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- Logo & Deskripsi --}}
        <div>
            <div class="flex items-center space-x-3 mb-4">
                {{-- Logo 1: Logo Kampar --}}
                <img src="{{ asset('img/logo-kampar.jpeg') }}" class="h-10 w-auto" alt="Logo Kampar">

                {{-- Logo 2: Logo Bulletin Kampar (Ganti path-nya sesuai file kamu) --}}
                <img src="{{ asset('img/logo-v1.png') }}" class="h-10 w-auto" alt="Logo Bulletin Kampar">

                <div class="border-l border-gray-700 pl-3">
                    <span class="block text-green-500 font-bold text-xl leading-none">Bulletin</span>
                    <span class="block text-white font-medium text-sm tracking-widest uppercase">Kampar</span>
                </div>
            </div>
            <p class="text-gray-400 text-sm leading-relaxed">
                Portal berita terpercaya dari Jantung Negeri Kampar. Menyajikan informasi terkini seputar Air Tiris, Kabupaten Kampar, hingga berita Nasional dengan akurasi tinggi.
            </p>
        </div>

        {{-- Link Cepat --}}
        <div>
            <h4 class="text-white font-semibold mb-4 border-b border-gray-800 pb-2">Link Cepat</h4>
           <ul class="grid grid-cols-2 gap-x-4 gap-y-1 text-slate-600 text-sm">
            <li>
                <a href="/" class="block py-4 hover:text-green-700 transition duration-200" wire:navigate>Home</a>
            </li>
            <li>
                <a href="{{ route('web.category', 'nasional') }}" class="block py-4 hover:text-green-700 transition duration-200" wire:navigate>Kampar</a>
            </li>
            <li>
                <a href="{{ route('web.category', 'ekonomi') }}" class="block py-4 hover:text-green-700 transition duration-200" wire:navigate>Ekonomi</a>
            </li>
            <li>
                <a href="{{ route('web.category', 'teknologi') }}" class="block py-4 hover:text-green-700 transition duration-200" wire:navigate>Teknologi</a>
            </li>
            <li>
                <a href="{{ route('web.category', 'olahraga') }}" class="block py-4 hover:text-green-700 transition duration-200" wire:navigate>Olahraga</a>
            </li>
            <li>
                <a href="{{ route('web.category', 'hiburan') }}" class="block py-4 hover:text-green-700 transition duration-200" wire:navigate>Hiburan</a>
            </li>
            <li>
                <a href="{{ route('web.category', 'lifestyle') }}" class="block py-4 hover:text-green-700 transition duration-200" wire:navigate>Lifestyle</a>
            </li>
        </ul>
        </div>

        {{-- Kontak & Sosial Media --}}
        <div>
            <h4 class="text-white font-semibold mb-4 border-b border-gray-800 pb-2">Kontak Redaksi</h4>
            <div class="text-gray-400 text-sm space-y-2 mb-4">
                <p class="flex items-center"><i class="fas fa-envelope mr-2 text-green-500"></i> bulletinkampar@gmail.com</p>
                <p class="flex items-center"><i class="fab fa-whatsapp mr-2 text-green-500"></i> 0821-7711-216</p>
                <p class="flex items-center"><i class="fas fa-map-marker-alt mr-2 text-green-500"></i> Air Tiris, Kampar, Riau</p>
            </div>
            <div class="flex space-x-4">
                <a href="https://www.facebook.com/profile.php?id=61575770977020" 
                class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-blue-600 transition shadow-sm" aria-label="akun facebook">
                    <i class="fab fa-facebook-f text-xs"></i>
                </a>
                <a href="https://wa.me/628217711216" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-green-600 transition shadow-sm"
                   title="Hubungi kami di WhatsApp" aria-label="akun Whatsapp">
                   <i class="fab fa-whatsapp text-xs text-white"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Bottom Footer --}}
    <div class="border-t border-gray-800 mt-10 pt-6">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center text-gray-500 text-sm">
            <p>&copy; 2026 <span class="text-white font-semibold">Bulletin Kampar</span>. All rights reserved.</p>

            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="{{ route('web.privacy') }}" class="hover:text-green-500 transition" wire:navigate>Privacy Policy</a>
                <a href="{{ route('web.terms') }}" class="hover:text-green-500 transition" wire:navigate>Terms Of Services</a>
            </div>
        </div>
    </div>
</footer>

@livewireScripts

</body>
</html>

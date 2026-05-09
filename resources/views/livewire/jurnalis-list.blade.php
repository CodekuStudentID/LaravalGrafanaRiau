<div class="max-w-7xl mx-auto py-12 px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-items-center">
        @foreach($profiles as $profile)
            <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden hover:shadow-2xl hover:border-green-500/40 transition-all duration-500 flex flex-row h-60 shadow-sm w-full max-w-md relative group">

                {{-- WATERMARK PETA INDONESIA --}}
                <div class="absolute inset-0 pointer-events-none opacity-[0.07] group-hover:opacity-[0.12] transition-opacity duration-500 flex items-center justify-center p-4">
                    <img src="https://fvmstatic.s3.amazonaws.com/maps/m/ID-EPS-02-3001.png"
                         class="w-full h-full object-contain grayscale" alt="Peta Indonesia">
                </div>

                <div class="w-[38%] bg-gradient-to-b from-green-50 to-white p-4 flex flex-col items-center justify-between border-r border-gray-50 relative z-10">
                    <div class="relative">
                        <img class="w-24 h-24 rounded-2xl object-cover shadow-lg border-2 border-white transition-transform duration-300 group-hover:scale-105"
                             src="{{ asset('storage/' . $profile->photo) }}"
                             alt="{{ $profile->first_name }}">

                        {{-- Verified Badge --}}
                        <div class="absolute -top-2 -right-2 bg-blue-500 text-white p-1 rounded-full shadow-md border-2 border-white">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zM9.447 11l3.854-3.854-1.414-1.414L9.447 8.172 7.82 6.545 6.406 7.959 9.447 11z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="text-center w-full">
                        <p class="text-[8px] font-black text-green-800 uppercase tracking-[0.2em] leading-none mb-1">OFFICIAL ID</p>
                        <p class="text-[10px] font-mono font-bold text-gray-600 bg-white/80 backdrop-blur-sm py-1 px-2 rounded border border-green-100 inline-block shadow-sm">
                            {{ $profile->jurnalis_id }}
                        </p>
                    </div>
                </div>

                <div class="w-[62%] p-5 flex flex-col justify-between relative z-10">
                    <div>
                        <div class="flex justify-between items-start border-b border-gray-100 pb-2 mb-3">
                            <div class="overflow-hidden">
                                <div class="flex items-center gap-1.5">
                                    <h3 class="text-base font-bold text-gray-900 leading-tight truncate">
                                        {{ $profile->first_name }} {{ $profile->last_name }}
                                    </h3>
                                    <svg class="w-4 h-4 text-blue-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <p class="text-[10px] font-bold text-green-600 uppercase tracking-wide">
                                    {{ $profile->title_degree ?? 'Kontributor Jurnalis' }}
                                </p>
                            </div>
                            <div class="text-right flex-shrink-0 ml-2">
                                <span class="text-xl font-black text-gray-800 leading-none block">{{ $profile->user->posts_count ?? 0 }}</span>
                                <span class="text-[8px] font-bold text-gray-400 uppercase">Karya</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-y-2.5 gap-x-2">
                            <div class="flex flex-col">
                                <span class="text-[8px] font-bold text-gray-400 uppercase tracking-tighter">Pendidikan</span>
                                <span class="text-[10px] font-bold text-gray-700 uppercase leading-none">{{ $profile->education_level }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-[8px] font-bold text-gray-400 uppercase tracking-tighter">Gender</span>
                                <span class="text-[10px] font-bold text-gray-700 uppercase leading-none">{{ $profile->gender }}</span>
                            </div>
                            <div class="flex flex-col col-span-2">
                                <span class="text-[8px] font-bold text-gray-400 uppercase tracking-tighter">Tempat, Tgl Lahir</span>
                                <span class="text-[10px] font-semibold text-gray-700 leading-none">
                                    {{ $profile->pob }}, {{ $profile->dob->format('d M Y') }}
                                </span>
                            </div>
                            <div class="flex flex-col col-span-2">
                                <span class="text-[8px] font-bold text-gray-400 uppercase tracking-tighter">Domisili</span>
                                <div class="flex items-center gap-1">
                                    <span class="text-[10px] font-medium text-gray-500 truncate leading-tight">
                                        {{ $profile->address }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-2 pt-2 border-t border-gray-50">

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-12 flex justify-center">
        {{ $profiles->links() }}
    </div>
</div>

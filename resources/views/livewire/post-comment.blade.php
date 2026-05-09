<div class="mt-12 space-y-8">
    <h3 class="text-xl font-black text-gray-900 uppercase tracking-tight">Diskusi ({{ count($comments) }})</h3>

    {{-- CEK APAKAH USER SUDAH LOGIN --}}
    @auth
        <div class="bg-gray-50 p-6 rounded-3xl border border-gray-100 mb-10">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <span class="text-sm font-bold text-gray-700">{{ Auth::user()->name }}</span>
            </div>

            <form wire:submit.prevent="save" class="space-y-3">
                <textarea wire:model="body" placeholder="Tulis pendapat kamu..." class="w-full rounded-2xl border-gray-100 focus:ring-green-500 text-sm py-3 px-4"></textarea>
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-green-700 transition shadow-lg shadow-green-100">Kirim Komentar</button>
            </form>
        </div>
    @else
        <div class="bg-blue-50 p-6 rounded-3xl border border-blue-100 text-center mb-10">
            <p class="text-sm text-blue-700 font-medium mb-3">Kamu harus login dulu untuk ikut berdiskusi.</p>
            <a href="/login" class="inline-block bg-blue-600 text-white px-8 py-2 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-blue-700 transition shadow-lg shadow-blue-200">Login Sekarang</a>
        </div>
    @endauth

    {{-- LIST KOMENTAR --}}
    <div class="space-y-6">
        @foreach($comments as $comment)
            <div class="group flex gap-4 p-5 bg-white rounded-2xl border border-gray-50 hover:border-green-100 transition duration-300">
                {{-- Avatar --}}
              <h4 class="font-bold text-sm text-gray-900">{{ $comment->user->name ?? 'Pengguna Dihapus' }}</h4>

                <div class="flex-grow">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-bold text-sm text-gray-900">{{ $comment->user->name }}</h4>
                            <p class="text-[10px] text-gray-400 uppercase font-black tracking-tighter">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>

                        {{-- TOMBOL ACTION: Hanya muncul jika ID User = ID Pemilik Komentar --}}
                        @if(Auth::id() === $comment->user_id)
                        <div class="opacity-0 group-hover:opacity-100 transition-all flex gap-3">
                            <button wire:click="edit({{ $comment->id }})" class="text-[10px] font-black text-blue-500 uppercase hover:text-blue-700">Edit</button>
                            <button wire:click="delete({{ $comment->id }})" wire:confirm="Hapus komentar ini?" class="text-[10px] font-black text-red-500 uppercase hover:text-red-700">Hapus</button>
                        </div>
                        @endif
                    </div>

                    {{-- MODE EDIT --}}
                    @if($editingCommentId === $comment->id)
                        <div class="mt-3 space-y-2">
                            <textarea wire:model="editBody" class="w-full rounded-xl border-blue-100 text-sm focus:ring-blue-500 py-2"></textarea>
                            <div class="flex gap-2">
                                <button wire:click="update" class="bg-blue-600 text-white px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest">Simpan Perubahan</button>
                                <button wire:click="$set('editingCommentId', null)" class="bg-gray-100 text-gray-500 px-4 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest">Batal</button>
                            </div>
                        </div>
                    @else
                        <p class="mt-2 text-sm text-gray-600 leading-relaxed font-medium">{{ $comment->body }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

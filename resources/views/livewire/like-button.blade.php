<div>
    {{-- Do your work, then step back. --}}
<div class="flex items-center space-x-2">
    <button aria-label="Sukai artikel ini" wire:click="toggleLike" class="focus:outline-none group">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-4 w-4 transition-all duration-300 {{ $isLiked ? 'fill-current text-red-500 scale-125' : 'text-gray-400 fill-none group-hover:text-red-400' }}"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
    </button>

    <span class="font-bold text-gray-700">{{ $post->likes }}</span>
</div>
</div>

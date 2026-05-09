<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class LikeButton extends Component
{
    public Post $post;
    public $isLiked = false;

    public function toggleLike()
    {
        // Contoh logic: Anda butuh tabel likes atau kolom likes_count
        // Jika hanya simpel counter:
        $this->post->increment('likes');
        $this->isLiked = !$this->isLiked;

        // Jika pakai sistem login (user likes):
        // auth()->user()->toggleLike($this->post);
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}

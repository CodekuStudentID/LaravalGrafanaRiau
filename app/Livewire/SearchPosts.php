<?php
namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class SearchPosts extends Component
{
    public $search = '';

    public function render()
    {
        $results = [];
        if (strlen($this->search) >= 2) {
            $results = Post::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('content', 'like', '%' . $this->search . '%')
                ->latest()
                ->take(8)
                ->get();
        }

        return view('livewire.search-posts', [
            'posts' => $results
        ]);
    }
}

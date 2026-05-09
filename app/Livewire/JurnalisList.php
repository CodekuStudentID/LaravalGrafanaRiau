<?php

namespace App\Livewire;

use App\Models\Profile;
use Livewire\Component;
use Livewire\WithPagination;

class JurnalisList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.jurnalis-list', [
            'profiles' => \App\Models\Profile::with(['user' => function ($query) {
                $query->withCount('posts'); // Menghitung total post milik user tersebut
            }])
                ->latest()
                ->paginate(12),
        ]);
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LandingPage;

class PersonalLanding extends Component
{
    public $page;
    public $content;
    public $slug;

    public function mount($slug)
    {
        // Ambil data berdasarkan slug yang dilempar dari wrapper
        $this->page = LandingPage::where('slug', $slug)->firstOrFail();
        $this->content = $this->page->content;
    }

    public function render()
    {
        // Cukup return view tanpa ->layout()
        return view('livewire.personal-landing');
    }
}

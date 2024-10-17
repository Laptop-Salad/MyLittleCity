<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Cities extends Component
{
    #[Computed]
    public function cities() {
        return auth()->user()->cities()->orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.cities');
    }
}

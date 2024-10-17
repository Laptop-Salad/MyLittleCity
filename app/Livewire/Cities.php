<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Cities extends Component
{
    use WithPagination;

    #[Computed]
    public function cities() {
        return auth()->user()
            ->cities()
            ->orderBy('name')
            ->paginate();
    }

    public function render()
    {
        return view('livewire.cities');
    }
}

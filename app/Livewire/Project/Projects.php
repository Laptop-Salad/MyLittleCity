<?php

namespace App\Livewire\Project;

use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;

    #[Computed]
    public function projects() {
        return auth()->user()
            ->projects()
            ->orderBy('name')
            ->paginate();
    }

    public function render()
    {
        return view('livewire.projects');
    }
}

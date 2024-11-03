<?php

namespace App\Livewire\Family;

use App\Models\Family;
use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class Families extends Component
{
    use WithPagination;

    #[Locked]
    public Project $project;

    #[Computed]
    public function families() {
        return Family::query()
            ->where('project_id', $this->project->id)
            ->withCount('people')
            ->orderBy('name')
            ->paginate();
    }

    public function render()
    {
        return view('livewire.family.families');
    }
}

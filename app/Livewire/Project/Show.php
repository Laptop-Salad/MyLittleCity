<?php

namespace App\Livewire\Project;

use App\Models\City;
use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    #[Locked]
    public Project $project;

    #[Computed]
    public function cities() {
        return City::query()
            ->where('project_id', $this->project->id)
            ->orderBy('name')
            ->paginate();
    }

    public function render()
    {
        return view('livewire.project.show');
    }
}

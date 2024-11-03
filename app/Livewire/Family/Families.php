<?php

namespace App\Livewire\Family;

use App\Livewire\Forms\FamilyForm;
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

    public FamilyForm $family_form;

    public bool $show_create_family = false;

    #[Computed]
    public function families() {
        return Family::query()
            ->where('project_id', $this->project->id)
            ->withCount('people')
            ->orderBy('name')
            ->paginate();
    }

    public function saveFamily() {
        $this->family_form->project_id = $this->project->id;
        $this->family_form->save();
        $this->family_form->reset();
        $this->show_create_family = false;
    }

    public function render()
    {
        return view('livewire.family.families');
    }
}

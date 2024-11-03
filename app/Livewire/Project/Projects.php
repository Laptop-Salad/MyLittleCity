<?php

namespace App\Livewire\Project;

use App\Livewire\Forms\ProjectForm;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;

    public ProjectForm $project_form;

    public $show_create_project = false;

    public function saveProject() {
        $this->project_form->save();
        $this->project_form->reset();
        $this->show_create_project = false;
    }

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

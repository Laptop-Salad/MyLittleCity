<?php

namespace App\Livewire\Project;

use App\Livewire\Forms\ProjectForm;
use App\Models\Project;
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

    public function edit(Project $project) {
        $this->project_form->set($project);
        $this->show_create_project = true;
    }

    // we want to get the tenant that the user is currently in
    // first we have to allow for tenant routing?? so like /tenantname/*

    #[Computed]
    public function projects() {
        return Project::query()
            ->where('tenant_id', auth()->user()->current_tenant_id)
            ->orderBy('name')
            ->paginate();
    }

    public function render()
    {
        return view('livewire.projects');
    }
}

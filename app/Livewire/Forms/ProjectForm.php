<?php

namespace App\Livewire\Forms;

use App\Models\Project;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProjectForm extends Form
{
    public ?Project $project;

    #[Validate(['required', 'string', 'max:255'])]
    public $name;

    #[Validate(['required', 'string', 'max:255'])]
    public $description;

    public function set(Project $project) {
        $this->project = $project;

        $this->fill($project->toArray());
    }

    public function save()
    {
        $this->validate();

        if (isset($this->project)) {
            $project = $this->project;
        } else {
            $project = new Project();
        }

        $project->fill([
            'name' => $this->name,
            'description' => $this->description,
            'tenant_id' => auth()->user()->current_tenant_id
        ]);

        $project->save();
    }
}

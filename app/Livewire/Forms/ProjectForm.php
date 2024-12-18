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

    public function save()
    {
        $this->validate();

        if (!isset($this->project)) {
            $this->project = new Project();
        }

        $this->project->fill([
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => auth()->id()
        ]);

        $this->project->save();
    }
}

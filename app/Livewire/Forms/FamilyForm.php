<?php

namespace App\Livewire\Forms;

use App\Models\Family;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FamilyForm extends Form
{
    public ?Family $family;

    #[Validate(['required', 'string', 'max:255'])]
    public $name;

    #[Validate(['required', 'exists:projects,id'])]
    public $project_id;

    public function save() {
        $this->validate();

        if (!isset($this->family)) {
            $this->family = new Family();
        }

        $this->family->fill([
            'name' => $this->name,
            'project_id' => $this->project_id
        ]);

        $this->family->save();
    }
}

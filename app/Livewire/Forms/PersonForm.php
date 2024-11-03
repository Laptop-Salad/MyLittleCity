<?php

namespace App\Livewire\Forms;

use App\Models\Person;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PersonForm extends Form
{
    public ?Person $person;

    #[Validate(['required', 'string', 'max:255'])]
    public $first_name;

    #[Validate(['present', 'array'])]
    public array $middle_names = [];

    #[Validate(['required', 'exists:families,id'])]
    public $family_id;

    #[Validate(['required', 'exists:families,id'])]
    public $project_id;

    public function save()
    {
        $this->validate();

        if (!isset($this->person)) {
            $this->person = new Person();
        }

        $this->person->fill([
            'first_name' => $this->first_name,
            'middle_names' => $this->middle_names,
            'family_id' => $this->family_id,
            'project_id' => $this->project_id,
        ]);

        $this->person->save();
    }
}

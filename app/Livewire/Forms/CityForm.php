<?php

namespace App\Livewire\Forms;

use App\Models\City;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CityForm extends Form
{
    public ?City $city;

    #[Validate(['required', 'string', 'max:255'])]
    public $name;

    #[Validate(['required', 'exists:projects,id'])]
    public $project_id;

    public function save() {
        $this->validate();

        if (!isset($this->city)) {
            $this->city = new City();
        }

        $this->city->fill([
            'name' => $this->name,
            'project_id' => $this->project_id,
            'user_id' => auth()->id(),
        ]);

        $this->city->save();
    }
}

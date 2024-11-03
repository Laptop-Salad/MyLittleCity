<?php

namespace App\Livewire\Forms;

use App\Models\Building;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BuildingForm extends Form
{
    public ?Building $building;

    #[Validate(['required', 'numeric', 'integer'])]
    public $type = 1;

    #[Validate(['required', 'numeric', 'integer'])]
    public $number;

    #[Validate(['required', 'string', 'max:255'])]
    public $street;

    #[Validate(['required', 'string', 'max:255'])]
    public $postcode;

    #[Validate(['required', 'exists:cities,id'])]
    public $city_id;

    public function save() {
        $this->validate();

        if (!isset($this->building)) {
            $this->building = new Building();
        }

        $this->building->fill([
            'type' => $this->type,
            'number' => $this->number,
            'street' => $this->street,
            'postcode' => $this->postcode,
            'city_id' => $this->city_id,
        ]);

        $this->building->save();
    }
}

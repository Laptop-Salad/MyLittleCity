<?php

namespace App\Livewire\Forms;

use App\Models\Building;
use App\Models\Person;
use App\Models\PersonAddress;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PersonAddressForm extends Form
{
    public ?Person $person;

    #[Validate(['required'])]
    public $type;

    #[Validate(['required'])]
    public $addressable_id;

    #[Validate(['required', 'exists:people,id'])]
    public $person_id;

    public function save() {
        $this->person_id = $this->person->id;

        $this->validate();

        if ($this->type === 'building') {
            $addressable_type = Building::class;
        } else {
            $this->addError('type', 'Must be a valid type.');
        }

        $address = PersonAddress::create([
            'addressable_type' => $addressable_type,
            'addressable_id' => $this->addressable_id,
            'person_id' => $this->person_id
        ]);

        $address->save();
    }
}

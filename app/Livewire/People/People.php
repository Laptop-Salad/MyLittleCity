<?php

namespace App\Livewire\People;

use App\Livewire\Forms\PersonAddressForm;
use App\Livewire\Forms\PersonForm;
use App\Models\Person;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class People extends Component
{
    use WithPagination;

    #[Locked]
    public Project $project;

    public PersonForm $person_form;

    public PersonAddressForm $pa_form;

    public bool $show_create_person = false;
    public bool $show_create_pa = false;

    #[Computed]
    public function people() {
        return Person::query()
            ->where('project_id', $this->project->id)
            ->whereHas('family', function (Builder $query) {
                $query->orderBy('name');
            })
            ->paginate();
    }

    public function savePerson() {
        $this->person_form->project_id = $this->project->id;
        $this->person_form->save();
        $this->person_form->reset();
        $this->show_create_person = false;
    }

    public function savePersonAddress() {
        $this->pa_form->save();
        $this->pa_form->reset();
        $this->show_create_pa = false;
    }

    public function addAddress(Person $person) {
        $this->pa_form->reset();
        $this->pa_form->person = $person;
        $this->show_create_pa = true;
    }

    public function render()
    {
        return view('livewire.people.people');
    }
}

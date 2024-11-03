<?php

namespace App\Livewire\People;

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

    public bool $show_create_person = false;

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

    public function render()
    {
        return view('livewire.people.people');
    }
}

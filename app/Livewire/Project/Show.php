<?php

namespace App\Livewire\Project;

use App\Livewire\Forms\CityForm;
use App\Models\City;
use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    #[Locked]
    public Project $project;

    public CityForm $city_form;

    public bool $show_create_city = false;

    #[Computed]
    public function cities() {
        return City::query()
            ->where('project_id', $this->project->id)
            ->orderBy('name')
            ->paginate();
    }

    public function saveCity() {
        $this->city_form->project_id = $this->project->id;
        $this->city_form->save();
        $this->city_form->reset();
        $this->show_create_city = false;
    }

    public function render()
    {
        return view('livewire.project.show');
    }
}

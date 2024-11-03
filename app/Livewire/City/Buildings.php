<?php

namespace App\Livewire\City;

use App\Livewire\Forms\BuildingForm;
use App\Models\Building;
use App\Models\City;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class Buildings extends Component
{
    use WithPagination;

    #[Locked]
    public City $city;

    public BuildingForm $building_form;

    public bool $show_create_building = false;

    #[Computed]
    public function buildings() {
        return Building::query()
            ->where('city_id', $this->city->id)
            ->orderBy('number')
            ->paginate();
    }

    public function saveBuilding() {
        $this->building_form->city_id = $this->city->id;
        $this->building_form->save();
        $this->building_form->reset();
        $this->show_create_building = false;
    }

    public function render()
    {
        return view('livewire.building.buildings');
    }
}

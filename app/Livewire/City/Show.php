<?php

namespace App\Livewire\City;

use App\Models\Building;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Show extends Component
{
    #[Locked]
    public City $city;

    #[Computed]
    public function streetCount() {
        return Building::query()
            ->where('city_id', $this->city->id)
            ->distinct('street')
            ->count('street');
    }

    #[Computed]
    public function familyCount() {
        return 0;
    }

    public function render()
    {
        return view('livewire.city.city');
    }
}

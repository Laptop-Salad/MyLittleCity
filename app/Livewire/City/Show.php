<?php

namespace App\Livewire\City;

use App\Models\City;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Show extends Component
{
    #[Locked]
    public City $city;

    public function render()
    {
        return view('livewire.city');
    }
}

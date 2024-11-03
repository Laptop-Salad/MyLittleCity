<?php

namespace App\Livewire\City;

use App\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

class Residents extends Component
{
    use WithPagination;

    #[Locked]
    public City $city;

    #[Computed]
    public function residents() {
        return $this->city->residents()
            ->whereHas('family', function (Builder $query) {
                $query->orderBy('name');
            })
            ->paginate();
    }

    public function render()
    {
        return view('livewire.city.residents');
    }
}

<?php

namespace App\Livewire;

use App\Livewire\Forms\TeamForm;
use Livewire\Component;

class Teams extends Component
{

    public TeamForm $team_form;
    public $quick_create = false;
    public $show = false;

    public function mount() {
        if ($this->quick_create) {
            $this->show = true;
        }
    }

    public function save() {
        $this->team_form->save();
        $this->team_form->reset();
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.teams');
    }
}

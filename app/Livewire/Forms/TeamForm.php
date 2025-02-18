<?php

namespace App\Livewire\Forms;

use App\Models\Tenant;
use App\Models\TenantUser;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TeamForm extends Form
{
    public ?Tenant $tenant;

    #[Validate(['required', 'string', 'max:255'])]
    public $name;

    public function save() {
        $this->validate();

        if (!isset($this->tenant)) {
            $tenant = new Tenant();
        } else {
            $tenant = $this->tenant;
        }

        $tenant->fill($this->all());
        $tenant->save();

        if (!isset($this->tenant)) {
            TenantUser::create([
                'tenant_id' => $tenant->id,
                'user_id' => auth()->id(),
            ]);
        }
    }
}

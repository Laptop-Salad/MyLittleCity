<div>
    <x-layout.header>
        <h1>{{__('Teams')}}</h1>

        <x-slot:actions>
            <x-layout.action
                class="text-sm"
                wire:click="$set('show', true)"
            >
                New Team
            </x-layout.action>
        </x-slot:actions>
    </x-layout.header>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @foreach(auth()->user()->tenants as $tenant)
            <div class="simple-card shadow-md">
                <p>{{$tenant->name}}</p>
            </div>
        @endforeach
    </div>

    <form wire:submit="save">
        <x-modal.small
            title="{{ isset($this->team_form->team) ? 'Edit' : 'Create' }} Team "
            x-model="$wire.show"
        >
            <x-form.input-group for="team_form.name" label="Name">
                <x-form.text-input
                    wire:model="team_form.name"
                    class="mt-1 block w-full"
                />
            </x-form.input-group>

            <x-slot:footer>
                <x-btn type="submit">{{ isset($this->team_form->team) ? 'Update' : 'Create' }}</x-btn>
            </x-slot:footer>
        </x-modal.small>
    </form>
</div>

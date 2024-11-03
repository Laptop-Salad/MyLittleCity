<div>
    <x-city.header active="buildings">
        <x-slot:actions>
            <x-layout.action
                class="text-sm"
                wire:click="$set('show_create_building', true)"
            >
                New Building
            </x-layout.action>
        </x-slot:actions>
    </x-city.header>

        <div class="main-container">
        <table class="mt-4 table-default">
            <thead>
            <tr>
                <td>{{__('Number')}}</td>
                <td>{{__('Street name')}}</td>
                <td>{{__('Postcode')}}</td>
            </tr>
            </thead>
            <tbody>
            @forelse($this->buildings as $building)
                <tr>
                    <td>{{$building->number}}</td>
                    <td>{{$building->street}}</td>
                    <td>{{$building->postcode}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">{{__('No buildings')}}..</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{$this->buildings->links()}}
        </div>
    </div>

    <form wire:submit="saveBuilding">
        <x-modal.small title="Create Building" x-model="$wire.show_create_building">
            <x-form.input-group for="building_form.first_name" label="Number">
                <x-form.text-input
                    type="number"
                    wire:model="building_form.number"
                    class="mt-1 block w-full"
                    required
                />
            </x-form.input-group>

            <x-form.input-group for="building_form.street" label="Street">
                <x-form.text-input
                    wire:model="building_form.street"
                    class="mt-1 block w-full"
                    required
                />
            </x-form.input-group>

            <x-form.input-group for="building_form.postcode" label="Postcode">
                <x-form.text-input
                    wire:model="building_form.postcode"
                    class="mt-1 block w-full"
                    required
                />
            </x-form.input-group>

            <x-slot:footer>
                <x-btn type="submit">{{ isset($this->building_form->building) ? 'Update' : 'Create' }}</x-btn>
            </x-slot:footer>
        </x-modal.small>
    </form>
</div>

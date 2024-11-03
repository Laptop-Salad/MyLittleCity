@use('App\Models\Family')

<div>
    <x-project.header active="people">
        <x-slot:actions>
            <x-btn
                class="text-sm"
                wire:click="$set('show_create_person', true)"
            >
                New Person
            </x-btn>
        </x-slot:actions>
    </x-project.header>

    <div class="main-container">
        <table class="mt-4 table-default">
            <thead>
            <tr>
                <td>{{__('Name')}}</td>
                <td>{{__('Residential Status')}}</td>
                <td class="w-32"></td>
            </tr>
            </thead>
            <tbody>
            @forelse($this->people as $person)
                <tr wire:key="{{$person->id}}">
                    <td>
                        <p class="cell-header">{{$person->getName()}}</p>
                    </td>
                    <td>
                        {{
                            $person->person_addresses_count === 0
                            ? 'No registered addresses'
                            : $person->person_addresses_count . ' registered addresses'
                        }}
                    </td>
                    <td class="w-32">
                        <x-dropdown-group label="Manage">
                            <x-dropdown-group.button
                                icon="fa-solid fa-house"
                                wire:click="addAddress({{$person}})"
                            >
                                Add address
                            </x-dropdown-group.button>
                        </x-dropdown-group>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">{{__('No people')}}..</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{$this->people->links()}}
        </div>
    </div>

    <form wire:submit="savePerson">
        <x-modal.small title="Create Person" x-model="$wire.show_create_person">
            <livewire:ui.combobox
                wire:model="person_form.family_id"
                :model="\App\Models\Family::class"
                :searchable="['name']"
                display="name"
                placeholder="Search for families..."
            />

            <x-slot:footer>
                <x-btn type="submit">{{ isset($this->person_form->person) ? 'Update' : 'Create' }}</x-btn>
            </x-slot:footer>
        </x-modal.small>
    </form>

    <form wire:submit="savePersonAddress">
        <x-modal.small
            title="Add address to {{isset($this->pa_form->person) ? $this->pa_form->person->first_name : ''}}"
           x-model="$wire.show_create_pa"
        >
            <x-form.input-group for="pa_form.type" label="Address Type">
                <x-form.select wire:model.live="pa_form.type" required>
                    <option value="">Select address type</option>

                    <option value="building">Building</option>
                </x-form.select>
            </x-form.input-group>

            <div x-show="$wire.pa_form.type == 'building'">
                <livewire:ui.combobox
                    wire:model="pa_form.addressable_id"
                    :model="\App\Models\Building::class"
                    :searchable="['number', 'street', 'postcode']"
                    display="postcode"
                    placeholder="Search for buildings by number, street and postcode..."
                />
            </div>

            <x-slot:footer>
                <x-btn type="submit">Create</x-btn>
            </x-slot:footer>
        </x-modal.small>
    </form>
</div>

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
            </tr>
            </thead>
            <tbody>
            @forelse($this->people as $person)
                <tr class="link">
                    <td>
                        <p class="cell-header">{{$person->getName()}}</p>
                    </td>
                    <td>
                        No residency
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

            <x-form.input-group for="person_form.first_name" label="First Name">
                <x-form.text-input
                    wire:model="person_form.first_name"
                    class="mt-1 block w-full"
                />
            </x-form.input-group>

            <x-slot:footer>
                <x-btn type="submit">{{ isset($this->person_form->person) ? 'Update' : 'Create' }}</x-btn>
            </x-slot:footer>
        </x-modal.small>
    </form>
</div>

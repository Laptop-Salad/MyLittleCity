<div>
    <x-layout.heading>
        <h1>{{__('Cities')}}</h1>

        <x-slot:actions>
            <x-btn
                class="text-sm"
                wire:click="$set('show_create_city', true)"
            >
                New City
            </x-btn>
        </x-slot:actions>
    </x-layout.heading>

    <div class="main-container">
        <table class="mt-4 table-default">
            <thead>
            <tr>
                <td>{{__('Name')}}</td>
                <td>{{__('Residents')}}</td>
            </tr>
            </thead>
            <tbody>
            @forelse($this->cities as $city)
                <tr class="link">
                    <td>
                        <p class="cell-header">
                            <a
                                wire:navigate.hover
                                href="{{route('cities.city', $city)}}"
                                class="link"
                            >
                                {{$city->name}}
                            </a>
                        </p>
                        <p class="text-sm text-muted">{{Str::words($city->description, 5)}}</p>
                    </td>
                    <td>
                        <i class="fa-solid fa-person me-2"></i>
                        {{$city->residents->count()}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">{{__('No cities')}}..</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{$this->cities->links()}}
        </div>
    </div>

    <form wire:submit="saveCity">
        <x-modal.small title="Create City" x-model="$wire.show_create_city">
            <x-form.input-group for="city_form.name" label="Name">
                <x-form.text-input
                    wire:model="city_form.name"
                    class="mt-1 block w-full"
                />
            </x-form.input-group>

            <x-slot:footer>
                <x-btn type="submit">{{ isset($this->city_form->city) ? 'Update' : 'Create' }}</x-btn>
            </x-slot:footer>
        </x-modal.small>
    </form>
</div>

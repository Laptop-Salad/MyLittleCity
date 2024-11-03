@props(['active'])

<x-layout.header>
    <h1>{{$this->city->name}}</h1>

    <x-slot:actions>
        @isset($actions)
            {{$actions}}
        @endisset
    </x-slot:actions>

    <x-slot:tabs>
        <x-nav-link
            :href="route('cities.city', $this->city)"
            :active="$active === 'overview'"
            wire:navigate
        >
            {{ __('Overview') }}
        </x-nav-link>

        <x-nav-link
            :href="route('cities.city.residents', $this->city)"
            :active="$active === 'residents'"
            wire:navigate
        >
            {{ __('Residents') }}
        </x-nav-link>

        <x-nav-link
            :href="route('cities.city.buildings', $this->city)"
            :active="$active === 'buildings'"
            wire:navigate
        >
            {{ __('Buildings') }}
        </x-nav-link>
    </x-slot:tabs>
</x-layout.header>

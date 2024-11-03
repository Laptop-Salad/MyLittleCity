@props(['active'])

<x-layout.header>
    <h1>{{$this->project->name}}</h1>

    <x-slot:actions>
        @isset($actions)
            {{$actions}}
        @endisset
    </x-slot:actions>

    <x-slot:tabs>
        <x-nav-link
            :href="route('projects.project', $this->project)"
            :active="$active === 'cities'"
            wire:navigate
        >
            {{ __('Cities') }}
        </x-nav-link>

        <x-nav-link
            :href="route('projects.project.people', $this->project)"
            :active="$active === 'people'"
            wire:navigate
        >
            {{ __('People') }}
        </x-nav-link>
    </x-slot:tabs>
</x-layout.header>

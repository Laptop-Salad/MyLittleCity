@props([
    'icon' => null,
])

<button {{$attributes}} class="w-full text-start">
    <x-dropdown-link>
        @if (isset($icon))
            <i class="fa-solid fa-house w-8"></i>
        @else
            <span class="w-8 inline-block"></span>
        @endif

        {{$slot}}
    </x-dropdown-link>
</button>

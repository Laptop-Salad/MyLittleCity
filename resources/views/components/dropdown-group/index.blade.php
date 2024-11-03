@props([
    'label',
    'icon' => 'fa-solid fa-angle-down'
])

<div class="flex items-center ms-6">
    <x-dropdown width="48">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                {{$label}}
                <i class="{{$icon}} ms-1"></i>
            </button>
        </x-slot>

        <x-slot name="content">
            {{$slot}}
        </x-slot>
    </x-dropdown>
</div>

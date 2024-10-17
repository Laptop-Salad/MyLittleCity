<header class="border-b pt-6 pb-4 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto">
        <h1>{{$this->city->name}}</h1>
    </div>
</header>

<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="hidden space-x-8 sm:-my-px  sm:flex">
                    <x-nav-link :href="route('cities')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Residents') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>

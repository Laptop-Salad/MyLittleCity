<header class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
           <div>
               {{ $slot }}
           </div>
            <div>
                @isset($actions)
                    {{$actions}}
                @endisset
            </div>
        </div>
    </div>
</header>

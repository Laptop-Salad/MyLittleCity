<div>
    <x-popover wire:model="show">
        <x-popover.trigger>
            <div class="flex items-center border-b px-3">
                <i class="fa-solid fa-magnifying-glass me-2"></i>
                <x-input
                    wire:model.live="search"
                    :placeholder="$selected ? $selected->{$display} : $placeholder"
                    class="py-3 px-0 outline-none border-none focus-visible:ring-0"
                />
            </div>
        </x-popover.trigger>
        <x-popover.content class="bg-white w-[200px] p-0 min-h-20">
            @foreach ($results as $result)
                <div
                    wire:click="select('{{ $result->id }}')"
                    class="flex justify-between hover:bg-gray-100 relative cursor-default select-none items-center rounded-sm px-2 py-1.5 text-sm outline-none data-[disabled=true]:pointer-events-none data-[selected=true]:bg-gray-100 data-[selected=true]:text-accent-foreground data-[disabled=true]:opacity-50"
                >
                    <span>{{ $result->{$display} }}</span>

                    @if ($value === $result->id)
                        <i class="fa-solid fa-circle-check"></i>
                    @endif
                </div>
            @endforeach
            @if ($search && $results->isEmpty())
                <p class="py-6 text-center text-sm">{{ __('No results found') }}</p>
            @endif
        </x-popover.content>
    </x-popover>
</div>

<div>
    <x-project.header active="families">
        <x-slot:actions>
            <x-btn
                class="text-sm"
                wire:click="$set('show_create_person', true)"
            >
                New Family
            </x-btn>
        </x-slot:actions>
    </x-project.header>

    <div class="main-container">
        <table class="mt-4 table-default">
            <thead>
            <tr>
                <td>{{__('Name')}}</td>
                <td>{{__('Members')}}</td>
            </tr>
            </thead>
            <tbody>
            @forelse($this->families as $family)
                <tr>
                    <td class="cell-header">{{$family->name}}</td>
                    <td>{{$family->people_count}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">{{__('No people')}}..</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{$this->families->links()}}
        </div>
    </div>
</div>

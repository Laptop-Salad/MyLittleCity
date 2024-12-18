<div>
    <x-layout.header>
        <h1>{{__('Projects')}}</h1>

        <x-slot:actions>
            <x-layout.action
                class="text-sm"
                wire:click="$set('show_create_project', true)"
            >
                New Project
            </x-layout.action>
        </x-slot:actions>
    </x-layout.header>

    <div class="main-container">
        <div class="grid md:grid-cols-4 gap-4">
            @forelse($this->projects as $project)
                <div class="simple-card shadow-md">
                    <div class="flex justify-between separator pb-2">
                        <h2 class="hover:text-indigo-500">
                            <a
                                wire:navigate.hover
                                href="{{route('projects.project', $project)}}"
                                class="font-semibold border-b border-indigo-400"
                            >
                                {{$project->name}}
                            </a>
                        </h2>

                        <x-popover>
                            <x-popover.trigger class="w-full relative">
                                <x-btn>
                                    <i class="fa-solid fa-ellipsis fa-lg"></i>
                                    <span class="sr-only">Menu/Options</span>
                                </x-btn>
                            </x-popover.trigger>
                            <x-popover.content class="bg-white mx-3 min-h-20">
                                <x-btn wire:click="edit({{$project->id}})">Edit</x-btn>
                            </x-popover.content>
                        </x-popover>
                    </div>

                    <div class="mt-6 space-y-4">
                        <p>
                            <i class="fa-solid fa-city me-2"></i>
                            Cities:
                            {{$project->cities->count()}}
                        </p>
                        <p>
                            <i class="fa-solid fa-buildings me-2"></i>
                            Buildings:
                            {{$project->buildings->count()}}
                        </p>
                        <p>
                            <i class="fa-solid fa-people-pants me-2"></i>
                            People:
                            {{$project->people->count()}}
                        </p>
                    </div>
                </div>
            @empty
                <p>{{__('No projects')}}...</p>
            @endforelse
        </div>

        <div class="mt-4">
            {{$this->projects->links()}}
        </div>
    </div>

    <form wire:submit="saveProject">
        <x-modal.small
            title="{{ isset($this->project_form->project) ? 'Edit' : 'Create' }} Project "
            x-model="$wire.show_create_project"
        >
            <x-form.input-group for="project_form.name" label="Name">
                <x-form.text-input
                    wire:model="project_form.name"
                    class="mt-1 block w-full"
                />
            </x-form.input-group>

            <x-form.input-group for="project_form.description" label="Description">
                <x-form.text-input
                    wire:model="project_form.description"
                    class="mt-1 block w-full"
                />
            </x-form.input-group>

            <x-slot:footer>
                <x-btn type="submit">{{ isset($this->project_form->project) ? 'Update' : 'Create' }}</x-btn>
            </x-slot:footer>
        </x-modal.small>
    </form>
</div>

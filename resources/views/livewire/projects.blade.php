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
        <table class="mt-4 table-default">
            <thead>
            <tr>
                <td>{{__('Name')}}</td>
                <td>{{__('Cities')}}</td>
            </tr>
            </thead>
            <tbody>
            @forelse($this->projects as $project)
                <tr class="link">
                    <td>
                        <p class="cell-header">
                            <a
                                wire:navigate.hover
                                href="{{route('projects.project', $project)}}"
                                class="link"
                            >
                                {{$project->name}}
                            </a>
                        </p>
                    </td>
                    <td>
                        <i class="fa-solid fa-city me-2"></i>
                        {{$project->cities->count()}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">{{__('No projects')}}...</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{$this->projects->links()}}
        </div>
    </div>

    <form wire:submit="saveProject">
        <x-modal.small title="Create Project" x-model="$wire.show_create_project">
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

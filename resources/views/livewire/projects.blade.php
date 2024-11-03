<div class="main-container">
    <h1>{{__('Cities')}}</h1>

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
                        <a href="{{route('projects.project', $project)}}" class="link">{{$project->name}}</a>
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

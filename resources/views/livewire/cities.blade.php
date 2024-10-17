<div class="main-container">
    <h1>{{__('Cities')}}</h1>

    <table class="mt-4 table-default">
        <thead>
            <tr>
                <td>{{__('Name')}}</td>
            </tr>
        </thead>
        <tbody>
            @forelse($this->cities as $city)
                <tr>
                    <td>
                        <p class="cell-header">{{$city->name}}</p>
                        <p class="text-sm text-muted">{{Str::words($city->description, 5)}}</p>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No cities..</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{$this->cities->links()}}
    </div>
</div>

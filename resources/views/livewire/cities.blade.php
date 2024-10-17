<div class="main-container">
    <h1>{{__('Cities')}}</h1>

    <table class="mt-4 table-default">
        <thead>
            <tr>
                <td>{{__('Name')}}</td>
                <td>{{__('Residents')}}</td>
            </tr>
        </thead>
        <tbody>
            @forelse($this->cities as $city)
                <tr class="link">
                    <td>
                        <p class="cell-header">
                            <a href="{{route('cities.city', $city)}}" class="link">{{$city->name}}</a>
                        </p>
                        <p class="text-sm text-muted">{{Str::words($city->description, 5)}}</p>
                    </td>
                    <td>
                        <i class="fa-solid fa-person me-2"></i>
                        {{$city->residents->count()}}
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

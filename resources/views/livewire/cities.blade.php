<div class="main-container">
    <h1>{{__('Cities')}}</h1>

    <table class="mt-4 table-default">
        <thead>
            <tr>
                <td>{{__('Name')}}</td>
                <td>{{__('Description')}}</td>
            </tr>
        </thead>
        <tbody>
            @forelse($this->cities as $city)
                <tr>
                    <td>{{$city->name}}</td>
                    <td>{{$city->description}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No cities..</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

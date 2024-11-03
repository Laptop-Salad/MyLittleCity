<div>
    <x-city.header active="residents" />

    <div class="main-container">
        <table class="mt-4 table-default">
            <thead>
            <tr>
                <td>{{__('Name')}}</td>
                <td>{{__('Family Name')}}</td>
            </tr>
            </thead>
            <tbody>
            @forelse($this->residents as $resident)
                <tr>
                    <td>{{$resident->getName(true, true, false)}}</td>
                    <td>{{$resident->family->name}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No residents in this city..</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{$this->residents->links()}}
        </div>
    </div>
</div>

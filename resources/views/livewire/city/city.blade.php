<div>
   <x-city.header active="overview" />

    <div class="grid grid-cols-[1fr_2fr_3fr] p-4 gap-4">
       <div class="simple-card">
           {{$this->city->buildings->count()}}
           Buildings
       </div>

        <div class="simple-card">
            {{$this->street_count}}
            Streets
        </div>

        <div class="simple-card">
            {{$this->family_count}}
            Families
        </div>
    </div>
</div>

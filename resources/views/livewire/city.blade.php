<div>
   <x-city.header active="overview" />

    <div>
       <div class="border">
           {{$this->city->buildings->count()}}
           Buildings
       </div>

        <div class="border">
            {{$this->street_count}}
            Streets
        </div>

        <div class="border">
            {{$this->family_count}}
            Families
        </div>
    </div>
</div>

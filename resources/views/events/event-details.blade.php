{{-- EVENT DETAILS PAGE --}}
<x-layout :pageTitle=$pageTitle>
    @foreach ($event->adventures as $adventure)
    <div class="card">
    
        <h5 class="card-title">Event Details</h5>
        <div class="card-body">
        <h5 class="card-header" class="card text-center"><a href="/events/{{ $adventure->trail->id }}">
                {{ $adventure->trail->name }}</a>
        </h5>
            <h2 >{{ $event->title }}</h2> {{-- Event Title --}}
            <p>Trail title : {{ $adventure->trail->name }} Trail ID : </strong>{{ $adventure->trail->id }}</p>
            <p>Adventure Organizer: <a href="/profile/{{ $event->username }}">{{ $event->organizer->firstname }}
                    {{ $event->organizer->lastname }}</a></p>
            <p>Starting date : {{ $adventure->start_date }}</p>
            <div class="col-md-8 ">
                <x-weather-api :lat="$adventure->trail->location_latit" :long="$adventure->trail->location_long" :startdate="$adventure->start_date" :trailname="$adventure->trail->name" />
            </div>
            <a href="/trail/{{ $adventure->trail->id }}" class="btn btn-primary">Trail Details</a>

            <x-events.join-button :adventure="$adventure" />
            <x-events.participants-number-link :adventure="$adventure" />
            <x-events.carpool-solutions :adventure="$adventure" />
    @endforeach
    <a href="/events" class="btn btn-primary">Back</a>
    {{-- Carpool Link --}}
    {{-- <div class="card-footer text-body-secondary">
          <p>HERE GOES CARPOOL SOLUTIONS FOR THIS TRIAL</p><br>
          <a href="/carpool/lists" class="btn btn-primary">Carpool list</a>   
          <a href="/carpool/create" class="btn btn-primary">Create a carpool</a>     
        </div> --}}
    </div>
    </div>
    

</x-layout>

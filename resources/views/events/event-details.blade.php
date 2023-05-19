{{-- EVENT DETAILS PAGE --}}
<x-layout :pageTitle=$pageTitle>
  <div class="event-details-card">
    <ul>
      <p>Event Id : {{ $event->id}}</p>
      <h1>{{ $event->title}}</h1> {{-- Event Title --}}
      @foreach($event->adventures as $adventure)
          <div class="trail-details-card">
            <h2>Adventure ID - {{ $adventure->id }}</h2>
            <h2>Trail title : {{ $adventure->trail->name }} Trail ID : </strong>{{ $adventure->trail->id }}</h2>
            <p>Starting Time: {{ $adventure->start_date }}</p>
            <x-weather-api :lat="$adventure->trail->location_latit" :long="$adventure->trail->location_long"/>
              <p>HERE GOES CARPOOL SOLUTIONS FOR THIS TRIAL</p>
              <button>
                <a href="/carpool/create">Create a carpool!</a><br>
              </button><br>
              <button>
                <a href="/events/{{$event->id}}/trail/{{$adventure->trail->id}}">Trail Details</a>
              </button>
          </div>
      @endforeach
    </ul>
  </div>
</x-layout>


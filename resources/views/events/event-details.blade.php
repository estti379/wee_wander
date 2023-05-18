{{-- EVENT DETAILS PAGE --}}
<x-layout :pageTitle=$pageTitle>
  <div class="event-details-card">
    <ul>
      <p>Event Id : {{ $event->id}}</p>
      <h1>{{ $event->title}}</h1> {{-- Event Title --}}
      @foreach($event->adventures as $adventure)
          <div class="trail-details-card">
            <h2>Trail title : {{ $adventure->trail->name }} Trail ID : </strong>{{ $adventure->trail->id }}</h2>
            <p>Starting Time: {{ $adventure->start_date }}</p>
            <x-weather-api :lat="$adventure->trail->location_latit" :long="$adventure->trail->location_long"/>
            <button>
              <a href="/events/{{$event->id}}/trail">Trail Details</a>
            </button>
          </div>
      @endforeach
    </ul>
  </div>
</x-layout>


{{-- EVENT DETAILS PAGE --}}
<x-layout :pageTitle=$pageTitle>
  <div class="event-details-card">
    <ul>
      <p>Event Id : {{ $event->id}}</p>
      <p>Event title : {{ $event->title}}</p>
      
      @foreach($event->adventures as $adventure)
          <div class="trail-details-card">
            <p>Trail title : {{ $adventure->trail->name }}</p>
            <p>Starting Time: {{ $adventure->start_date }}</p>
           <x-weather-api :lat="$adventure->trail->location_latit" :long="$adventure->trail->location_long"/> {{--  chatGPT --}}
            <a href="/events/{{$adventure->trail_id}}/trail">Trail Details</a>
          </div>
      @endforeach
    </ul>
  </div>
</x-layout>


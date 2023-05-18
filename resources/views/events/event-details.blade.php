{{-- EVENT DETAILS PAGE --}}
<x-layout :pageTitle=$pageTitle>
  <ul>
    <p>Event Id : {{ $event->id}}</p>
    <p>Event title : {{ $event->title}}</p>
    
    @foreach($event->adventures as $adventure)
          <p>Trail title : {{ $adventure->trail->name }}</p>
          <p>Starting Time: {{ $adventure->start_date }}</p>
          <a href="/events/{{$adventure->trail_id}}/trail">Trail Details</a>
    @endforeach
  </ul>
</x-layout>


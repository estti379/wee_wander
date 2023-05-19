  {{-- Events list view --}}
  {{-- The variables are being retrieved from the route --}}
  {{-- If youre passing a variable, we need to use : before  --}}
  {{-- <x-eventcard text="This is the event card - Just example" :eventTitle="$eventTitle"/> <br>   --}}

<x-layout :pageTitle=$pageTitle>
  <div> 
    {{-- {{ dd($events) }} --}}
    {{-- informations being retrieved by the eventsCard() method in controllers --}}
    @foreach ($events as $event)
      {{-- {{dd($event)}} --}}
      <div class="event-card">
        <p>Event Title : {{ $event->title}}</p>
        <p>Creator : {{ $event->organizer_id}}</p>
        @foreach($event->adventures as $adventure)
          <p>Trail title : {{ $adventure->trail->name }}</p>
          <p>Starting Time: {{ $adventure->start_date }}</p>
          <p>Due Time: {{ $adventure->due_date }}</p>
        @endforeach
        <button><a href="/events/{{ $event->id }}">Event Details</a></button>
        <button><a href="events/{{ $event->id }}/edit">Edit/Delete Event</a></button>
      </div>
    @endforeach
  </div>
</x-layout>
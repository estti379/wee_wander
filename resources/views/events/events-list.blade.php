<x-layout :pageTitle=$pageTitle>
  <div> 
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
        {{-- If statment to edit button just allowed when user logged in --}}
        @if (Auth::check() && Auth::user()->id == $event->organizer_id)  
        <!-- Button to edit event -->
              <button><a href="events/edit/{{ $event->id }}">Edit/Delete Event</a></button>
        @endif
          @if (Auth::check())
          Logged in user ID: {{ Auth::user()->id }} <br>
          Event organizer ID: {{ $event->organizer_id }}
          @endif
      </div>
    @endforeach
    {{-- For pagination --}}
    {{ $events->links() }} 
  </div>
</x-layout>
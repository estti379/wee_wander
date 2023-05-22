<x-layout :pageTitle=$pageTitle>
  <h5 class=text-center >Events List</h5>
  
    {{-- informations being retrieved by the eventsCard() method in controllers --}}
    @foreach ($events as $event)
    <div class="card"> 
      {{-- {{dd($event)}} --}}
      <h5 class="card-header">{{ $event->title}}</h5>
      <div class="card-body">
        <p class="card-text">Creator : {{ $event->organizer_id}}</p>
        @foreach($event->adventures as $adventure)
          <p class="card-text">Trail title : {{ $adventure->trail->name }}</p>
          <p class="card-text">Starting Time: {{ $adventure->start_date }}</p>
          <p class="card-text">Due Time: {{ $adventure->due_date }}</p>
        @endforeach
        <a href="/events/{{ $event->id }}" class="btn btn-primary">Event Details</a>
        {{-- If statment to edit button just allowed when user logged in --}}
        @if (Auth::check() && Auth::user()->id == $event->organizer_id)  
        <!-- Button to edit event -->
        <a href="events/edit/{{ $event->id }}" class="btn btn-primary">Edit/Delete Event</a>
        @endif
      </div>
      <div class="card-footer text-body-secondary">
        @if (Auth::check())
        Logged in user ID: {{ Auth::user()->id }} 
        Event organizer ID: {{ $event->organizer_id }}
        @endif
      </div>
    </div> 
     
    @endforeach
    {{-- For pagination --}}
    {{ $events->links() }} 
  
</x-layout>

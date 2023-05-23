<x-layout :pageTitle=$pageTitle>
  <h5 class=text-center >Events List</h5>
  
    {{-- informations being retrieved by the eventsCard() method in controllers --}}
    @foreach ($events as $event)
    <div class="card"> 
      {{-- {{dd($event)}} --}}
      <h5 class="card-header"><a href="/events/{{ $event->id }}">{{ $event->title}}</a></h5>
      <div class="card-body">
        <p class="card-text">Organizer name : <a href="/profile/{{ $event->username}}">{{ $event->organizer_id}}</p>
        @foreach($event->adventures->sortBy('start_date') as $adventure)
          <p class="card-text">Trail title : <a href="/trail/{{$adventure->trail->id}}">{{ $adventure->trail->name }}</a></p>
          <p class="card-text">Starting Time: {{ $adventure->start_date }}</p>
          <p class="card-text">Due Time: {{ $adventure->due_date }}</p>
        @endforeach
        <a href="/events/{{ $event->id }}" class="btn btn-primary">Event Details</a>
        {{-- If statment to edit button just allowed when user logged in --}}
        @if (Auth::check() && Auth::user()->id == $event->organizer_id)  
          <!-- Button to edit event -->
          <a href="events/edit/{{ $event->id }}" class="btn btn-primary">Edit/Delete Event</a>
        @endif
          {{-- button to join the event --}}
          <form action="/event/join/{{ $event->id }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Join Event</button>
          </form>
      </div>
     
        @if (Auth::check())
      Login ID {{ Auth::user()->id }} 
      Event ID{{ $event->organizer_id }}
        @endif
   
    </div> 
     
    @endforeach
    {{-- For pagination --}}
    {{ $events->withQueryString()->links() }} 
  
</x-layout>

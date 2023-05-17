@extends('layouts.app')
@section('title', 'Events List')


  
  {{-- Events list view --}}
  {{-- The variables are being retrieved from the route --}}
  {{-- If youre passing a variable, we need to use : before  --}}
  {{-- <x-eventcard text="This is the event card - Just example" :eventTitle="$eventTitle"/> <br>   --}}
  @section('content')
  <div>
    {{-- informations being retrieved by the eventsCard() method in controllers --}}
    @foreach ($events as $event)
      <div>
        <a href="events/{{ $event['id'] }}/edit">Edit/Delete Event</a>
      </div>
      <div class="event-card">
        <p>Title : {{ $event['title']}}</p>
        <p>Id Organizer : {{ $event['id_organizer']}}</p>
      </div>
    @endforeach
  </div>
  @endsection


<link rel="stylesheet" href="/css/event_card_style.css">

{{-- Single event item card COMPONENT --}}
<div class="event-card">
  {{-- TO DO - These informations needs to fetch from the informations of the db --}}
  <h1>{{ $eventTitle }}</h1>
  <p>{{ $text }}</p>

  @foreach ($eventsData as $key => $eventData)
      <p>{{ $key }} - {{$eventData}}</p>
  @endforeach
</div>
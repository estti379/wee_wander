@props(['event'])

<div class="card">
    <h5 class="card-header"><a href="/events/{{ $event->id }}">{{ $event->title }}</a></h5>
    <div class="card-body">
        <p class="card-text">Organizer name : <a href="/profile/{{ $event->username }}">{{ $event->organizer->firstname }}
                {{ $event->organizer->lastname }}</a></p>
        @foreach ($event->adventures->sortBy('start_date') as $adventure)
            <hr>
            <p class="card-text">Trail title : <a
                    href="/trail/{{ $adventure->trail->id }}">{{ $adventure->trail->name }}</a></p>
            <p class="card-text">Starting Time: {{ $adventure->start_date }}</p>
            <p class="card-text">Due Time: {{ $adventure->due_date }}</p>
            <x-events.join-button :adventure="$adventure" />
            <x-events.participants-number-link :adventure="$adventure" />
            <x-events.carpool-solutions :adventure="$adventure" />
        @endforeach
        <hr>
        <a href="/events/{{ $event->id }}" class="btn btn-primary">Event Details</a>
        {{-- If statment to edit button just allowed when user logged in --}}
        @if (Auth::check() && Auth::user()->id == $event->organizer_id)
            <!-- Button to edit event -->
            <a href="events/edit/{{ $event->id }}" class="btn btn-primary">Edit</a>
        @endif
    </div>
</div>

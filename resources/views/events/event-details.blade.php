{{-- EVENT DETAILS PAGE --}}
<x-layout :pageTitle=$pageTitle>
    @foreach($event->adventures as $adventure)
      <div  class="card" >
          <h5 class="card-header" class="card text-center"><a href="/trail/{{$adventure->trail->id}}">Event detail</a></h5>
          <div class="card-body" >
            <h2 class="card-title">{{ $event->title}}</h2> {{-- Event Title --}}  
            <p>Trail title : {{ $adventure->trail->name }} Trail ID : </strong>{{ $adventure->trail->id }}</p>
            <p>Trail Organizer: <a href="/profile/{{ $event->username}}">{{$event->organizer->firstname}} {{$event->organizer->lastname}}</a></p>
            <p>Starting Time: {{ $adventure->start_date }}</p>
            <div class="col-md-8">
              <x-weather-api :lat="$adventure->trail->location_latit" :long="$adventure->trail->location_long"/>
            </div>
          {{-- Button --}}
          <form action="/event/join/{{ $event->id }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Join Event</button>
          </form>
          <a href="/trail/{{$adventure->trail->id}}" class="btn btn-primary">Trail Details</a>
          <a href="/events"  class="btn btn-primary">Back</a>
        </div>
            @endforeach
      {{-- Carpool Link --}}
      <div class="card-footer text-body-secondary">
          <p>HERE GOES CARPOOL SOLUTIONS FOR THIS TRIAL</p><br>
          <a href="/carpool/lists" class="btn btn-primary">Carpool list</a>   
          <a href="/carpool/create" class="btn btn-primary">Create a carpool</a>     
        </div>
    </div>
  
</x-layout>

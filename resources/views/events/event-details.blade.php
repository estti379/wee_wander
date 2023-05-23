{{-- EVENT DETAILS PAGE --}}
<x-layout :pageTitle=$pageTitle>
  <div  class="card">
    <h5 class="card-header" class="card text-center">Event detail</h5>
    <div class="card-body">
    <ul>
      <p >Event Id : {{ $event->id}}</p>
      <h2 class="card-title">{{ $event->title}}</h2> {{-- Event Title --}}
      @foreach($event->adventures as $adventure)

            <p>Adventure ID - {{ $adventure->id }}</p>
            <p>Trail title : {{ $adventure->trail->name }} Trail ID : </strong>{{ $adventure->trail->id }}</p>
            <p>Starting Time: {{ $adventure->start_date }}</p>
          </div>
          <div class="col-md-8">
            <div class="card-body">
            <x-weather-api :lat="$adventure->trail->location_latit" :long="$adventure->trail->location_long"/>
          </div>
          </div>
          <a href="/trail/{{$adventure->trail->id}}" class="btn btn-primary">Trail Details</a>
      @endforeach
    </ul>
 
  <div class="card-footer text-body-secondary">
    <p>HERE GOES CARPOOL SOLUTIONS FOR THIS TRIAL</p><br>
    <a href="/carpool/create" class="btn btn-primary">Create a carpool!</a>     
    
    <a href="/events"  class="btn btn-primary">Back</a>
    
  </div>
</div>
</div>
</x-layout>

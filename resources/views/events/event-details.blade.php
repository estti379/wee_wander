{{-- EVENT DETAILS PAGE --}}
<x-layout :pageTitle=$pageTitle>

  <div  class="card">
    <h5 class="card-header" class="card text-center">Event detail</h5>
    <div class="card-body">
    <ul>
      <p >Event Id : {{ $event->id}}</p>
      <h1 class="card-title">{{ $event->title}}</h1> {{-- Event Title --}}
      @foreach($event->adventures as $adventure)

            <h2>Adventure ID - {{ $adventure->id }}</h2>
            <h2>Trail title : {{ $adventure->trail->name }} Trail ID : </strong>{{ $adventure->trail->id }}</h2>
            <p>Starting Time: {{ $adventure->start_date }}</p>
          </div>
          <div class="col-md-8">
            <div class="card-body">
            <x-weather-api :lat="$adventure->trail->location_latit" :long="$adventure->trail->location_long"/>
          </div>
          </div>
      @endforeach
    </ul>
 
  <div class="card-footer text-body-secondary">
    <p>HERE GOES CARPOOL SOLUTIONS FOR THIS TRIAL</p><br>
    <a href="/carpool/create" class="btn btn-primary">Create a carpool!</a>     
    <a href="/events/{{$event->id}}/trail/{{$adventure->trail->id}}" class="btn btn-primary">Trail Details</a>
  </div>
</div>
  </div>
</x-layout>





    <h5 >Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  
  <img src="..." class="card-img-bottom" alt="...">

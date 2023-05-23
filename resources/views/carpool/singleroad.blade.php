
<x-layout :pageTitle='$pageTitle'>
       
<div class="card">
       <h5 class="card-header"> Carpool Detail</h5>
       <div class="card-body">
              <p class="card-text">Drivers name: <a href="/users/{{$carpool->carowner->id}}"><strong>{{$carpool->carowner->firstname}} {{ $carpool->carowner->lastname}}</strong></a></p>
              <p >Seats available: <strong>{{ $carpool->max_seats}}</strong></p>
              <p >Bike Rack available: <?php echo $carpool['bike_capacity'] ? 'Yes' : 'No'; ?></p>  {{--{{ $element->bike_capacity }}--}}
              <p >Date & Time Departure: {{ $carpool->start_date }}</p>
              <p >Luggage allowed: <?php echo $carpool['lugage'] ? 'Yes' : 'No'; ?></p>
              <p>Dog allowed: <?php echo $carpool['pets_allowed'] ? 'Yes' : 'No'; ?></p>
              <p>Smokers allowed: <?php echo $carpool['smokers_allowed'] ? 'Yes' : 'No'; ?></p>
              <p><strong>Asked price :  {{ $carpool->price }}€</strong></p>
              <a href="/carpool"  class="btn btn-primary">Back</a>
              @if (Auth::check() && Auth::user()->id == $carpool->carowner->id)
                <a href="/carpool/edit/{{$carpool->id}}" class="btn btn-primary">Edit</a>
            @endif
              <div>
                     <!--========================= Check if the user is logged in and not the car owner =========================-->
                     @if (Auth::check() && Auth::user() ->id!= $carpool->carowner->id )
                     <!-- ========================= Button to join the carpool =========================-->
                     <form action="/carpool/join/{{ $carpool->id }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Join Carpool</button>
                     </form>
                     @endif
              </div>
       </div>
</div>
</x-layout>
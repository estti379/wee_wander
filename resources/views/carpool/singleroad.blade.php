
<x-layout :pageTitle='$pageTitle'>
       <div>
              <h1> SINGLE ROAD</h1>
       
              <p>Seats available: <strong>{{ $carpool->max_seats}}</strong></p>
              <p>Bike Rack available: <?php echo $carpool['bike_capacity'] ? 'Yes' : 'No'; ?></p>  {{--{{ $element->bike_capacity }}--}}
              <p>Date & Time Departure: {{ $carpool->start_date }}</p>
              <p>Luggage allowed: <?php echo $carpool['lugage'] ? 'Yes' : 'No'; ?></p>
              <p>Dog allowed: <?php echo $carpool['pets_allowed'] ? 'Yes' : 'No'; ?></p>
              <p>Smokers allowed: <?php echo $carpool['smokers_allowed'] ? 'Yes' : 'No'; ?></p>
              <p>Asked price :  {{ $carpool->price }}</p>

       </div>
</x-layout>
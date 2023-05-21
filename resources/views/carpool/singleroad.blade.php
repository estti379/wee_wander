<div>
    <x-layout :pageTitle='$pageTitle'>
        <x-shareroad_card :element="$carpool"/>

        @foreach ($shareroad_card-> as $carpool)
        <li><x-shareroad_card :carpool="$carpool"/></li>
    @endforeach

        {{-- NEEDS TO BE DISPLAYED --}}
               <p>Seats available: <strong>{{ $carpool->max_seats}}</strong></p>
               <p>Bike Rack available: <?php echo $carpool['bike_capacity'] ? 'Yes' : 'No'; ?></p>  {{--{{ $element->bike_capacity }}--}}
               <p>Date & Time Departure: {{ $carpool->start_date }}</p>
               <p>Luggage allowed: <?php echo $carpool['lugage'] ? 'Yes' : 'No'; ?></p>
               <p>Dog allowed: <?php echo $carpool['pets_allowed'] ? 'Yes' : 'No'; ?></p>
               <p>Smokers allowed: <?php echo $carpool['smokers_allowed'] ? 'Yes' : 'No'; ?></p>
        <h1>test</h1>
       </x-layout>
       
       
       
       
       
</div>
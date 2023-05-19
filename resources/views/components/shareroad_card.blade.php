
<link rel="stylesheet" href="/css/carpool_card_style.css">


{{--================== SHARE ROAD CARD ==========================--}}
{{--@section ('last_carpool')--}}
@props(['element'])

<div class="shareroad_card">
    <h2>The carpool drives to {{ $element->start_adventure->trail->name }} on the {{ $element->start_adventure->start_date }}</h2>
        <p>Username: {{$element->carowner->username}}</p>
        <p>City Departure: {{ $element->start_location_long }},{{ $element->start_location_latit }}</p>  
        <p>Adventure Name: {{ $element->start_adventure->trail->name }} </p>                     
        <p>Adventure Location: {{ $element->end_location_long }},{{ $element->end_location_latit }}</p>           
        <p>Seats available: <strong>{{ $element->max_seats}}</strong></p>
        <p>Bike Rack available: <?php echo $element['bike_capacity'] ? 'Yes' : 'No'; ?></p>  {{--{{ $element->bike_capacity }}--}}
        <p>Date & Time Departure: {{ $element->start_date }}</p>
        <p>Luggage allowed: <?php echo $element['lugage'] ? 'Yes' : 'No'; ?></p>
        <p>Dog allowed: <?php echo $element['pets_allowed'] ? 'Yes' : 'No'; ?></p>
        <p>Smokers allowed: <?php echo $element['smokers_allowed'] ? 'Yes' : 'No'; ?></p>
        <p>Asked price :  {{ $element->price }}</p>
        <button><a href="#">Driver info</a></button><button><a href="/carpool/{{$element->id}}">carpool detais</a></button>
        <div>

@php
    //TO DO :move logic to controller
@endphp                 
<!--========================= Checks if it's the creator ===============================-->
            @if (Auth::check() && Auth::user()->id == $element->carowner->id)
                <button><a href="carpool/edit/{{$element->id}}">Edit</a>    
            @endif
                
            <div>
                <!--========================= Check if the user is logged in and not the car owner =========================-->
                @if (Auth::check() && Auth::user()->id != $element->carowner->id )
                    <!-- ========================= Button to join the carpool =========================-->
                    <form action="/carpool/join/{{ $element->id }}" method="POST">
                        @csrf
                        <button type="submit">Join Carpool</button>
                    </form>
                @endif
            </div>
        </div>
</div> 
{{--@endsection ('last_carpool')--}}





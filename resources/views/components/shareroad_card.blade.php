
<link rel="stylesheet" href="/css/carpool_card_style.css">


{{--================== SHARE ROAD CARD ==========================--}}
{{--@section ('last_carpool')--}}
@props(['element'])
<div class="card">
    <h5 class="card-header">This carpool drives to {{ $element->start_adventure->trail->name }} on the {{ $element->start_adventure->start_date }} <i class="fa-solid fa-car-side fa-bounce" style="color: #0ebc89;"></i></h5>
    <div class="card-body">
        <p>City Departure: {{ $element->start_location_long }},{{ $element->start_location_latit }}</p>  
        <p>Adventure Name: {{ $element->start_adventure->trail->name }} </p>                     
        <p>Adventure Location: {{ $element->end_location_long }},{{ $element->end_location_latit }}</p> 
        <p>Seats available: <strong>{{ $element->max_seats}}</strong></p>
        <p><strong>Asked price :  {{ $element->price }}€</strong></p>
        <a href="#"class="btn btn-primary">Driver info</a><a href="/carpool/{{$element->id}}" class="btn btn-primary">Carpool Details</a>
       
        {{--==TO TRANSFERT TO SINGLE ROAD==--}}
        {{--==============================--}}
        {{--{{ route('carpool.show', ['id' => 1]) }} OR "carpool/{{$element->id}}"--}}
        <div>
            <div>
                <div>


@php
    //TO DO :move logic to controller
@endphp                 
<!--========================= Checks if it's the creator ===============================-->
            @if (Auth::check() && Auth::user()->id == $element->carowner->id)
            <a href="carpool/edit/{{$element->id}}" class="btn btn-primary">Edit</a>  
            @endif
                
            <div>
                <!--========================= Check if the user is logged in and not the car owner =========================-->
                @if (Auth::check() && Auth::user() ->id!= $element->carowner->id )
                    <!-- ========================= Button to join the carpool =========================-->
                    <form action="/carpool/join/{{ $element->id }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Join Carpool</button>
                    </form>
                @endif
            </div>
        </div>
</div> 
{{--@endsection ('last_carpool')--}}





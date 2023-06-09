@pushOnce('style')
    <link rel="stylesheet" href="{{ URL::asset('/css/carpool_card_style.css') }}">
@endpushOnce


{{-- ================== SHARE ROAD CARD ========================== --}}
{{-- @section('last_carpool') --}}
@props(['element'])
<div class="card-body">

<h5 class="card-header" class="card text-center"> This carpool drives to {{ $element->start_adventure->trail->name }} on the {{ $element->start_date }}</h5>

    <p>City Departure: {{ $element->start_location_long }},{{ $element->start_location_latit }}</p>  
    <p>Adventure Name: {{ $element->start_adventure->trail->name }} </p>                     
    <p>Adventure Location: {{ $element->end_location_long }},{{ $element->end_location_latit }}</p> 
    <p>Seats available: <strong><x-carpool.seat-counter :element="$element"/></strong></p>
    <p><strong>Asked price :  {{ $element->price }}€</strong></p>
    <hr>
    <a href="/users/{{$element->carowner->id}}"class="btn btn-primary">Driver info</a><a href="/carpool/{{$element->id}}" class="btn btn-primary">Carpool Details</a>
    
    {{--==TO TRANSFERT TO SINGLE ROAD==--}}
    {{--==============================--}}
    {{--{{ route('carpool.show', ['id' => 1]) }} OR "carpool/{{$element->id}}"--}}

    @php
        //TO DO :move logic to controller
    @endphp
    <!--========================= Checks if it's the creator ===============================-->
    @if (Auth::check() && Auth::user()->id == $element->carowner->id)
        <a href="carpool/edit/{{ $element->id }}" class="btn btn-primary">Edit carpool</a>
    @endif

    <div>
        <x-carpool.join-button :element="$element" />
    </div>

</div>


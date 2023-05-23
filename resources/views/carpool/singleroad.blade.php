<x-layout :pageTitle='$pageTitle'>
    @push('style')
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    @endpush
    @push('scripts')
        {{-- Import leaflet library --}}
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        {{-- import leaflet library for route --}}
        <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.min.js"></script>
        {{-- JS script for markers on map  --}}
        <script src="{{ URL::asset('js/maps/leaflet-library-carpool-detail.js') }}"></script>
    @endpush

       
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
            {{-- Hidden inputs to retrieve info for the map of JS code --}}
            <input type="hidden" id="start_location_latit" value="{{ $carpool->start_location_latit }}">
            <input type="hidden" id="start_location_long" value="{{ $carpool->start_location_long }}">
            <input type="hidden" id="end_location_latit" value="{{ $carpool->end_location_latit }}">
            <input type="hidden" id="end_location_long" value="{{ $carpool->end_location_long }}">

            <div id="map" style="height: 400px;"></div>
              <a href="/carpool"  class="btn btn-primary">Back</a>
              @if (Auth::check() && Auth::user()->id == $carpool->carowner->id)
                <a href="/carpool/edit/{{$carpool->id}}" class="btn btn-primary">Edit</a>
            @endif
              <div>
                    <x-carpool.join-button :element="$carpool"/>
              </div>
       </div>
</div>
</x-layout>

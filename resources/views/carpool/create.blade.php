@push('style')
    <link rel="stylesheet" href="\css\carpool_card_style.css"/>
@endpush
@push('scripts')
{{-- Import leaflet library --}}
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
{{-- JS script for markers on map  --}}
  <script src="{{ URL::asset('js/maps/leaflet-library-carpool.js') }}"></script>
{{-- import leaflet library for route --}}
  <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.min.js"></script>

@endpush


            {{-- Create Carpool From --}}
            <x-layout :pageTitle=$pageTitle>
                <div class="createCarpool">
                <h2>Create Carpool</h2>
                
                <form method="POST" action="/carpool/create" enctype="multipart/form-data">  
                    @csrf 
                    {{-- BONUS FEATURE --}}
                    {{-- <label>Distance</label>
                    <input type="text" name="distance" placeholder="km"><br> --}}
                    
                    <label>Adventure</label>
                    <select value="adventure">
                        @foreach($adventures as $adventure)
                            <option value="{{ $adventure->trail_id }}">
                                Trail: {{ $adventure->trail->name }} | Start Date: {{ $adventure->start_date }}
                            </option>
                        @endforeach
                        </select> <br>
                    {{-- To Add id_start_adventure  Variable--}}

            
                    <label>Date</label>
                    <input type="date" name="start_date" placeholder="Date"><br>

            
                    <label>Free seats</label>
                    <select name="max_seats">
                        <option value="1">1</option> 
                        <option value="2">2</option> 
                        <option value="3">3</option> 
                        <option value="4">4</option>  
                    </select><br>
            
                    <label>Bike Rack available</label>
                    <input type="radio" name="bike_capacity" value="yes">
                    <input type="radio" name="bike_capacity" value="no"><br>

                    {{--  BONUS F.T --}}
                    {{-- <select name="bike_capacity">
                        <option value="false">0</option> 
                        <option value="1">1</option> 
                        <option value="2">2</option> 
                        <option value="3">3</option> 
                    </select><br>--}}
            
                    <label>Time</label>
                    <input type="Time" name="time" placeholder="Time"><br>
            
                    <label>Dog allowed</label>
                    <input type="radio" name="pets_allowed" value="yes">
                    <input type="radio" name="pets_allowed" value="no"><br>
            
                    <label>Luggage allowed</label>
                    <input type="radio" name="luggage" value="yes">
                    <input type="radio" name="luggage" value="no"><br>
            
                    <label>Smokers allowed</label>
                    <input type="radio" name="smokers_allowed" value="yes">
                    <input type="radio" name="smokers_allowed" value="no"><br>

                    <label>Asked price</label>
                    <input type="text" name="price" placeholder="0€"><br>
                    {{-- start location of carpool --}}
                    <input type="hidden" name="start_location_latit" id="start_location_latit" value="{{old('start_location_latit')}}">
                    <input type="hidden" name="start_location_long" id="start_location_long" value="{{old('start_location_long')}}">
                    {{-- end location of carpool --}}
                    <input type="hidden" name="end_location_latit" id="end_location_latit" value="{{old('end_location_latit')}}">
                    <input type="hidden" name="end_location_long" id="end_location_long" value="{{old('end_location_long')}}">
                    {{-- Submit carpool --}}
                    <button type="submit">Create Carpool</button>
                </form>
                </div>
                <span>Choose a location: </span>
                <div id="map" style="height: 400px;">
                </div>
            </x-layout>
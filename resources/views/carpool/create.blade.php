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
                <h5>Create an Carpool <i class="fa-solid fa-car-side fa-bounce" style="color: #0ebc89;"></i></h5>
                
                <form method="POST" action="/carpool/create" enctype="multipart/form-data">  
                    @csrf 
                    {{-- BONUS FEATURE --}}
                    {{-- <label>Distance</label>
                    <input type="text" name="distance" placeholder="km"><br> --}}
                    
                   <label class="input-group-text"><i class="fa-solid fa-location-dot fa-beat" style="color: #0ebc89;"></i>Adventure</label>
                    <select class="form-select" aria-label="Default select example" value="adventure">
                        @foreach($adventures as $adventure)
                            <option value="{{ $adventure->trail_id }}">
                                Trail: {{ $adventure->trail->name }} | Start Date: {{ $adventure->start_date }}
                            </option>
                        @endforeach
                        </select> <br>
                    {{-- To Add id_start_adventure  Variable--}}

            
                    <label class="input-group-text">Date</label>
                    <input class="input-group-text" type="date" name="start_date" placeholder="Date"><br>
                    <label class="input-group-text">Time</label>
                    <input class="input-group-text" type="Time" name="time" placeholder="Time"><br>
            
                    <label>Free seats <i class="fa-solid fa-chair" style="color:  #0ebc89;"></i></label>
                    <select class="form-select" aria-label="Default select example" name="max_seats">
                        <option value="1">1</option> 
                        <option value="2">2</option> 
                        <option value="3">3</option> 
                        <option value="4">4</option>  
                    </select><br>
            
                    <label><i class="fa-solid fa-bicycle" style="color:  #0ebc89;"></i>Bike Rack available</label>
                    <input class="form-check-input" type="checkbox" name="bike_capacity" value="yes"><br>

                    {{--  BONUS F.T --}}
                    {{-- <select name="bike_capacity">
                        <option value="false">0</option> 
                        <option value="1">1</option> 
                        <option value="2">2</option> 
                        <option value="3">3</option> 
                    </select><br>--}}
            
            
                    <label><i class="fa-solid fa-paw" style="color: #0ebc89;"></i> Pets allowed</label>
                    <input class="form-check-input" type="checkbox" name="pets_allowed"><br>
                
            
                    <label><i class="fa-solid fa-suitcase" style="color:  #0ebc89;"></i> Luggage allowed</label>
                    <input class="form-check-input" type="checkbox" name="luggage" value="yes"><br>
            
                    <label> <i class="fa-solid fa-smoking" style="color:  #0ebc89;"></i>Smokers allowed</label>
                    <input class="form-check-input" type="checkbox" name="smokers_allowed" value="yes"><br>

                    <label><i class="fa-solid fa-hand-holding-dollar" style="color:  #0ebc89;"></i>Asked price</label>
                    <input type="text" name="price" placeholder="0€"><br>
                    {{-- start location of carpool --}}
                    <input type="hidden" name="start_location_latit" id="start_location_latit" value="{{old('start_location_latit')}}">
                    <input type="hidden" name="start_location_long" id="start_location_long" value="{{old('start_location_long')}}">
                    {{-- end location of carpool --}}
                    <input type="hidden" name="end_location_latit" id="end_location_latit" value="{{old('end_location_latit')}}">
                    <input type="hidden" name="end_location_long" id="end_location_long" value="{{old('end_location_long')}}">
                    {{-- Submit carpool --}}
                    <button type="submit" class="btn btn-primary">Create Carpool</button>
                    <a href="/carpool" class="btn btn-primary">Cancel</a>
                </form>
                </div>
                <span><i class="fa-solid fa-location-dot fa-beat" style="color: #0ebc89;"></i>Choose a location : </span>
                <div id="map" style="height: 400px;">
                </div>
            </x-layout>
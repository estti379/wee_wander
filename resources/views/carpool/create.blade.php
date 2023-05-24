@push('style')
    <link rel="stylesheet" href="\css\carpool_card_style.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
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
    <h5>Create an Carpool</h5>

    <span><i class="fa-solid fa-location-dot fa-beat" style="color: #0ebc89;"></i> Choose Route</span><br>
    <span>Choose a starting and an ending point to your carpool</span>
    <button class="btn btn-primary" id="define-route">Define route</button>
    <div id="map" style="height: 400px; width;"></div>
    <form method="POST" action="/carpool/create" enctype="multipart/form-data">
        @csrf
        {{-- BONUS FEATURE --}}
        {{-- <label>Distance</label>
                    <input type="text" name="distance" placeholder="km"><br> --}}
        <label class="input-group-text"><i class="fa-solid fa-location-dot fa-beat"
                style="color: #0ebc89;"></i>Adventure</label>
        <select class="form-select" aria-label="Default select example" value="adventure">
            @foreach ($adventures as $adventure)
                <option value="{{ $adventure->trail_id }}">
                    Trail: {{ $adventure->trail->name }} | Start Date: {{ $adventure->start_date }}
                </option>
            @endforeach
        </select> <br>

        <label class="input-group-text">Date</label>
        <input class="input-group-text" type="date" name="start_date" placeholder="Date"><br>
        <label class="input-group-text">Time</label>
        <input class="input-group-text" type="Time" name="time" placeholder="Time"><br>

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

        <label><i class="fa-solid fa-bicycle" style="color:  #0ebc89;"></i>Bike Rack available</label>
        <input class="form-check-input" type="checkbox" name="bike_capacity" value="yes"><br>

                    <span><i class="fa-solid fa-location-dot fa-beat" style="color: #0ebc89;"></i>Choose a location : </span>
                    {{-- Map --}}
                    <div id="map" style="height: 400px;">
                    </div>
                    {{-- Submit carpool --}}
                    <button class="btn btn-primary" id="define-route">Validate route</button>
                    <button type="submit" class="btn btn-primary">Create Carpool</button>
                    <a href="/carpool" class="btn btn-primary">Cancel</a>
                </form>
            </div>
        </div>
            </div>
            </x-layout>
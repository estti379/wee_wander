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
    <div class="card">
        <h5 class="card-header">Create an Carpool <i class="fa-solid fa-car-side  fa-lg fa-bounce"
                style="color: #ffffff;"></i></h5>
        <div class="card-body">
            <span>Choose a starting <i class="fa-solid fa-location-dot" style="color: #0ebc89;"></i> and an ending point
                <i class="fa-solid fa-location-dot" style="color: #0ebc89;"></i> to your carpool :</span>
            <div id="map" style="height: 400px; width;"></div>
            <button class="btn btn-primary" id="define-route">Define route</button>
            <form method="POST" action="/carpool/create" enctype="multipart/form-data">
                @csrf
                {{-- start location of carpool --}}
                <input type="hidden" name="start_location_latit" id="start_location_latit"
                    value="{{ old('start_location_latit') }}">
                <input type="hidden" name="start_location_long" id="start_location_long"
                    value="{{ old('start_location_long') }}">
                {{-- end location of carpool --}}
                <input type="hidden" name="end_location_latit" id="end_location_latit"
                    value="{{ old('end_location_latit') }}">
                <input type="hidden" name="end_location_long" id="end_location_long"
                    value="{{ old('end_location_long') }}">

                <label class="input-group-text">Adventure<i class="fa-solid fa-location-dot fa-beat"
                        style="color: #0ebc89;"></i></label>
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

                <label><i class="fa-solid fa-paw" style="color: #0ebc89;"></i> Pets allowed</label>
                <input class="form-check-input" type="checkbox" name="pets_allowed"><br>


                <label><i class="fa-solid fa-suitcase" style="color:  #0ebc89;"></i> Luggage allowed</label>
                <input class="form-check-input" type="checkbox" name="luggage" value="yes"><br>

                <label> <i class="fa-solid fa-smoking" style="color:  #0ebc89;"></i>Smokers allowed</label>
                <input class="form-check-input" type="checkbox" name="smokers_allowed" value="yes"><br>

                <label><i class="fa-solid fa-bicycle" style="color:  #0ebc89;"></i>Bike Rack available</label>
                <input class="form-check-input" type="checkbox" name="bike_capacity" value="yes"><br>
                
                </div>
                <button type="submit" class="btn btn-primary">Create Carpool</button>
                <a href="/carpool" class="btn btn-primary">Cancel</a>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
</x-layout>

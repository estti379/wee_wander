@push('style')
    <link rel="stylesheet" href="/css/carpool_card_style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
@endpush
@push('scripts')
    {{-- Import leaflet library --}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    {{-- import leaflet library for route --}}
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.min.js"></script>
    {{-- JS script for markers on map  --}}
    <script src="{{ URL::asset('js/maps/leaflet-library-carpool-edit.js') }}"></script>
@endpush

<x-layout :pageTitle=$pageTitle>
    <div class="shareroad_card">
        <h2>Edit the carpool that drives to {{ $element->start_adventure->trail->name }} <br> on
            {{ $element->start_adventure->start_date }}</h2>
        <span><i class="fa-solid fa-location-dot fa-beat" style="color: #0ebc89;"></i> Choose Route</span><br>
        <span>Edit your starting and an your ending point of your carpool by dragging</span>
        <div id="map" style="height: 400px; width;"></div>
        <form method="POST" action="/carpool/{{ $element->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" id="start_location_latit" name="start_location_latit"
                value="{{ $element->start_location_latit }}">
            <input type="hidden" id="start_location_long" name="start_location_long"
                value="{{ $element->start_location_long }}">
            <input type="hidden" id="end_location_latit" name="end_location_latit"
                value="{{ $element->end_location_latit }}">
            <input type="hidden" id="end_location_long" name="end_location_long"
                value="{{ $element->end_location_long }}">

            <select class="form-select" aria-label="Default select example" value="adventure">
                @foreach ($adventures as $adventure)
                    <option value="{{ $adventure->trail_id }}">
                        Trail: {{ $adventure->trail->name }} | Start Date: {{ $adventure->start_date }}
                    </option>
                @endforeach
            </select><br>
            <div>
                <label for="start_date">Date & Time:</label>
                <input type="datetime-local" name="start_date"
                    value="{{ date('Y-m-d\TH:i', strtotime($element->start_date)) }}">
            </div>
            <div>
                <label for="max_seats">Seats available:</label>
                <input type="number" name="max_seats" value="{{ $element->max_seats }}">
            </div>

            <label for="bike_capacity">Bike Rack available:</label>
            <select name="bike_capacity">
                <option value="1" {{ $element->bike_capacity ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $element->bike_capacity ? '' : 'selected' }}>No</option>
            </select><br>
            <div>
                <label for="pets_allowed">Pets allowed:</label>
                <select name="pets_allowed">
                    <option value="1" {{ $element->pets_allowed ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $element->pets_allowed ? '' : 'selected' }}>No</option>
                </select>
            </div>

            <label for="bike_capacity">Luggage allowed:</label>
            <select name="bike_capacity">
                <option value="1" {{ $element->luggage ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $element->luggage ? '' : 'selected' }}>No</option>
            </select>

            <div>
                <label for="smokers_allowed">Smokers allowed:</label>
                <select name="smokers_allowed">
                    <option value="1" {{ $element->smokers_allowed ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $element->smokers_allowed ? '' : 'selected' }}>No</option>
                </select>
            </div>
            <div>
                <label for="price">Asked price</label>
                <input type="text" name="price" placeholder="0€"><br>
            </div>
            <button type="submit">update</button>
        </form>
        {{-- Needed to create another form for the delete button because of the request --}}
        <form action="/carpool/{{ $element->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    </div>
</x-layout>

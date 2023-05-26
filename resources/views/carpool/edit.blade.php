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
    <div class="card">
    <div class="card-box">
        <h5 class="card-header"> Carpool Edit</h5>
        <div class="card-body">
        <h2>Edit the carpool that drives to {{ $element->start_adventure->trail->name }} <br> on
            {{ $element->start_adventure->start_date }}</h2>
        <span><i class="fa-solid fa-location-dot fa-beat" style="color: #0ebc89;"></i> Choose Route</span><br>
        <span>Edit your starting and an your ending point of your carpool by dragging</span>
        <div id="map" style="height: 400px; width;"></div>
        <form method="POST" action="/carpool/{{ $element->id }}" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <input type="hidden" id="start_location_latit" name="start_location_latit"
                value="{{ old('start_location_latit', $element->start_location_latit) }}">
            <input type="hidden" id="start_location_long" name="start_location_long"
                value="{{ old('start_location_long', $element->start_location_long) }}">
            <input type="hidden" id="end_location_latit" name="end_location_latit"
                value="{{ old('end_location_latit', $element->end_location_latit)}}">
            <input type="hidden" id="end_location_long" name="end_location_long"
                value="{{ old('end_location_long', $element->end_location_long)}}">


            <select class="form-select" aria-label="Default select example" value="adventure">
                @foreach ($adventures as $adventure)
                    <option value="{{ $adventure->id }}"
                        @if (  old('adventure') == $adventure->id)
                            selected
                        @endif
                    >
                        Trail: {{ $adventure->trail->name }} | Start Date: {{ $adventure->start_date }}
                    </option>
                @endforeach
            </select><br>
            <div>
                <label for="start_date">Date & Time:</label>
                <input type="datetime-local" name="start_date"
                    value="{{ date('Y-m-d\TH:i', strtotime( old( 'start_date',$element->start_date) ))  }}">
                @error('start_date')
                    <p  class="validation-error">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="max_seats">Seats available:</label>
                <input type="number" name="max_seats" value="{{ old('max_seats',$element->max_seats) }}">
                @error('max_seats')
                    <p  class="validation-error">{{ $message }}</p>
                @enderror
            </div>

            <label for="bike_capacity">Bike Rack available:</label>
            <select name="bike_capacity">
                <option value="1" {{ old('bike_capacity',$element->bike_capacity) ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('bike_capacity',$element->bike_capacity) ? '' : 'selected' }}>No</option>
            </select><br>
            <div>
                <label for="pets_allowed">Pets allowed:</label>
                <select name="pets_allowed">
                    <option value="1" {{ old('pets_allowed',$element->pets_allowed) ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('pets_allowed',$element->pets_allowed)  ? '' : 'selected' }}>No</option>
                </select>
            </div>

            <label for="luggage">Luggage allowed:</label>
            <select name="luggage">
                <option value="1" {{ old('luggage',$element->luggage)  ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('luggage',$element->luggage) ? '' : 'selected' }}>No</option>
            </select>

            <div>
                <label for="smokers_allowed">Smokers allowed:</label>
                <select name="smokers_allowed">
                    <option value="1" {{ old('smokers_allowed',$element->smokers_allowed) ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('smokers_allowed',$element->smokers_allowed) ? '' : 'selected' }}>No</option>
                </select>
            </div>
            <div>
                <label for="price">Asked price</label>
                <input type="text" name="price" placeholder="0€" value="{{ old('price', $element->price) }}">
                @error('price')
                    <p class="validation-error">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
        {{-- Needed to create another form for the delete button because of the request --}}
        {{--<form action="/carpool/{{ $element->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary">Delete</button>
        </form>--}}
    </div>
    </div>
</div>
</x-layout>

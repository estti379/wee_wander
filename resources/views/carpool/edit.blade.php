<link rel="stylesheet" href="/css/carpool_card_style.css">

{{--================== SHARE ROAD CARD ==========================--}}

@props(['element'])

<div class="shareroad_card">
    <h2>The carpool drives to {{ $element->start_adventure->trail->name }} on {{ $element->start_adventure->start_date }}</h2>
    
    <form method="POST" action="/carpool/{{ $element->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div>
            <label for="carowner_id">Username:</label>
            <input type="text" name="carowner_id" value="{{ $element->carowner_id }}">
        </div>
        
        <div>
            <label for="start_location_long">City Departure:</label>
            <input type="text" name="start_location_long" value="{{ $element->start_location_long }}">
        </div>
        
        <div>
            <label for="start_location_latit">City Departure Latitude:</label>
            <input type="text" name="start_location_latit" value="{{ $element->start_location_latit }}">
        </div>
        
        <div>
            <label for="end_location_long">Adventure Location:</label>
            <input type="text" name="end_location_long" value="{{ $element->end_location_long }}">
        </div>
        
        <div>
            <label for="end_location_latit">Adventure Location Latitude:</label>
            <input type="text" name="end_location_latit" value="{{ $element->end_location_latit }}">
        </div>
        
        <div>
            <label for="max_seats">Seats available:</label>
            <input type="number" name="max_seats" value="{{ $element->max_seats }}">
        </div>
        
        <div>
            <label for="bike_capacity">Bike Rack available:</label>
            <input type="number" name="bike_capacity" value="{{ $element->bike_capacity }}">
        </div>
        
        <div>
            <label for="start_date">Date & Time:</label>
            <input type="datetime-local" name="start_date" value="{{ date('Y-m-d\TH:i', strtotime($element->start_date)) }}">
        </div>
        
        <div>
            <label for="lugage">Luggage allowed:</label>
            <select name="lugage">
                <option value="1" {{ $element->lugage ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $element->lugage ? '' : 'selected' }}>No</option>
            </select>
        </div>
        
        <div>
            <label for="pets_allowed">Dog allowed:</label>
            <select name="pets_allowed">
                <option value="1" {{ $element->pets_allowed ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $element->pets_allowed ? '' : 'selected' }}>No</option>
            </select>
        </div>
        
        <div>
            <label for="smokers_allowed">Smokers allowed:</label>
            <select name="smokers_allowed">
                <option value="1" {{ $element->smokers_allowed ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $element->smokers_allowed ? '' : 'selected' }}>No</option>
            </select>
        </div>
        
        <div>
            {{-- Needed to create another form for the delete button because of the request --}}
            <form action="/carpool/{{ $element->id }}" method="POST">
                @csrf
                @method('delete') 
                <button type="submit">Delete</button>
            </form>
        </div>
        
        <button type="submit">Update</button>
    </form>
</div>

@endsection

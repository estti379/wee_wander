@extends('layouts.app')
@section('title', 'Create Carpool ')


@section('content')
<h1>Update Carpool Info</h1>
  {{-- Form edit--}}
  <form method="POST" action="/carpool">  
    @csrf 
    <label>City Departure</label>
    <select name="start_location_long">
        <option value="city">-
            {{-- Foreach city loop inside of this row --}}
        </option>  
    </select><br>
    <label>Distance</label>
    <input type="text" name="distance" placeholder="km"><br>
    
    <label>Adventure</label>
    <select value="adventure">
        @foreach($adventures as $adventure)
            <option value="{{ $adventure->trail_id }}">
                Trail: {{ $adventure->trail->name }} | Start Date: {{ $adventure->start_date }}
            </option>
        @endforeach
        </select> <br>
    {{-- To Add id_start_adventure  Variable--}}

    @error('end_location')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror

    <label>Date</label>
    <input type="date" name="start_date" placeholder="Date"><br>
    @error('date')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror

    <label>Free seats</label>
    <select name="max_seats">
        <option value="1">1</option> 
        <option value="2">2</option> 
        <option value="3">3</option> 
        <option value="4">4</option>  
    </select><br>

    <label>Bike Rack available</label>
    <select name="bike_capacity">
        <option value="false">0</option> 
        <option value="1">1</option> 
        <option value="2">2</option> 
        <option value="3">3</option> 
    </select><br>

    <label>Time</label>
    <input type="Time" name="time" placeholder="Time"><br>
    @error('time')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror

    <label>Dog allowed</label>
    <input type="radio" name="pets_allowed" value="1">
    <input type="radio" name="pets_allowed" value="0"><br>

    <label>Luggage allowed</label>
    <input type="radio" name="luggage" value="1">
    <input type="radio" name="luggage" value="0"><br>

    <label>Smokers allowed</label>
    <input type="radio" name="smokers_allowed" value="1">
    <input type="radio" name="smokers_allowed" value="0"><br>

    <label>Asked price</label>
    <input type="text" name="price" placeholder="0€"><br>
    {{-- Submit carpool --}}
    <button type="submit">Edit Carpool</button>
</form>

  {{-- needed to create another form to delete button because of the request --}}
  <form action="/events/{{ $carpool->id }}" method="POST">
    @csrf
    @method('delete') 
    <button type="submit">Delete</button>
  </form>
@endsection
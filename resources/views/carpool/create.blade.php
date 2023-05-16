
            {{-- Create Carpool From --}}
<x-layout>
    <h2>Create Carpool<h2>
        
    <label>City Departure</label>
    <select name="">
        <option value="city">Luxemboug</option>  {{--Foreach city loop inside of this row--}}
    </select>
    <label>Adventure</label>
    <input type="text" name="" placeholder="end_location">

    <label>Date</label>
    <input type="date" name="date" placeholder="Date">

    <label>Free seats</label>
    <select name="seats">
        <option value="1">1</option> 
        <option value="2">2</option> 
        <option value="3">3</option> 
        <option value="4">4</option>  
    </select>

    <label>Bike Rack available</label>
    <select name="bikeRack">
        <option value="false">0</option> 
        <option value="1">1</option> 
        <option value="2">2</option> 
        <option value="3">3</option> 
    </select>

    <label>Time</label>
    <input type="time" name="date" placeholder="Time">

    <label>Dog allowed<label>
    <input type="radio" name="">

    <label>Luggage allowed<label>
        <input type="radio" name="luggage">
    <label>Smokers allowed<label>

    <input type="radio" name="">
    {{-- Submit carpool --}}
    <button type="submit">Create Carpool</button>
</x-layout>
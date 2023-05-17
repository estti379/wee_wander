<link rel="stylesheet" href="\css\carpool_card_style.css"/>
            {{-- Create Carpool From --}}
            <x-layout>
                <div class="createCarpool">
                <h2>Create Carpool</h2>
                
                <form method="POST" action="/carpool">  
                    @csrf 
                    <label>City Departure</label>
                    <select name="start_location_long">
                        <option value="city">-</option>  {{-- Foreach city loop inside of this row --}}
                    </select><br>

                    <label>Adventure</label>
                    <input type="text" name="end_location_long" placeholder="End Location"><br>
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
                    <input type="radio" name="pets_allowed" value="yes">
                    <input type="radio" name="pets_allowed" value="no"><br>
            
                    <label>Luggage allowed</label>
                    <select name="luggage">
                        <option value="false">0</option> 
                        <option value="1">1</option> 
                        <option value="2">2</option> 
                        <option value="3">3</option> 
                    </select><br>
            
                    <label>Smokers allowed</label>
                    <input type="radio" name="smokers_allowed" value="yes">
                    <input type="radio" name="smokers_allowed" value="no"><br>

                    <label>Asked price</label>
                    <input type="text" name="price" placeholder="0€"><br>
                    {{-- Submit carpool --}}
                    <button type="submit">Create Carpool</button>
                </form>
                </div>
            </x-layout>
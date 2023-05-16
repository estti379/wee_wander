
            {{-- Create Carpool From --}}
            <x-layout>
                <h2>Create Carpool</h2>
                <form method="POST" action="carpool/store">  
                    @csrf 
                    <label>City Departure</label>
                    <select name="city">
                        <option value="city">-</option>  {{-- Foreach city loop inside of this row --}}
                    </select><br>
                    <label>Adventure</label>
                    <input type="text" name="end_location" placeholder="End Location"><br>
                    @error('end_location')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            
                    <label>Date</label>
                    <input type="date" name="date" placeholder="Date"><br>
                    @error('date')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            
                    <label>Free seats</label>
                    <select name="seats">
                        <option value="1">1</option> 
                        <option value="2">2</option> 
                        <option value="3">3</option> 
                        <option value="4">4</option>  
                    </select><br>
            
                    <label>Bike Rack available</label>
                    <select name="bikeRack">
                        <option value="false">0</option> 
                        <option value="1">1</option> 
                        <option value="2">2</option> 
                        <option value="3">3</option> 
                    </select><br>
            
                    <label>Time</label>
                    <input type="time" name="time" placeholder="Time"><br>
                    @error('time')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
            
                    <label>Dog allowed</label>
                    <input type="radio" name="dog" value="yes">
                    <input type="radio" name="dog" value="no"><br>
            
                    <label>Luggage allowed</label>
                    <input type="radio" name="luggage" value="yes">
                    <input type="radio" name="luggage" value="no"><br>
            
                    <label>Smokers allowed</label>
                    <input type="radio" name="smokers" value="yes">
                    <input type="radio" name="smokers" value="no"><br>
            
                    {{-- Submit carpool --}}
                    <button type="submit">Create Carpool</button>
                </form>
            </x-layout>
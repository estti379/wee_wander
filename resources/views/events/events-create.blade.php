@push('scripts')
    <script src="{{ URL::asset('js/events/add-trail-button.js') }}"></script>
@endpush

<x-layout :pageTitle=$pageTitle>
    <div class="create_event_container">
      {{-- Form to create a new user --}}
      <form action="/events" method="POST">
        @csrf
        <span>Title of the event : </span>
        <input type="text" name="eventTitle"  value="{{old('eventTitle')}}"><br>
        @error('eventTitle')
            <span>{{$message}}</span>
        @enderror
        @php
            $newTrails = 0;
            if(session()->has("nbNewTrails")){
                $newTrails = session("nbNewTrails");
            }
        @endphp
        <div id="new-trail-inputs">
            @for ($i = 0; $i <= $newTrails; $i++)
                
            
            <div id="__{{$i}}">
                <hr>
                <label for="trail__{{$i}}">Select your trail : </label>
                <select name="trail__{{$i}}" >
                <option value="">Select a trail</option>
                @foreach ($trails as $trail)
                    <option value="{{ $trail->id }}"
                    @if (old('trail__'.$i) == $trail->id)
                        selected
                    @endif    
                    >{{ $trail->name }}</option>
                @endforeach
                </select>
                @error('trail__'.$i)
                    <span>{{$message}}</span>
                @enderror
                <br>
                <label for="starting_date__{{$i}}">Starting date : </label>
                <input type="date" name="starting_date__{{$i}}"  value="{{old('starting_date__'.$i)}}">
                <label for="start_time__{{$i}}">Starting Hour:</label>
                <input type="time" name="start_time__{{$i}}"  value="{{old('start_time__'.$i)}}">
                @error('starting_date__'.$i)
                    <span>{{$message}}</span>
                @enderror
                <br>
                <label for="due_date__{{$i}}">Due date : </label>
                <input type="date" name="due_date__{{$i}}"  value="{{old('due_date__'.$i)}}">
                <label for="end_time__{{$i}}">End Hour:</label>
                <input type="time" name="end_time__{{$i}}"  value="{{old('end_time__'.$i)}}">
                @error('due_date__'.$i)
                    <span>{{$message}}</span>
                @enderror
                <br>
            </div>

            @endfor
        
        </div>
        <hr>
        <button id="another-trail-button" name="__{{$newTrails+1}}">Add another trail</button>
        <br>
        @php
            session()->pull('nbNewTrails', 'default');
        @endphp
        <input type="submit" name="" value="Create Event">
      </form>

      

    </div>
  
  </x-layout>
  
@push('scripts')
    <script src="{{ URL::asset('js/events/add-trail-button.js') }}"></script>
@endpush

<x-layout :pageTitle=$pageTitle>
    <div class="card">
        <h5 class="card-header"> Create an Event <i class="fa-solid fa-person-hiking fa-bounce fa-lg" style="color: #ffffff;"></i></h5>
      {{-- Form to create a new user --}}
      <div class="card-body">
      <form action="/events" method="POST">
        @csrf
        <span class="input-group-text">Title of the event  :</span>
        <input type="text" class="form-control"name="eventTitle"  value="{{old('eventTitle')}}"><br>
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
                <label class="input-group-text" for="trail__{{$i}}">Select your trail : </label>
                <select class="form-select" name="trail__{{$i}}" >
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
                <label class="input-group-text" for="starting_date__{{$i}}">Starting date : </label>
                <input type="date" class="input-group-text" name="starting_date__{{$i}}"  value="{{old('starting_date__'.$i)}}">
                <label class="input-group-text" for="start_time__{{$i}}">Starting Hour:</label>
                <input type="time" class="input-group-text" name="start_time__{{$i}}"  value="{{old('start_time__'.$i)}}">
                @error('starting_date__'.$i)
                    <span>{{$message}}</span>
                @enderror
                <br>
                <label class="input-group-text"for="due_date__{{$i}}">Due date : </label>
                <input type="date" class="input-group-text" name="due_date__{{$i}}"  value="{{old('due_date__'.$i)}}">
                <label class="input-group-text" for="end_time__{{$i}}">End Hour:</label>
                <input type="time" class="input-group-text" name="end_time__{{$i}}"  value="{{old('end_time__'.$i)}}">
                @error('due_date__'.$i)
                    <span>{{$message}}</span>
                @enderror
                <br>
            </div>

            @endfor
        
        </div>
        
        <button class="btn btn-primary" id="another-trail-button" name="__{{$newTrails+1}}">Add another trail</button>
        <br>
        @php
            session()->pull('nbNewTrails', 'default');
        @endphp
        <hr>
        <input type="submit" class="btn btn-primary" name="" value="Create Event">
        <a href="/events" class="btn btn-primary">Cancel</a>
      </form>
    </div>

      

    </div>
  
  </x-layout>
  
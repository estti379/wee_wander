@push('scripts')
<script src="{{ URL::asset('js/events/add-trail-button.js') }}"></script>
@endpush

<x-layout :pageTitle=$pageTitle>
    <div class="create_event_container">
      {{-- Form to create a new user --}}
      <form action="/events" method="POST">
        @csrf
        <span>Title of the event : </span><input type="text" name="eventTitle"  value="{{old('eventTitle')}}"><br>
        <span>Select your trail : </span>
        <select name="trail" >
        <option value="{{old('trail')}}">Select a trail</option>
          @foreach ($trails as $trail)
            <option value="{{ $trail->id }}">{{ $trail->name }}</option>
          @endforeach
        </select><br>
        <span>Starting date : </span><input type="date" name="starting_date"  value="{{old('starting_date')}}">
        <label for="start_time">Starting Hour:</label><input type="time" id="start_time" name="start_time"  value="{{old('start_time')}}"><br>
        <span>Due date : </span><input type="date" name="due_date"  value="{{old('due_date')}}">
        <label for="end_time">End Hour:</label><input type="time" id="end_time" name="end_time"  value="{{old('end_time')}}"><br>
        <input type="submit" name="" value="Create Event">
      </form>
      @error('eventTitle')
        <p>{{$message}}</p>
      @enderror
      @error('trail')
        <p>{{$message}}</p>
      @enderror
      @error('start_date')
        <p>{{$message}}</p>
      @enderror
      @error('starting_date')
        <p>{{$message}}</p>
      @enderror
      @error('due_date')
        <p>{{$message}}</p>
      @enderror
      @error('end_time')
        <p>{{$message}}</p>
      @enderror
      <button id="another-trail-button">Add another trail</button>
    </div>
  
  </x-layout>
  
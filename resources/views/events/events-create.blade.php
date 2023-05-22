@push('scripts')
<script src="{{ URL::asset('js/events/add-trail-button.js') }}"></script>
@endpush

<x-layout :pageTitle=$pageTitle>
    <div class="create_event_container">
      {{-- Form to create a new user --}}
      <h2>Create-Event</h2>
      <div class="card">
        <div class="card-body">
          <form action="/events" method="POST">
            @csrf
            <div class="input-group mb-3">
            <span class="input-group-text">Title of the event : </span><input type="text" name="eventTitle"  value="{{old('eventTitle')}}"><br>
          </div>

            <span >Select your trail : </span>
            <select  class="form-select" aria-label="Default select example" name="trail" >
            <option value="{{old('trail')}}">Select a trail</option>
              @foreach ($trails as $trail)
                <option value="{{ $trail->id }}">{{ $trail->name }}</option>
              @endforeach
            </select><br>
            <div class="input-group mb-3">
            <span class="input-group-text">Starting date : </span><input type="date" name="starting_date"  value="{{old('starting_date')}}"class="input-group-text">
            </div>
            <label for="start_time">Starting Hour:</label><input type="time" id="start_time" name="start_time"  value="{{old('start_time')}}"class="input-group-text"><br>
            <span>Due date : </span><input type="date" name="due_date"  value="{{old('due_date')}}" class="input-group-text">
            <label for="end_time">End Hour:</label><input type="time" id="end_time" name="end_time"  value="{{old('end_time')}}" class="input-group-text"><br>
            <input type="submit" class="btn btn-primary" name="" value="Create Event">
            <button id="another-trail-button" class="btn btn-primary">Add another trail</button>
            <a href="/events"  class="btn btn-primary">Cancel</a>
          </form>
          <div>
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

          </div>
        </div>
      </div>
    </div>
  
  </x-layout>
  
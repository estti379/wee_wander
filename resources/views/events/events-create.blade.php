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
  
    {{-- JAVASCRIPT TO CREATE A NEW TRAIL IN create-event --}}
    <script>
      document.getElementById('another-trail-button').addEventListener('click', function(e) {
        e.preventDefault();
        
        // Clone the 'trail' select input
        var trailInput = document.querySelector('select[name="trail"]');
        var clonedTrailInput = trailInput.cloneNode(true);
        
        // Create a span for the trail select
        var trailSpan = document.createElement('span');
        trailSpan.textContent = 'Select your trail : ';
    
        // Clone the 'starting_date' input
        var startingDateInput = document.querySelector('input[name="starting_date"]');
        var clonedStartingDateInput = startingDateInput.cloneNode(true);
  
        // Create a span for the starting_date input
        var startingDateSpan = document.createElement('span');
        startingDateSpan.textContent = 'Starting date : ';
        
        // Clone the 'start_time' input
        var startingTimeInput = document.querySelector('input[name="start_time"]');
        var clonedStartingTimeInput = startingTimeInput.cloneNode(true);
  
        // Create a label for the 'start_time' input
        var startingTimeLabel = document.createElement('label');
        startingTimeLabel.textContent = 'Starting Hour:';
  
        // Clone the 'due_date' input
        var dueDateInput = document.querySelector('input[name="due_date"]');
        var clonedDueDateInput = dueDateInput.cloneNode(true);
  
        // Create a span for the due_date input
        var dueDateSpan = document.createElement('span');
        dueDateSpan.textContent = 'Due date : ';
  
        // Clone the 'end_time' input
        var endTimeInput = document.querySelector('input[name="end_time"]');
        var clonedEndTimeInput = endTimeInput.cloneNode(true);
  
        // Create a label for the 'end_time' input
        var endTimeLabel = document.createElement('label');
        endTimeLabel.textContent = 'End Hour:';
  
        // Get the form element
        var form = document.querySelector('form[action="/events"]');
        var submitButton = form.querySelector('input[type="submit"]');
    
              // Create a new trail title
        var newTrailTitle = document.createElement('h3');
        newTrailTitle.textContent = 'Choose another trail';
  
        // Insert new trail title, spans, and cloned elements before the submit button
        form.insertBefore(document.createElement('br'), submitButton);
        form.insertBefore(newTrailTitle, submitButton);
        form.insertBefore(trailSpan, submitButton);
        form.insertBefore(clonedTrailInput, submitButton);
        form.insertBefore(document.createElement('br'), submitButton);
        form.insertBefore(startingDateSpan, submitButton);
        form.insertBefore(clonedStartingDateInput, submitButton);
        form.insertBefore(startingTimeLabel, submitButton);
        form.insertBefore(clonedStartingTimeInput, submitButton);
        form.insertBefore(document.createElement('br'), submitButton);
        form.insertBefore(dueDateSpan, submitButton);
        form.insertBefore(clonedDueDateInput, submitButton);
        form.insertBefore(endTimeLabel, submitButton);
        form.insertBefore(clonedEndTimeInput, submitButton);
        form.insertBefore(document.createElement('br'), submitButton);
      });
    </script>
  </x-layout>
  
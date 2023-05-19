
<x-layout :pageTitle=$pageTitle>
  
<h1>Update Event Info</h1>

  <form action="/events/{{ $event->id }}" method="POST">
      @csrf
      @method('PUT')
      <span>Title of the event : </span><input type="text" name="eventTitle"  value="{{old('eventTitle', $event->title)}}"><br>
      <hr>
      @for($i = 0; $i < count($event->adventures); $i++)
      <hr>
        @php
          $adventure = $event->adventures[$i];
          $index = $adventure->id;
        @endphp
        <span>Select your trail : </span>
        <select name="trail_E{{$index}}" >
        <option value="">Select a trail</option>

          @foreach ($trails as $trail)
            <option value="{{ $trail->id }}" 
              @if (old('trail_E'.$index, $adventure->trail->id) == $trail->id)
              selected
          @endif>
          {{ $trail->name }}</option>

          @endforeach
        </select><br>
        @php
            $startDateSplit = explode(' ', $adventure->start_date);
            $dueDateSplit = explode(' ', $adventure->due_date);
        @endphp
        <span>Starting date : </span><input type="date" name="starting_date_E{{$index}}"  value="{{old('starting_date_E'.$index, $startDateSplit[0])}}">
        <label for="start_time">Starting Hour:</label><input type="time" id="start_time" name="start_time_E{{$index}}"  value="{{old('start_time_E'.$index, $startDateSplit[1])}}"><br>
        <span>Due date : </span><input type="date" name="due_date_E{{$index}}"  value="{{old('due_date_E'.$index, $dueDateSplit[0])}}">
        <label for="end_time">End Hour:</label><input type="time" id="end_time" name="end_time_E{{$index}}"  value="{{old('end_time_E'.$index, $dueDateSplit[1])}}"><br>
        
        @error('trail_E'.$index)
          <p>{{$message}}</p>
        @enderror
        
        @error('starting_date_E'.$index)
          <p>{{$message}}</p>
        @enderror

        @error('start_time_E'.$index)
          <p>{{$message}}</p>
        @enderror

        @error('due_date_E'.$index)
          <p>{{$message}}</p>
        @enderror

        @error('end_time_E'.$index)
          <p>{{$message}}</p>
        @enderror

        @endfor
        @error('eventTitle')
          <p>{{$message}}</p>
        @enderror


        <input type="submit" value="Update Event">
      </form>

  {{-- needed to create another form to delete button because of the request --}}
  <form action="/events/{{ $event->id }}" method="POST">
    @csrf
    @method('delete') 
    <button type="submit">Delete</button>
  </form>
</x-layout>
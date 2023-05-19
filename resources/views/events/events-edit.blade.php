
<x-layout :pageTitle=$pageTitle>
<h1>Update Event Info</h1>
    <form action="/events/{{ $event->id }}" method="POST">
      @csrf
      @method('PUT')
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
      <input type="submit" name="" value="Update Event">
    </form>

  {{-- needed to create another form to delete button because of the request --}}
  <form action="/events/{{ $event->id }}" method="POST">
    @csrf
    @method('delete') 
    <button type="submit">Delete</button>
  </form>
</x-layout>
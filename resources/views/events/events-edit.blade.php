
<x-layout :pageTitle=$pageTitle>
<h1>Update Event Info</h1>
  {{-- Form to create a new user --}}
  <form action="/events/{{ $event->id }}" method="POST">
    @csrf
    @method('PUT')
    <span>Title of the event : </span><input type="text" name="eventTitle" value="{{ $event->title }}"><br>
      <span>Select your trail : </span>
      <select name="trail" >
      <option value="Select a trail">Select a trail</option>
      @foreach ($trails as $trail)
      <option value="{{ $trail->id }}" {{ $event->trail == $trail->id ? 'selected' : '' }}>{{ $trail->name }}</option>
      @endforeach
      </select><br>
      <span>Starting date : </span><input type="date" name="starting_date"><br>
      <span>Due date : </span><input type="date" name="due_date"><br>
      <input type="submit" name="" value="Update Event">
  </form>

  {{-- needed to create another form to delete button because of the request --}}
  <form action="/events/{{ $event->id }}" method="POST">
    @csrf
    @method('delete') 
    <button type="submit">Delete</button>
  </form>
</x-layout>
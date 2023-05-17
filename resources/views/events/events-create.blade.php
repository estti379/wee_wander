@extends('layouts.app')
@section('title', 'Create Events Page')



@section('content')
<div class="create_event_form">
  {{-- Form to create a new user --}}
  <form action="/events" method="POST">
    @csrf
    <span>Title of the event : </span><input type="text" name="eventTitle"><br>
    <span>Select your trail : </span>
    <select name="trail" >
    <option value="Select a trail">Select a trail</option>
      @foreach ($trails as $trail)
        <option value="{{ $trail->id }}">{{ $trail->name }}</option>
      @endforeach
    </select><br>
    <span>Starting date : </span><input type="date" name="starting_date"><br>
    <span>Due date : </span><input type="date" name="due_date"><br>
    <input type="submit" name="" value="Create Event">
  </form>
</div>
@endsection
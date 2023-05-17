@extends('layouts.app')
@section('title', 'Create Events Page')


@section('content')
<h1>Update Event Info</h1>
  {{-- Form to create a new user --}}
  <form action="/events/{{ $event->id }}" method="POST">
    @csrf
    @method('PUT')
    <span>Title of the event : </span><input type="text" name="eventTitle" value="{{ $event->title }}"><br>
    <input type="submit" name="" value="Update Event">
  </form>

  {{-- needed to create another form to delete button because of the request --}}
  <form action="/events/{{ $event->id }}" method="POST">
    @csrf
    @method('delete') 
    <button type="submit">Delete</button>
  </form>
@endsection
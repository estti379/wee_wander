@extends('layouts.app')
@section('title', 'Create Carpool ')


@section('content')
<h1>Update Carpool Info</h1>
  {{-- Form to create a new user --}}
  <form action="/carpool/{{ $carpool->id }}" method="POST">
    @csrf
    @method('PUT')
    <span>Title of the event : </span><input type="text" name="eventTitle" value="{{ $carpool->title }}"><br>
    <input type="submit" name="" value="Update carpool">
  </form>

  {{-- needed to create another form to delete button because of the request --}}
  <form action="/events/{{ $carpool->id }}" method="POST">
    @csrf
    @method('delete') 
    <button type="submit">Delete</button>
  </form>
@endsection
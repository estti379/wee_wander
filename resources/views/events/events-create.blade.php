@extends('layouts.app')
@section('title', 'Create Events Page')



@section('content')
  {{-- Form to create a new user --}}
  <form action="/events" method="POST">
    @csrf
    <span>Title of the event : </span><input type="text" name="eventTitle"><br>
    <!--
    <span>Starting Date : </span></label><input type="date" name=""><br>
    <span>Due Date : </span><input type="date" name=""><br>
    <span>Trail : </span>
    <select name="">
      <option value="">Trail 1</option>
      <option value="">Trail 2</option>
      <option value="">Trail 3</option>
    </select><br>
     -->
    <input type="submit" name="" value="Criar Evento">
  </form>
@endsection
@extends('layouts.app')

@section('title', 'Event Details')
@section('content')

  <ul>
    <p>Event Id : {{ $event->id}}</p>
    <p>Event title : {{ $event['title']}}</p>
    
    @foreach($event->adventures as $adventure)
          <p>Trail title : {{ $adventure->trail->name }}</p>
          <p>Starting Time: {{ $adventure->start_date }}</p>
        @endforeach
  </ul>
  <x-trailcard />
  
@endsection


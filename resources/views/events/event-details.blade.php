@extends('layouts.app')

@section('title', 'Event Details')
@section('content')

  <ul>
    <p>Event title : {{ $event['title']}}</p>
    <p>Adventure start date {{ $adventure[0]['start_date'] }} </p>
    
    
  </ul>
  <x-trailcard />
  
@endsection


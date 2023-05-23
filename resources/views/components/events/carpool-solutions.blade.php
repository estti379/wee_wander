@props(['adventure'])
@php
    $timeOffset = "-8 hour";
    $solutions = DB::table("routes")->whereBetween('start_date', [new DateTime($adventure->start_date." ".$timeOffset), new DateTime($adventure->start_date)])
        ->count();
@endphp
@if ($solutions == 0)
    <p>No carpool solution were found! 
        @if (Auth::check())
            <a href="/carpool/create">Create new carpool?</a>
        @endif
    </p>
@else
    <p>{{$solutions}} carpool solutions found! 
    <a href="/carpool?day={{$adventure->start_date}}&offset={{$timeOffset}}">Show carpool Solutions</a>
@endif

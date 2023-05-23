@props(['carpool'])

@php

    $carpoolId = $carpool->id;
    $participants = App\Models\User::whereHas('participatingInRoutes',  function($query) use ($carpoolId){
            $query->where('route_id', $carpoolId);
        })
        ->get();
@endphp
<h5>Other Riders:</h5>
<ul>
@foreach ($participants as $user)
    <li>
        <a href="/users/{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</a> will be carpooling!
    </li>
@endforeach
<ul>
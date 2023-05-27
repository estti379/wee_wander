@props(['adventure'])

@php    
    $adventurelId = $adventure->id;
    $participants = App\Models\User::whereHas('participatingInAdventures',  function($query) use ($adventurelId){
            $query->where('adventure_id', $adventurelId);
        })
        ->count();
@endphp

@if ($participants == 0)
    <p>There are no other participants for this adventure.</p>
@else
    <p>
        There are {{$participants}} participants for this adventure. Click here to see ->
        <a href="/adventure/participants/{{$adventurelId}}"><i class="fa-solid fa-people-group fa-bounce fa-lg" style="color: #0ebc89"></i></a>
    </p>
@endif
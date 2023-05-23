@props(['element'])

<!--========================= Check if the user is logged in and not the car owner =========================-->
@if (Auth::check() && Auth::user() ->id!= $element->carowner->id )
    <!-- ========================= Button to join the carpool =========================-->
    @php
        $occupiedSeats = count($element->participants);
        $isSeatFree = ($element->max_seats - $occupiedSeats) > 0;
        $alreadyJoined = $element->participants->where("id", Auth::user()->id)->count() > 0;
                
    @endphp
    @if ( $isSeatFree && !$alreadyJoined)
        <form action="/carpool/join/{{ $element->id }}" method="POST">
        @csrf
            <button type="submit" class="btn btn-primary">Join Carpool</button>
        </form>
    @else
        @if ($alreadyJoined)
            <span>You are already part of this Carpool</span>
            <form action="/carpool/withdraw/{{ $element->id }}" method="POST">
                @csrf
                    <button type="submit" class="btn btn-primary">Withdraw from Carpool</button>
                </form>
        @endif
    @endif

@endif
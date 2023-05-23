@props(['adventure'])

<!--========================= Check if the user is logged in =========================-->
@if (Auth::check())
    <!-- ========================= Button to join the adventure =========================-->
    @php
        $alreadyJoined = $adventure->participants->where("id", Auth::user()->id)->count() > 0;
                
    @endphp
    @if (!$alreadyJoined)
        <form action="/adventure/join/{{ $adventure->id }}" method="POST">
        @csrf
            <button type="submit" class="btn btn-primary">Join Adventure</button>
        </form>
    @else
        @if ($alreadyJoined)
            <span>You are already part of this Adventure</span>
            <form action="/adventure/withdraw/{{ $adventure->id }}" method="POST">
                @csrf
                    <button type="submit" class="btn btn-primary">Withdraw from Adventure</button>
                </form>
        @endif
    @endif

@endif
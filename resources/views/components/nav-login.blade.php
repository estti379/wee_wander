
@if (Auth::check())
    @php
        $sessionUser = Auth::user()
    @endphp
    <span>Hello {{$sessionUser->firstname}} {{$sessionUser->lastname}}</span>
    <a href="/profile">Show profile</a>
    <a href="/logout">Logout</a>
@else
    <a href="/login">Sign in</a>
    <a href="/register">Register</a>
@endif



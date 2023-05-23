
@if (Auth::check())
    @php
        $sessionUser = Auth::user()
    @endphp
    <span>Hello {{$sessionUser->firstname}} {{$sessionUser->lastname}}</span>
    <a href="/profile">profile <i class="fa-solid fa-user fa-xl" style="color: #f5f5f5;"></i></a>
    <a href="/logout">Logout</a>
@else
    <a href="/login">Sign in</a>
    <a href="/register">Register</a>
@endif



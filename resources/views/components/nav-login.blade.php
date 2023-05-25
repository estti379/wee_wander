
@if (Auth::check())
    @php
        $sessionUser = Auth::user()
    @endphp
    <span>Hello {{$sessionUser->firstname}} {{$sessionUser->lastname}}</span>
    <a href="/profile"><i class="fa-solid fa-user fa-xl" style="color: #ffffff;"></i> Profile </a>
    <a href="/logout"> <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>Logout</a>
@else
    <a href="/login"> <i class="fa-solid fa-user fa-xl" style="color: #ffffff;"></i>Sign in</a>
    <a href="/register"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>Register</a>
@endif



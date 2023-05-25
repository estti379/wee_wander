
@if (Auth::check())
    @php
        $sessionUser = Auth::user()
    @endphp
    <p class="wrap">Hello,<br> {{$sessionUser->firstname}} {{$sessionUser->lastname}}</p>
    <div class="wrap">
    </div>
        <a href="/profile"><i class="fa-solid fa-user fa-xl" style="color: #ffffff;"></i> Profile </a>
        <a href="/logout"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i> Logout</a>
@else
    <div>
        <a href="/login">Sign in</a>
        <a href="/register">Register</a>
    </div>
    <a href="/login"> <i class="fa-solid fa-user fa-xl" style="color: #ffffff;"></i>Sign in</a>
    <a href="/register"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>Register</a>
@endif



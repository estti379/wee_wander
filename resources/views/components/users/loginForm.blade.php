<form method="POST" action="/users/authenticate">
    @csrf
    <label for="userName">UserName</label>
    <input type="text" name="userName" placeholder="username" value="{{old('userName')}}">
    @error('userName')
        <p>{{$message}}</p>
    @enderror
    <br>

    <label for="password">Password</label>
    <input type="password" name="password" placeholder="password">
    @error('password')
        <p>{{$message}}</p>
    @enderror
    <br>

    <p>
        Don't have an account?
        <a href="/register">Register</a>
    </p>

    <input type="submit" value="Sign In">
</form>
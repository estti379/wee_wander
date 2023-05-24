<form method="POST" action="/users/authenticate">
    @csrf
    <label for="userName">UserName</label>
    <input class="form-control" type="text" name="userName" placeholder="username" value="{{old('userName')}}">
    @error('userName')
        <p>{{$message}}</p>
    @enderror
    <br>

    <label for="password">Password</label>
    <input class="form-control" type="password" name="password" placeholder="password">
    @error('password')
        <p>{{$message}}</p>
    @enderror
    <br>

    <p>
        Don't have an account?
        <a href="/register">Register</a>
    </p>

    <input type="submit" class="btn btn-primary" value="Sign In">
</form>
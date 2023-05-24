<x-layout :pageTitle="$pageTitle">

    <div class="card">
        <h5 class="card-header">Register</h5>
        <div class="card-body">
    <form method="POST" action="/users">
        @csrf
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" value={{old('username')}}>
        @error('username')
            <p>{{$message}}</p>
        @enderror
        <br>

        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="firstname" placeholder="First Name" value={{old('firstname')}}>
        @error('firstname')
            <p>{{$message}}</p>
        @enderror
        <br>

        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" name="lastname" placeholder="Last Name" value={{old('lastname')}}>
        @error('lastname')
            <p>{{$message}}</p>
        @enderror
        <br>
        
        <label for="email">E-mail</label>
        <input type="email" class="form-control" name="email" placeholder="E-mail" value={{old('email')}}>
        @error('email')
            <p>{{$message}}</p>
        @enderror
        <br>
        
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" value={{old('password')}}>
        @error('password')
            <p>{{$message}}</p>
        @enderror
        <br>

        <label for="password_confirmation">Confirm password</label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat password" value={{old('password_confirmation')}}>
        @error('password_confirmation')
            <p>{{$message}}</p>
        @enderror
        <br>

        <input type="submit" class="btn btn-primary" value ="Sign Up">
    </form>
        </div>
    </div>
</x-layout>
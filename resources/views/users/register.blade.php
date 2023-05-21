<x-layout :pageTitle="$pageTitle">
    <form method="POST" action="/users">
        @csrf
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" value={{old('username')}}>
        @error('username')
            <p>{{$message}}</p>
        @enderror
        <br>

        <label for="firstname">First Name</label>
        <input type="text" name="firstname" placeholder="First Name" value={{old('firstname')}}>
        @error('firstname')
            <p>{{$message}}</p>
        @enderror
        <br>

        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" placeholder="Last Name" value={{old('lastname')}}>
        @error('lastname')
            <p>{{$message}}</p>
        @enderror
        <br>
        
        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="E-mail" value={{old('email')}}>
        @error('email')
            <p>{{$message}}</p>
        @enderror
        <br>
        
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" value={{old('password')}}>
        @error('password')
            <p>{{$message}}</p>
        @enderror
        <br>

        <label for="password_confirmation">Confirm password</label>
        <input type="password" name="password_confirmation" placeholder="Repeat password" value={{old('password_confirmation')}}>
        @error('password_confirmation')
            <p>{{$message}}</p>
        @enderror
        <br>

        <input type="submit" value ="Sign Up">
    </form>
</x-layout>
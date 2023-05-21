@props(['userDetails'])
@push('scripts')
    <script src="{{ URL::asset('js/users/changeUserSensitive.js') }}"></script>
@endpush

@if ( !$errors->has("username") && !$errors->has("email") && !$errors->has("password") )
    <button id="changeSensitiveBtn">Change login details</button>
@endif

<div id="changeSensitiveFormContainer">
    
    <form id="changeSensitiveForm" method="POST" action="/users/updateSensitive">
        @csrf
        @method('PUT')
        <label for="username">New Username:</label>
        <input type="text" name="username" placeholder="userame" value={{old('username', $userDetails->username)}}>
        @error('username')
            <span>{{$message}}</span>
        @enderror
        <br>
        <label for="email">New E-mail:</label>
        <input type="email" name="email" placeholder="E-mail" value={{old('email', $userDetails->email)}}>
        @error('email')
            <span>{{$message}}</span>
        @enderror
        <br>
        <label for="password">New Last Name:</label>
        <input type="password" name="password" placeholder="password">
        @error('password')
            <span>{{$message}}</span>
        @enderror
        <br>
        <label for="password_confirmation">New Last Name:</label>
        <input type="password" name="password_confirmation" placeholder="password">
        @error('password_confirmation')
            <span>{{$message}}</span>
        @enderror
        <br>
        <input type="submit" value="Save LogIn information">
    </form>
</div>
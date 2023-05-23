@props(['userDetails'])
@push('scripts')
    <script src="{{ URL::asset('/js/users/changeUserSensitive.js') }}"></script>
@endpush

@if ( !$errors->has("username") && !$errors->has("email") && !$errors->has("password") )
    <button id="changeSensitiveBtn" class="btn btn-primary">Change login details</button>
@endif

<div id="changeSensitiveFormContainer">
    
    <form id="changeSensitiveForm" method="POST" action="/users/updateSensitive">
        @csrf
        @method('PUT')
        <label class="input-group-text" for="username">New Username:</label>
        <input type="text" class="form-control" name="username" placeholder="userame" value={{old('username', $userDetails->username)}}>
        @error('username')
            <span>{{$message}}</span>
        @enderror
        <br>
        <label class="input-group-text" for="email">New E-mail:</label>
        <input type="email" class="form-control" name="email" placeholder="E-mail" value={{old('email', $userDetails->email)}}>
        @error('email')
            <span>{{$message}}</span>
        @enderror
        <br>
        <label class="input-group-text" for="password">New Password:</label>
        <input type="password" class="form-control" name="password" placeholder="password">
        @error('password')
            <span>{{$message}}</span>
        @enderror
        <br>
        <label class="input-group-text" for="password_confirmation">Repeat Password:</label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="password">
        @error('password_confirmation')
            <span>{{$message}}</span>
        @enderror
        <br>
        <input type="submit" value="Save LogIn information">
    </form>
</div>
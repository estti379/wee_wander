@props(['userDetails'])
@push('scripts')
    <script src="{{ URL::asset('js/users/changeUserName.js') }}"></script>
@endpush

@if ( !$errors->has("firstname") && !$errors->has("lastname"))
    <button id="changeNameBtn">Change Name</button>
@endif

<div id="changeNameFormContainer">
    
    <form id="changeNameForm" method="POST" action="/users/updateName">
        @csrf
        @method('PUT')
        <label for="firstname">New First Name:</label>
        <input type="text" name="firstname" placeholder="First Name" value={{old('firstname', $userDetails->firstname)}}>
        @error('firstname')
            <span>{{$message}}</span>
        @enderror
        <br>
        <label for="lastname">New Last Name:</label>
        <input type="text" name="lastname" placeholder="Last Name" value={{old('lastname', $userDetails->lastname)}}>
        @error('lastname')
            <span>{{$message}}</span>
        @enderror
        <br>
        <input type="submit" value="Save Name">
    </form>
</div>
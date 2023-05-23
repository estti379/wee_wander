@props(['userDetails'])
@push('scripts')
    <script src="{{ URL::asset('/js/users/changeUserName.js') }}"></script>
@endpush

@if ( !$errors->has("firstname") && !$errors->has("lastname"))
    <button id="changeNameBtn" class="btn btn-primary">Change Name</button>
@endif

<div id="changeNameFormContainer">
    
    <form id="changeNameForm" method="POST" action="/users/updateName">
        @csrf
        @method('PUT')
        <div class="input-group">
        <label for="firstname" class="input-group-text">New First Name:</label>
        <input type="text" class="form-control" name="firstname" placeholder="First Name" value={{old('firstname', $userDetails->firstname)}}>
        @error('firstname')
            <span>{{$message}}</span>
        @enderror
        <br>
        <label for="lastname" class="input-group-text">New Last Name:</label>
        <input type="text" class="form-control" name="lastname" placeholder="Last Name" value={{old('lastname', $userDetails->lastname)}}>
        @error('lastname')
            <span>{{$message}}</span>
        @enderror
        <br>
        </div>
        <input type="submit" value="Save Name" class="btn btn-primary">
    </form>
</div>


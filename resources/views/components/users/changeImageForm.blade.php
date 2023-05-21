@props(['userDetails'])
@push('scripts')
    <script src="{{ URL::asset('js/users/changeUserImage.js') }}"></script>
@endpush

@if ( !$errors->has("picture"))
    <button id="changeImageBtn">Change Image</button>
@endif

<div id="changeImageFormContainer">
    <form id="changeImageForm" method="POST" action="/users/updateImage">
        @csrf
        @method('PUT')
        <label for="picture">New image URL:</label>
        <input type="text" name="picture" placeholder="Image URL" value={{old('picture', $userDetails->picture)}}>
        @error('picture')
            <span>{{$message}}</span>
        @enderror
        <input type="submit" value="Save Image">
    </form>
</div>
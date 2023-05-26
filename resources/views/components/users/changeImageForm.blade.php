@props(['userDetails'])
@push('scripts')
    <script src="{{ URL::asset('/js/users/changeUserImage.js') }}"></script>
@endpush

@if ( !$errors->has("picture"))
    <button id="changeImageBtn" class="btn btn-primary">Change Image</button>
@endif

<div id="changeImageFormContainer">
    <form id="changeImageForm" method="POST" action="/users/updateImage">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="picture" class="form-label">New image URL:</label>
            <input type="text" class="form-control" name="picture" placeholder="Image URL" value={{old('picture', $userDetails->picture)}}>
            @error('picture')
                <span class="validation-error">{{$message}}</span>
            @enderror
        </div>
        <input type="submit" value="Save Image" class="btn btn-primary">
    </form>
</div>
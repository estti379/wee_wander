@props(['userDetails'])
@push('scripts')
    <script src="{{ URL::asset('js/users/changeUserBio.js') }}"></script>
@endpush


<p id="descriptionParagraph">{{$userDetails->description}}</p>
<button id="changeBioBtn">Change Bio</button>


<div id="changeBioFormContainer">
    
    <form id="changeBioForm" method="POST" action="/users/updateBio">
        @csrf
        @method('PUT')
        <textarea id="description2" name="description2" placeholder="Enter Bio here...">{{$userDetails->description}}</textarea>
        <textarea name="description" placeholder="Enter Bio here...">{{$userDetails->description}}</textarea>

        <br>
        <input type="submit" value="Save Bio">
    </form>
</div>

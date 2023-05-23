@props(['userDetails'])
@push('scripts')
    <script src="{{ URL::asset('js/users/changeUserBio.js') }}"></script>
@endpush


<p id="descriptionParagraph">{{$userDetails->description}}</p>
<button id="changeBioBtn" class="btn btn-primary">Change Bio</button>


<div id="changeBioFormContainer">
    
    <form id="changeBioForm" method="POST" action="/users/updateBio">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <textarea class="form-control" rows="3" id="description2" name="description2" placeholder="Enter Bio here...">{{$userDetails->description}}</textarea>
        <textarea class="form-control" rows="3" name="description" placeholder="Enter Bio here..." >{{$userDetails->description}}</textarea>
        </div>
        <br>
        <input type="submit" value="Save Bio" class="btn btn-primary">
    </form>
</div>

@props(['userDetails'])
@push('scripts')
    <script src="{{ URL::asset('js/users/changeUserDetails.js') }}"></script>
@endpush

<button id="changeDetailsBtn" class="btn btn-primary">Change Details</button>

<div id="changeDetailsFormContainer">
    
    <form id="changeDetailsForm" method="POST" action="/users/updateDetails">
        @csrf
        @method('PUT')
        <label for="car_owned">Do you own a car?</label>
        <select class="form-select" name="car_owned">
            <option value="yes"
                @if ($userDetails->car_owned == "yes")
                    selected
                @endif
            >Yes</option>
            <option value="no"
                @if ($userDetails->car_owned == "no")
                    selected
                @endif
            >No</option>
            <option value="hidden"
                @if ($userDetails->car_owned == "hidden")
                    selected
                @endif
            >Hide</option>
        </select>
        <br>

        <label for="driver_license">Do you own a driving license?</label>
        <select class="form-select" name="driver_license">
            <option value="yes"
                @if ($userDetails->driver_license == "yes")
                    selected
                @endif
            >Yes</option>
            <option value="no"
                @if ($userDetails->driver_license == "no")
                    selected
                @endif
            >No</option>
            <option value="hidden"
                @if ($userDetails->driver_license == "hidden")
                    selected
                @endif
            >Hide</option>
        </select>
        <br>
        <input type="submit" value="Save Details" class="btn btn-primary">
    </form>

</div>
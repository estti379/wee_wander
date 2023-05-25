@push('scripts')
    <script src="{{ URL::asset('js/events/add-trail-button.js') }}"></script>
@endpush

<x-layout :pageTitle=$pageTitle>
    <div class="card"> 
        <div class="card-body">
            <h5 class="card-header">Edit Event</h5>
            <form action="/events/{{ $event->id }}" method="POST">
                @csrf
                @method('PUT')
                <span for="eventTitle">Title of the event : </span><input type="text" name="eventTitle"
                    value="{{ old('eventTitle', $event->title) }}"><br>
                @error('eventTitle')
                    <span>{{ $message }}</span>
                @enderror
                <hr>
                @for ($i = 0; $i < count($event->adventures); $i++)
                    <hr>
                    @php
                        $adventure = $event->adventures[$i];
                        $index = $adventure->id;
                    @endphp
                    <span>Select your trail : </span>
                    <select name="trail_E{{ $index }}">
                        <option value="">Select a trail</option>

                        @foreach ($trails as $trail)
                            <option value="{{ $trail->id }}" @if (old('trail_E' . $index, $adventure->trail->id) == $trail->id) selected @endif>
                                {{ $trail->name }}</option>
                        @endforeach
                    </select>
                    @error('trail_E' . $index)
                        <span>{{ $message }}</span>
                    @enderror
                    <br>
                    @php
                        $startDateSplit = explode(' ', $adventure->start_date);
                        $dueDateSplit = explode(' ', $adventure->due_date);
                    @endphp
                    <span for="starting_date_E{{ $index }}">Starting date : </span>
                    <input class="input-group-text"type="date" name="starting_date_E{{ $index }}"
                        value="{{ old('starting_date_E' . $index, $startDateSplit[0]) }}">
                    <label class="input-group-text"for="start_time_E{{ $index }}">Starting Hour:</label>
                    <input class="input-group-text"type="time" name="start_time_E{{ $index }}"
                        value="{{ old('start_time_E' . $index, $startDateSplit[1]) }}">
                    @error('starting_date_E' . $index)
                        <span>{{ $message }}</span>
                    @enderror
                    @error('start_time_E' . $index)
                        <span>{{ $message }}</span>
                    @enderror
                    <br>
                    <span>Due date : </span>
                    <input class="input-group-text"type="date" name="due_date_E{{ $index }}"
                        value="{{ old('due_date_E' . $index, $dueDateSplit[0]) }}">
                    <label class="input-group-text"for="end_time">End Hour:</label>
                    <input class="input-group-text"type="time" id="end_time_E{{ $index }}" name="end_time_E{{ $index }}"
                        value="{{ old('end_time_E' . $index, $dueDateSplit[1]) }}">
                    @error('due_date_E' . $index)
                        <span>{{ $message }}</span>
                    @enderror
                    @error('end_time_E' . $index)
                        <span>{{ $message }}</span>
                    @enderror
                    <br>

                @endfor

                @php
                    $newTrails = 0;
                    if (session()->has('nbNewTrails')) {
                        $newTrails = session('nbNewTrails');
                    }
                @endphp
                <div id="new-trail-inputs">
                    @for ($i = 0; $i <= $newTrails; $i++)


                        <div id="__{{ $i }}">
                            <hr>
                            <label class="input-group-text"for="trail__{{ $i }}">Select your trail : </label>
                            <select class="form-select" name="trail__{{ $i }}" >
                                <option value="">Select a trail</option>
                                @foreach ($trails as $trail)
                                    <option value="{{ $trail->id }}" @if (old('trail__' . $i) == $trail->id) selected @endif>
                                        {{ $trail->name }}</option>
                                @endforeach
                            </select>
                            @error('trail__' . $i)
                                <span>{{ $message }}</span>
                            @enderror
                            <br>
                            <label class="input-group-text"for="starting_date__{{ $i }}">Starting date : </label>
                            <input class="input-group-text"type="date" name="starting_date__{{ $i }}"
                                value="{{ old('starting_date__' . $i) }}">
                            <label class="input-group-text"for="start_time__{{ $i }}">Starting Hour:</label>
                            <input class="input-group-text"type="time" name="start_time__{{ $i }}"
                                value="{{ old('start_time__' . $i) }}">
                            @error('starting_date__' . $i)
                                <span>{{ $message }}</span>
                            @enderror
                            <br>
                            <label class="input-group-text" for="due_date__{{ $i }}">Due date : </label>
                            <input class="input-group-text"type="date" name="due_date__{{ $i }}" value="{{ old('due_date__' . $i) }}">
                            <label class="input-group-text" for="end_time__{{ $i }}">End Hour:</label>
                            <input class="input-group-text" type="time" name="end_time__{{ $i }}" value="{{ old('end_time__' . $i) }}">
                            @error('due_date__' . $i)
                                <span>{{ $message }}</span>
                            @enderror
                            <br>
                        </div>
                </div>

                    @endfor

                    <hr>
                    <button id="another-trail-button" class="btn btn-primary" name="__{{ $newTrails + 1 }}">Add another trail</button>
                    <br>
                    @php
                        session()->pull('nbNewTrails', 'default');
                    @endphp



                    <input type="submit" class="btn btn-primary" value="Update Event">
                </form>

                {{-- needed to create another form to delete button because of the request --}}
                <form action="/events/{{ $event->id }}" method="POST">
                    @csrf
                    @method('delete')
                    {{-- <button type="submit">Delete</button> FUTURE OPTION --}}
                </form>
        </div>
    </div>

</x-layout>

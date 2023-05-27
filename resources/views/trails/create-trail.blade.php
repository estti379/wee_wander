{{-- get script --}}
@push('scripts')
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
{{-- Leaflet.js LIVRARY TO MAP TO DISPLAY THE MAP--}}
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
{{-- Leaflet.js script to get coordenates--}}
<script src="{{ URL::asset('js/maps/leaflet-library.js') }}"></script>
@endpush


<h1>Create a trail</h1>
<x-layout :pageTitle=$pageTitle>
  <div class="create_event_container">
    {{-- Form to create a new user --}}
    <form action="/trails" method="POST">
      @csrf
      <span>Name of the trail: </span><input type="text" name="trailName"  value="{{old('trailName')}}"><br>
      <span>Distance: </span><input type="text" name="trailDistance"  value="{{old('trailDistance')}}"><br>
      <input type="hidden" name="location_latit" id="location_latit" value="{{old('location_latit')}}">
      <input type="hidden" name="location_long" id="location_long" value="{{old('location_long')}}">
      <button id="another-trail-button">Create another trail</button>
    </form>

    {{-- DIV TO PUT MAP INSIDE--}}
    <span>Choose a location: </span>
    <div id="map" style="height: 400px;">
    </div>
    {{-- display error --}}
      @error('trailName')
        <p>{{$message}}</p>
      @enderror
      @error('trailDistance')
        <p>{{$message}}</p>
      @enderror
      @php
          $errorMap = 'You need to chose a starting position on map';
      @endphp
      @error('location_latit')
        <p>{{$errorMap}}</p>
      @enderror
      @error('location_long')
        <p>{{$errorMap}}</p>
      @enderror
  </div>
</x-layout>

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
    
  </div>
  {{-- Leaflet.js LIVRARY TO MAP TO DISPLAY THE MAP--}}
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  {{-- Leaflet.js script to get coordenates--}}
  <script>
      var map = L.map('map').setView([49.6116, 6.13], 13);
      var marker;

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
          maxZoom: 18,
      }).addTo(map);

      map.on('click', function(event) {
      var latitude = event.latlng.lat;
      var longitude = event.latlng.lng;

      // Remove the previous marker (if any)
      if (marker) {
          map.removeLayer(marker);
      }

      // Add a new marker at the clicked location
      marker = L.marker([latitude, longitude]).addTo(map);

      // Update the hidden inputs with the new coordinates
      document.getElementById('location_latit').value = latitude;
      document.getElementById('location_long').value = longitude;
  });
  </script>
</x-layout>

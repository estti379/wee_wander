<!DOCTYPE html>
<html>
<head>
    <title>My Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>
<body>
    <div id="mapid" style="height: 500px;"></div>
    <input type="text" id="start" placeholder="Start Location" />
    <input type="text" id="end" placeholder="End Location" />
    <button id="getRoute">Get Route</button>

<script>
  var mymap = L.map('mapid').setView([51.505, -0.09], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(mymap);
</script>
</body>
</html>

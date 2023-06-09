var map = L.map("map").setView([49.6116, 6.13], 13);
var marker;

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 18,
}).addTo(map);

map.on("click", function (event) {
    var latitude = event.latlng.lat;
    var longitude = event.latlng.lng;

    // Remove the previous marker (if any)
    if (marker) {
        map.removeLayer(marker);
    }

    // Add a new marker at the clicked location
    marker = L.marker([latitude, longitude]).addTo(map);

    // Update the hidden inputs with the new coordinates
    document.getElementById("location_latit").value = latitude;
    document.getElementById("location_long").value = longitude;
});

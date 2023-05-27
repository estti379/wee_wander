let map = L.map("map");

let startPointMarker, endPointMarker;

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 18,
}).addTo(map);

let startPointMarkerLong = document.querySelector("#start_location_long").value;
let startPointMarkerLatit = document.querySelector("#start_location_latit").value;
let endPointMarkerLong = document.querySelector("#end_location_long").value;
let endPointMarkerLatit = document.querySelector("#end_location_latit").value;

startPointMarker = L.marker([startPointMarkerLatit, startPointMarkerLong], {
    draggable: false,
}).addTo(map);

endPointMarker = L.marker([endPointMarkerLatit, endPointMarkerLong], {
    draggable: false,
}).addTo(map);

// Create and add popups
let startPointPopup = L.popup().setLatLng([startPointMarkerLatit, startPointMarkerLong]).setContent('Starting Point').addTo(map);
let endPointPopup = L.popup().setLatLng([endPointMarkerLatit, endPointMarkerLong]).setContent('Ending Point').addTo(map);

let waypoints = [
    L.latLng(startPointMarkerLatit, startPointMarkerLong),
    L.latLng(endPointMarkerLatit, endPointMarkerLong),
];

L.Routing.control({
    waypoints: waypoints,
    routeWhileDragging: true,
    draggableWaypoints: false,
    lineOptions: { addWaypoints: false },
}).addTo(map).hide();

// Create bounds object
let bounds = new L.LatLngBounds(
    L.latLng(startPointMarkerLatit, startPointMarkerLong), 
    L.latLng(endPointMarkerLatit, endPointMarkerLong)
);

// Set map view to include all points
map.fitBounds(bounds);

// Close popups after 2 seconds
setTimeout(function() {
    map.closePopup(startPointPopup);
    map.closePopup(endPointPopup);
}, 3500);

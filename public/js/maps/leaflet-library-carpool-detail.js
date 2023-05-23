let map = L.map("map").setView([49.6116, 6.13], 13);

let startPointMarker, endPointMarker;

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 18,
}).addTo(map);

startPointMarkerLong = document.querySelector("#start_location_long").value;
startPointMarkerLatit = document.querySelector("#start_location_latit").value;
endPointMarkerLong = document.querySelector("#end_location_long").value;
endPointMarkerLatit = document.querySelector("#end_location_latit").value;

startPointMarker = L.marker([startPointMarkerLatit, startPointMarkerLong], {
    draggable: false,
}).addTo(map);

endPointMarker = L.marker([endPointMarkerLatit, endPointMarkerLong], {
    draggable: false,
}).addTo(map);

let waypoints = [
    L.latLng(startPointMarkerLatit, startPointMarkerLong),
    L.latLng(endPointMarkerLatit, endPointMarkerLong),
];

L.Routing.control({
    waypoints: waypoints,
    routeWhileDragging: true,
    draggableWaypoints: false,
    lineOptions: { addWaypoints: false },
})
    .addTo(map)
    .hide();

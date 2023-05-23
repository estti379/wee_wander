let map = L.map("map").setView([49.6116, 6.13], 13);
let routingControl;

let startPointMarker, endPointMarker;

let redIcon = new L.Icon({
    iconUrl:
        "https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png",
    shadowUrl:
        "https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png",
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41],
});

let blueIcon = new L.Icon({
    iconUrl:
        "https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png",
    shadowUrl:
        "https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png",
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41],
});

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 18,
}).addTo(map);

map.on("click", function (event) {
    // Coordinates value
    let latitude = event.latlng.lat;
    let longitude = event.latlng.lng;

    // Popup for the marker
    let popUpMessage;

    if (!startPointMarker) {
        popUpMessage =
            "Starting Location <br>" +
            "Lat: " +
            latitude +
            "<br>Lon: " +
            longitude;
        document.getElementById("start_location_latit").value = latitude;
        document.getElementById("start_location_long").value = longitude;

        startPointMarker = L.marker([latitude, longitude], {
            icon: blueIcon,
            draggable: false,
        })
            .addTo(map)
            .bindPopup(popUpMessage) // Bind a popup
            .openPopup(); // Open the popup immediately

        startPointMarker.dragging.disable();

        startPointMarker.on("click", function (event) {
            map.removeLayer(event.target);
            startPointMarker = null;
            document.getElementById("start_location_latit").value = "";
            document.getElementById("start_location_long").value = "";
        });
    } else if (!endPointMarker) {
        popUpMessage =
            "Ending Location <br>" +
            "Lat: " +
            latitude +
            "<br>Lon: " +
            longitude;
        document.getElementById("end_location_latit").value = latitude;
        document.getElementById("end_location_long").value = longitude;

        endPointMarker = L.marker([latitude, longitude], {
            icon: redIcon,
            draggable: false,
        })
            .addTo(map)
            .bindPopup(popUpMessage) // Bind a popup
            .openPopup(); // Open the popup immediately
        startPointMarker.dragging.disable();
        endPointMarker.on("click", function (event) {
            map.removeLayer(event.target);
            endPointMarker = null;
            document.getElementById("end_location_latit").value = "";
            document.getElementById("end_location_long").value = "";
        });
    } else {
        L.popup()
            .setLatLng(event.latlng)
            .setContent("You already have a starting and an end point")
            .openOn(map);
    }
});

function resetRoute() {
    console.log(routingControl);
    // map.removeControl(routingControl);
    routingControl.spliceWaypoints(0, 2);

    startPointMarker.remove();
    startPointMarker = null;
    endPointMarker.remove();
    endPointMarker = null;
    document.getElementById("start_location_latit").value = "";
    document.getElementById("start_location_long").value = "";
    document.getElementById("end_location_latit").value = "";
    document.getElementById("end_location_long").value = "";
}
document.querySelector("#define-route").addEventListener("click", setRoute);
function setRoute() {
    let waypoints = [
        L.latLng(
            startPointMarker.getLatLng().lat,
            startPointMarker.getLatLng().lng
        ),
        L.latLng(
            endPointMarker.getLatLng().lat,
            endPointMarker.getLatLng().lng
        ),
    ];

    L.Routing.control({
        waypoints: waypoints,
        draggableWaypoints: false,
    })
        .addTo(map)
        .hide();

    startPointMarker.remove();

    endPointMarker.remove();
}

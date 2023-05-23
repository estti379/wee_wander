// MAP
let map = L.map("map").setView([49.6116, 6.13], 13);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 18,
}).addTo(map);


// Get values from hidden input
let startPointMarkerLongElemValue = document.querySelector("#start_location_long").value;
let startPointMarkerLatitElemValue = document.querySelector("#start_location_latit").value;
let endPointMarkerLongElemValue = document.querySelector("#end_location_long").value;
let endPointMarkerLatitElemValue = document.querySelector("#end_location_latit").value;
// Testing
console.log('initial starting',startPointMarkerLongElemValue, startPointMarkerLatitElemValue)
console.log('initial ending',endPointMarkerLongElemValue, endPointMarkerLatitElemValue)


// Set waypoints
let waypoints = [
    (startingMark = L.latLng(
        startPointMarkerLatitElemValue,
        startPointMarkerLongElemValue
    )),
    (endingMark = L.latLng(
        endPointMarkerLatitElemValue,
        endPointMarkerLongElemValue
    )),
];

// Set routing
let control = L.Routing.control({
    waypoints: waypoints,
    routeWhileDragging: true,
    draggableWaypoints: true,
    lineOptions: { addWaypoints: false },
    createMarker: function(i, wp, nWps) {
        // Create a new marker
        let marker = L.marker(wp.latLng, { draggable: true });

        // Check if it's the first waypoint (starting point)
        if (i === 0) {
            // Add a dragend event to the marker
            marker.on('dragend', function(event) {
                // Get the new position of the marker
                let newPosition = event.target.getLatLng();
                let newLat = newPosition.lat;
                let newLng = newPosition.lng;

                // Testing
                //console.log('Starting marker moved to: Lat ', newLat, ', Lng ', newLng);

                // Update the hidden inputs
                document.querySelector("#start_location_latit").value = newLat;
                document.querySelector("#start_location_long").value = newLng;
                // Testing
                //console.log('New starting mark coordenates',startPointMarkerLatitElemValue, startPointMarkerLongElemValue)

            });
        }
        // Check if it's the last waypoint (ending point)
        else if (i === nWps - 1) {
            // Add a dragend event to the marker
            marker.on('dragend', function(event) {
                // Get the new position of the marker
                let newPosition = event.target.getLatLng();
                let newLat = newPosition.lat;
                let newLng = newPosition.lng;

                // Testing Purposes
                //console.log('Ending marker moved to: Lat ', newLat, ', Lng ', newLng);

                // Update the hidden inputs
                document.querySelector("#end_location_latit").value = newLat;
                document.querySelector("#end_location_long").value = newLng;
                //testing
                //console.log('New ending mark cordenates',endPointMarkerLatitElemValue, endPointMarkerLongElemValue)
            });
        }
        return marker;
    }
}).addTo(map).hide();




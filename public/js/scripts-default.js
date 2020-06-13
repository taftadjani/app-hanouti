const selectElement = (element) => document.querySelector(element);

// Create marker
const createMarker = (map, title, latLng = getGoogleLatLng(defaultPosition), icon = null) => {
    new google.maps.Marker({
        position: latLng,
        icon: icon,
        map: map,
        title: title
    });
}
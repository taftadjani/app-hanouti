const defaultPosition = {
    'lat': 1.22,
    'lng': 89.09987
};
let userPosition;
let map;

// Get user location
const getUserLocation = _ => {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, fail);
    } else {
        alert('Browser not supported');
    }
}

// Success
const success = position => {
    userPosition = {
        'lat': position.coords.latitude,
        'lng': position.coords.longitude
    };
    map = createMap(centerLatLng = userPosition);
    getStores(map);
}

// Fail
const fail = _ => {
    console.log("It's fail");
}

// Get google latlng
const getGoogleLatLng = latLng => new google.maps.LatLng(latLng.lat, latLng.lng);

// Create or refresh map : render is where to put the map
const createMap = (centerLatLng = getGoogleLatLng(defaultPosition), zoom = 8, render = document.getElementById('map')) => {
    const map = new google.maps.Map(render, {
        center: centerLatLng,
        zoom: zoom,
    });
    createMarker(map, "My position", centerLatLng);
    return map;
}

// Create marker
const createMarker = (map, title, latLng = getGoogleLatLng(defaultPosition), icon = null) => {
    new google.maps.Marker({
        position: latLng,
        icon: icon,
        map: map,
        title: title
    });
}

const getStores = (map, latLng = defaultPosition) => {
    let xhr = new XMLHttpRequest();
    let url = 'http://localhost/app-hanouti/public/api/maps/stores';
    let params = 'lat=' + latLng.lat + '&lng=' + latLng.lng;
    xhr.open('POST', url, true);

    //Send the proper header information along with the request
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        //Call a function when the state changes.
        if (xhr.readyState == 4 && xhr.status == 200) {
            JSON.parse(xhr.responseText).forEach(store => {
                console.log(store);

                createMarker(map, store.storeName, getGoogleLatLng({
                    'lat': store.lat,
                    'lng': store.lng,
                }));
            });
        }
    }
    xhr.send(params);
}
window.onload = _ => {
    // Document is ready
    getUserLocation();
}
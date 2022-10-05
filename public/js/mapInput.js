function initialize() {

    $('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    var locationInputs = document.getElementsByClassName("map-input");

    var autocompletes = [];
    var geocoder = new google.maps.Geocoder;
    for (let i = 0; i < locationInputs.length; i++) {

        var input = locationInputs[i];
        var fieldKey = input.id.replace("-input", "");
        var isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

        var latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -33.8688;
        var longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 151.2195;

        // Load the map and puts the center marker
        var map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
            center: {lat: latitude, lng: longitude},
            zoom: 13,
        });
        marker = new google.maps.Marker({
            map: map,
            position: {lat: latitude, lng: longitude},
            draggable: true,
        });

        marker.setVisible(isEdit);
        marker.setOptions({draggable: true});

        // This part is about autocompleting the address
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.key = fieldKey;
        autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
    }

    for (let i = 0; i < autocompletes.length; i++) {
        var input = autocompletes[i].input;
        var autocomplete = autocompletes[i].autocomplete;
        var map = autocompletes[i].map;
        var marker = autocompletes[i].marker;

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            marker.setVisible(false);
            var place = autocomplete.getPlace();

            // Querying latitude and longitude
            geocoder.geocode({'placeId': place.place_id}, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK) {
                    var lat = results[0].geometry.location.lat();
                    var lng = results[0].geometry.location.lng();
                    setLocationCoordinates(autocomplete.key, lat, lng);
                }
            });

            if (!place.geometry) {
                window.alert("No details available for input: '" + place.name + "'");
                input.value = "";
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

        });
    }
    
}

function setLocationCoordinates(key, lat, lng) {
    var latitudeField = document.getElementById(key + "-" + "latitude");
    var longitudeField = document.getElementById(key + "-" + "longitude");
    latitudeField.value = lat;
    longitudeField.value = lng;
}
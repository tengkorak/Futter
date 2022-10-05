function initialize() {
    var myLatLng = {lat: -25.363, lng: 131.044};
        // Load the map and puts the center marker
        var map = new google.maps.Map(document.getElementById('address-map'), {
            center: myLatLng,
            zoom: 13,
        });
        marker = new google.maps.Marker({
            map: map,
            position: myLatLng,
            draggable: true,
        });
  }
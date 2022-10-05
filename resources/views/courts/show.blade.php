


@extends('layouts.app')
  
@section('content')

<!--New Map-->
<div class="container">
    <div class="col-sm-12">
        <h1></h1>
        <div class="form-group">
            <h1 >{{$court->name}}</h1>
            <h1 >{{$court->address_address}}</h1>

            <div id="address-map-container" style="width:100%;height:400px; ">
                <div style="width: 100%; height: 100%" id="address-map"></div>
            </div>

        </div>
    </div>
</div>


@section('javascript')
    @parent
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPvCAl7pbuPZ_oUm_dodxXi6oJDho_fdM&libraries=places&callback=initialize"></script>
<script type="text/javascript">
function initialize() {
    var myLatLng = {lat: {{$court->address_latitude}}, lng: {{$court->address_longitude}}};
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
  </script>

@stop

@endsection

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> <a href="{{ url('/mapa') }}"><i class="fa fa-arrow-left"></i> Voltar</a></div>

                <div class="panel-body">
                  <style>
                    #map-canvas{
                      width: 100%;
                      height: 250px;
                    }
                    .padding{
                      padding-top:40px;
                    }
                  </style>
    {{Form::open(array('url'=>'/cadastrar', 'files'=>true))}}
  @include('maps._form')







      <button class="btn btn-sm btn-danger">Enviar</button>


    {{Form::close()}}



                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('post-script')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places&language=pt-BR&q=São+Caetano+do+Sul+São+Paulo"
    type="text/javascript"></script>
  <script>

var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center:{
      lat: -23.7061479,
      lng: -46.5794124
    },
  zoom:13
  });
  var image = 'https://cdn1.iconfinder.com/data/icons/Map-Markers-Icons-Demo-PNG/32/Map-Marker-Marker-Outside-Azure.png';
  var marker = new google.maps.Marker({
    position: {
      lat: -23.7061479,
      lng: -46.5794124
    },
    icon: image,
    map:map,
    animation: google.maps.Animation.DROP,
    draggable: true
  });
  var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
  google.maps.event.addListener(searchBox,'places_changed',function(){
    var places = searchBox.getPlaces();
    var bounds = new google.maps.LatLngBounds();
    var i, place;
    for(i=0; place=places[i];i++){
        bounds.extend(place.geometry.location);
        marker.setPosition(place.geometry.location); //set marker position new...
      }
      map.fitBounds(bounds);
      map.setZoom(13);
  });
  google.maps.event.addListener(marker,'position_changed',function(){
    var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();
    $('#lat').val(lat);
    $('#lng').val(lng);
  });

</script>
<script>
                $("form").submit(function(e) {

                  var ref = $(this).find("[required]");

                  $(ref).each(function(){
                      if ( $(this).val() == '' )
                      {
                          alert("Preencha nome, endereço e o número.");

                          $(this).focus();

                          e.preventDefault();
                          return false;
                      }
                  });  return true;
              });
              </script>

@endsection


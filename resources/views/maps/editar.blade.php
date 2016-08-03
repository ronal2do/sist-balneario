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
   {{ Form::model($cadastro, ['route'=>['maps.update', $cadastro->id], 'method'=>'put']) }}
  		              <div class="form-group">
                <label class="control-label col-sm-2" for="nome">Nome completo:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="nome" name="nome" value="{{$cadastro->nome}}" required>
                </div>
                <label class="control-label col-sm-2" for="nome">Segmento:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="segmento" name="segmento" value="{{$cadastro->segmento}}">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="grau_apoio">Grau de apoio:</label>
                <div class="col-sm-4">
                 <label class="radio-inline"><input type="radio" name="grau_apoio" value="1">1</label>
                  <label class="radio-inline"><input type="radio" name="grau_apoio" value="2">2</label>
                  <label class="radio-inline"><input type="radio" name="grau_apoio" value="3">3</label>
                  <label class="radio-inline"><input type="radio" name="grau_apoio" value="4">4</label>
                  <label class="radio-inline"><input type="radio" name="grau_apoio" value="5">5</label>
                </div>
                <label class="control-label col-sm-2" for="area_atuacao">Área de Atuação:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="area_atuacao" name="area_atuacao" value="{{$cadastro->area_atuacao}}">
                </div>
              </div>
        <div class="form-group">
               <label class="control-label col-sm-2" for="telefone">Telefone:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="telefone" name="telefone" value="{{$cadastro->telefone}}">
                </div>
                <label class="control-label col-sm-2" for="contato_interno">Contato interno:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="contato_interno" name="contato_interno" value="{{$cadastro->contato_interno}}">
                </div>
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" id="email" name="email" value="{{$cadastro->email}}">
                </div>
           
                <label class="control-label col-sm-2" for="facebook">Facebook</label>
                  <div class="col-sm-4">
                  <input type="text" class="form-control" name="facebook" value="{{$cadastro->facebook}}">
               </div>
       </div>
 <div class="form-group">
 <hr>
             <p class="padding">
                    <i class="fa fa-home"></i> Endereço 
             </p>
                  <div class="form-group">
                    <label for="">Endereço</label>
                    <input type="text" id="searchmap" class="form-control" name="logradouro" value="{{$cadastro->logradouro}}">
                        <div id="map-canvas"></div>
                      </div>
                    <input type="hidden" class="form-control input-sm" name="lat" id="lat"  value="{{$cadastro->lat}}">
                  </div>

                  <div class="form-group">
                    <input type="hidden" class="form-control input-sm" name="lng" id="lng"  value="{{$cadastro->lng}}">
                  </div>
              <div class="form-group">
                <div class="col-sm-2">
                <label class="control-label col-sm-2" for="bairro">Bairro:</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="bairro"  name="bairro" value="{{$cadastro->bairro}}">
                </div>
                
              </div>
              <!-- teste consulta de cep -->
             <div class="form-group">
                <label class="control-label col-sm-2" for="numero">Número:</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="numero" name="numero" value="{{$cadastro->numero}}" required>
                </div>  
                   
              </div>

      	<button class="btn btn-sm btn-danger">Editar</button>

    {{Form::close()}}



                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('post-script')
<script>

  var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center:{
      lat: -27.0006669,
          lng: -48.6475047
    },
  zoom:13
  });
  var image = 'https://cdn1.iconfinder.com/data/icons/Map-Markers-Icons-Demo-PNG/32/Map-Marker-Marker-Outside-Azure.png';
  var marker = new google.maps.Marker({
    position: {
      lat: -27.0006669,
          lng: -48.6475047
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


@endsection


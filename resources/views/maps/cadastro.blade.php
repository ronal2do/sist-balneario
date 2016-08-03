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
                    .m_title {
                        display: block;
                    }

                    .m_title:first-letter {
                        text-transform: uppercase;
                    }
                  </style>

  

  <table class="table table-striped">
      <thead>
         <div id="map-canvas"></div>
      </thead>
      <tbody>
          <tr>
            <td><b class="m_title">nome: </b></td>
            <td>{{$cadastro->nome}}</td>
            <td style="text-align: right">
                <a href="{{route('maps.editar',['id'=>$cadastro->id])}}"><i class="fa fa-pencil"> Editar </i></a>   
                <a href="{{route('maps.destruir',['id'=>$cadastro->id])}}"><i class="fa fa-trash"> Excluir </i></a>
            </td>
          </tr>
           <tr>
            <td><b class="m_title">sexo: </b></td>
            <td>{{$cadastro->sexo}}</td>
            <td></td>
          </tr>
           <tr>
            <td><b class="m_title">nascimento: </b></td>
            <td>{{$cadastro->nascimento}}</td>
            <td></td>
          </tr>
          <tr>
            <td><b class="m_title">tiporesidencia: </b></td>
            <td>{{$cadastro->tiporesidencia}}</td>
            <td></td>
          </tr>
          <tr>
            <td><b class="m_title">segmento: </b></td>
            <td>{{$cadastro->segmento}}</td>
            <td></td>
          </tr>
          <tr>
            <td><b class="m_title">contato interno: </b></td>
            <td>{{$cadastro->contato_interno}}</td>
            <td></td>
          </tr>
          <tr>
            <td><b class="m_title">grau de apoio: </b></td>
            <td>{{$cadastro->grau_apoio}}</td>
            <td></td>
          </tr>
          <tr>
            <td><b class="m_title">área de atuação: </b></td>
            <td>{{$cadastro->area_atuacao}}</td>
            <td></td>
          </tr>
          <tr>
            <td><b class="m_title">logradouro: </b></td>
            <td>{{$cadastro->logradouro}}</td>
            <td style="text-align: right"><a href="https://www.google.com.br/maps/place/{{$cadastro->logradouro}}, {{$cadastro->numero}}, {{$cadastro->bairro}}" target="_blank"><i class="fa fa-google fa-fw"></i>Buscar endereço no Google Maps</a></td>
          </tr>
          <tr>
            <td><b class="m_title">bairro: </b></td>
            <td>{{$cadastro->bairro}}</td>
            <td></td>
          </tr>
          <tr>
            <td><b class="m_title">número: </b></td>
            <td>{{$cadastro->numero}}</td>
            <td></td>
          </tr>
          <tr>
            <td><b class="m_title">telefone: </b></td>
            <td>{{$cadastro->telefone}}</td>
            <td></td>
          </tr>
          <tr>
            <td><b class="m_title">email: </b></td>
            <td>{{$cadastro->email}}</td>
            <td></td>
          </tr>
          <tr>
            <td><b class="m_title">facebook.com/ </b></td>
            <td>{{$cadastro->facebook}}</td>
            <td style="text-align: right"><a href="https://facebook.com/{{$cadastro->facebook}}" target="_blank"><i class="fa fa-facebook fa-fw"></i>Abrir Facebook</a></td>
          </tr>

      </tbody>
  </table>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('post-script')

 <script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>

<script>
  var lat = {{$cadastro->lat}};
  var lng = {{$cadastro->lng}};

  var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center:{
      lat: lat,
      lng: lng
    },
    zoom: 13.69
  });
  var image = 'https://cdn1.iconfinder.com/data/icons/Map-Markers-Icons-Demo-PNG/32/Map-Marker-Marker-Outside-Azure.png';
  var marker = new google.maps.Marker({
    position:{
      lat:lat,
      lng: lng
    },
    icon: image,
    map:map,
    animation: google.maps.Animation.DROP
  });
  
</script>

@endsection


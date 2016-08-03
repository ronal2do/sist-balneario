@extends('layouts.app')

@section('content')
  <div id="st-container" class="st-container">
    
    <div class="outer-container">

      <div class="inner-container cf">
        <div class="map-container">
          <div id="map-canvas"></div>
        </div>
        
        <div class="filter-container-lg">
          <div>
            <h2>Filtro</h2>
            <div class="filter-options">
              
              <div class="filter-set">
                <label for="grau_apoio">Grau de apoio :</label>
                <select name="grau_apoio" id="grau_apoio" class="grau_apoio">
                  <option value="0">Todos</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
              <div class="filter-set">
                <label for="sexo">Sexo :</label>
                <select name="sexo" id="sexo" class="sexo">
                  <option value="0">Todos</option>
                  <option value="MASCULINO">Masculino</option>
                  <option value="FEMININO">Feminino</option>
                </select>
              </div>
              <div class="filter-set" style="margin-top:0;">
                <button id="load-btn" class="load-btn button is-success">Resetar</button>
              </div>
            </div> <!-- .filter-options -->
          </div> 
        </div> <!-- .filter-container-lg -->
        
        <div id="status"></div>
      </div> <!-- .inner-container -->
    </div> <!-- .outer-container -->
      
  </div> <!-- #st-container -->

@endsection

@section('post-script')
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwWj17yQyaNwNqZwm2WF_bGk7mrhKegXY&callback=initMap">
    </script>
    <script src="/assets/js/data.js"></script>
    <script src="/assets/js/main.js"></script>
@endsection
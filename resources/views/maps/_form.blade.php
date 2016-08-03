             <style>
              label{padding-top: 5px;}
             </style>
              <div class="form-group padding">
               
         <label class="control-label col-sm-2" for="nome">Nome completo:</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="nome" name="nome" required>
                  </div>
               

                   <label class="control-label col-sm-2" for="nascimento">Nascimento:</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="nascimento" name="nascimento" mask="39/19/9999" ng-model="nascimento">
                  </div>
              </div>
              <div class="form-group padding">  

                  <label class="control-label col-sm-1" for="sexo">Sexo:</label>
                  <div class="col-sm-2">
                  <select class="form-control" id="sexo" name="sexo">
                        <option value="masculino">Masculino</option>
                       <option value="feminino">Feminino</option>
                  </select>
                   </div>

                  <label class="control-label col-sm-2" for="tiporesidencia">Tipo de Residência:</label>
                  <div class="col-sm-3">
                    <label class="radio-inline"><input type="radio" name="tiporesidencia" value="casa">Casa</label>
                    <label class="radio-inline"><input type="radio" name="tiporesidencia" value="apartamento">Apartamento</label>
                  </div>
              
                <label class="control-label col-sm-2" for="nome">Segmento:</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="segmento" name="segmento">
                </div>
             
             </div>
            
           <div class="form-group padding">
                <label class="control-label col-sm-2" for="grau_apoio">Grau de Apoio:</label>
                <div class="col-sm-4">
                  <label class="radio-inline"><input type="radio" name="grau_apoio" value="1">1</label>
                  <label class="radio-inline"><input type="radio" name="grau_apoio" value="2">2</label>
                  <label class="radio-inline"><input type="radio" name="grau_apoio" value="3">3</label>
                  <label class="radio-inline"><input type="radio" name="grau_apoio" value="4">4</label>
                  <label class="radio-inline"><input type="radio" name="grau_apoio" value="5">5</label>
                </div>
                <label class="control-label col-sm-2" for="area_atuacao">Área de Atuação:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="area_atuacao" name="area_atuacao">
                </div>
           </div>
        
          <div class="form-group padding">
               <label class="control-label col-sm-2" for="telefone">Telefone:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="telefone" name="telefone" mask="(99) 9?9999-9999" ng-model="telefone">
                </div>
                <label class="control-label col-sm-2" for="contato_interno">Contato Interno:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="contato_interno" name="contato_interno" mask="(99) 9?9999-9999" ng-model="contato_interno">
                </div>                
          </div>
        
          <div class="form-group padding">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-4">
                  <input type="email" class="form-control" id="email" name="email">
                </div>
           
                <label class="control-label col-sm-2" for="facebook">Facebook</label>
                  <div class="col-sm-4">
                  <input type="text" class="form-control" name="facebook">
               </div>
       </div>
 <div class="form-group padding">

             <p class="padding">
                    <i class="fa fa-home"></i> Endereço 
             </p>

 <hr>
                  <div class="form-group">
                    <label for="">Endereço</label>
                    <input type="text" id="searchmap" class="form-control" name="logradouro" required>
                        <div id="map-canvas"></div>
                      </div>
                    <input type="hidden" class="form-control input-sm" name="lat" id="lat">
                  </div>

                  <div class="form-group">
                    <input type="hidden" class="form-control input-sm" name="lng" id="lng">
                  </div>
              <div class="form-group">
                <div class="col-sm-2">
                <label class="control-label col-sm-2" for="bairro">Bairro:</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="bairro"  name="bairro">
                </div>
                
              </div>
              <!-- teste consulta de cep -->
             <div class="form-group">
                <label class="control-label col-sm-2" for="numero">Número:</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="numero" name="numero" required>
                </div>  
                   
              </div>


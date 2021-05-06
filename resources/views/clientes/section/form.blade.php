<div class="container">
    <br>
    <form action="{{route('clientesStore')}}" method="POST">
      @csrf
      <div class="row">
         <div class="col-md-12">
            <div class="card-body">
              <strong>Datos Personales</strong>
              <hr class=" card-blue card-outline">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1" class="form-label">Cedula</label>
                  <input type="number" max="9999999999" min="500000" name="ced" value="{{ old('ced')}}" class="form-control form-control-sm confondo" placeholder="Numero de cedula" required>
                  <div class="valid-feedback"> </div>                                   
                </div>
                <div class="form-group col-md-6 ">
                  <label for="">Nombre Completo</label>
                  <input type="text"  minlength="10" maxlength="40" name="nombre" value="{{ old('nombre')}}" class="form-control form-control-sm"  placeholder="Nombre Completo" required>
                  <div class="valid-feedback"> </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Telefono</label>
                  <input  type="number" max="9999999999" min="1000000000" name="telefono" value="{{ old('telefono')}}" class="form-control form-control-sm"  placeholder="Numero de celular" required>
                  <div class="valid-feedback"> </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="validationServer01">Estrato</label>
                  <select name="estrato" value="{{ old('estrato')}}" class="form-control form-control-sm"  required>
                    <option value="1">Estrato 1</option>
                    <option value="2">Estrato 2</option>
                    <option value="3">Estrato 3</option>
                    <option value="4">Estrato 4</option>
                    <option value="5">Estrato 5</option>
                    <option value="6">Estrato 6</option>
                    <option value="7">Estrato 7</option>
                    <option value="corporativo">corporativo</option>
                  </select>                              
                  <div class="valid-feedback"> </div>
                </div>
              </div>                               
             
              <div class="input-group mb-10">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="email" name="correo"  value="{{ old('correo')}}" class="form-control form-control-sm" placeholder="Email" required>
                <div class="valid-feedback"> </div>
              </div>                                
              <hr class=" card-blue card-outline">
              <strong>Datos de Ubicacion</strong>
              <hr>
              <div class="form-row">
                <div class="form-group col-md-6">                                   
                  
                  <label for="">Municipio</label>
                  <select class="form-control form-control-sm js-example-basic-single" name="municipio" value="{{ old('municipio')}}"  id="municipios" style="width: 95%" required>
                                             
                    <option value="Chinacota">Chinacota</option>
                    <option value="Bochalema">Bochalema</option>
                    <option value="San Cayetano">San Cayetano</option>                                  
                    <option value="Cúcuta">Cúcuta</option>
                    <option value="Durania">Durania</option>                                  
                    <option value="El Zulia">El Zulia</option>
                    <option value="Los patios">Los patios</option>                                  
                    <option value="Pamplona">Pamplona</option>
                    <option value="Puerto Santander">Puerto Santander</option>                                  
                    <option value="Villa del Rosario">Villa del Rosario</option>

                    
                  </select> 
                  <div class="valid-feedback"> </div>                          
                </div>
                <div class="form-group col-md-6">
                  <label for="">Direccion</label>
                  <input type="text" name="calle" value="{{ old('calle')}}" class="form-control form-control-sm"  placeholder="Direccion" required>
                </div>
              </div>
              <hr class=" card-blue card-outline">
              <strong>Datos de Servicio</strong>
              <hr>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="">Fecha de inicio</label>
                  <input type="date" name="fecha_inicio"  value="{{ old('fecha_inicio')}}" class="form-control form-control-sm"  placeholder="Numero de celular" required>
                  <div class="valid-feedback"> </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="">Fecha Final</label>
                  <input type="date" name="fecha_final"  value="{{ old('fecha_final')}}" class="form-control form-control-sm" placeholder="Numero de celular" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="validationServer01">Tipo De Servicio</label>
                  <select name="tipo_servicio"  value="{{old('tipo_servicio')}}" class="form-control form-control-sm"  required>
                  <option value="Internet con reuso">Internet con reuso</option>
                  <option value="Canal dedicado">Canal dedicado</option>
                  <option value="Red de datos">Red de datos</option>
                  <option value="Cableado estrutrado">Cableado estrutrado</option>
                  <option value="cctv">cctv</option>
                  <option value="Outsourcing">Outsourcing</option>
                </select>
                <div class="valid-feedback"> </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail1">Reuso</label>
                  <select name="reuso"  value="{{old('reuso')}}" class="form-control form-control-sm"  required>
                    <option value="1:1">1:1</option>
                    <option value="1:2">1:2</option>
                    <option value="1:4">1:4</option>
                    <option value="1:6">1:6</option>
                   </select>
                  <div class="valid-feedback"> </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="validationServer01">Tipo De Tecnologia</label>
                  <select  name="tecnologia"  value="{{ old('tecnologia')}}" class="form-control form-control-sm"  required>
                    <option value="Red De Enlace">Radio Enlace</option>
                    <option value="Red De Fibra Optica">Red De Fibra Optica</option>
                    <div class="valid-feedback"> </div>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="validationServer01">Canon</label>
                  <input type="number" name="canon" value="{{ old('canon')}}" class="form-control form-control-sm" placeholder="$Canon" required>
                  <div class="valid-feedback"> </div>
                </div>
              </div>
              <br>
              <button type="submit" class="btn text-light mx-1" style="background-color:#3333CC">Agregar cliente</button>

            </div>
          </div>
      </div>                        
    </form>
  </div>
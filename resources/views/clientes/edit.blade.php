@extends('includes.dash')
@section('contenido')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-user-edit"></i> Editar Cliente</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('clientesIndex')}}"><i class="fas fa-home"></i> Clientes</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header" style="background: white">
          <h3 class="card-title"><i class="fas fa-book-reader"></i> Datos Del Cliente</h3>
        </div>
        <div class="card-body">
             <section class="content">
              <div class="container-fluid">
                <form action="{{route('clientesUpdate',$cliente->id)}}" method="POST">
                  @csrf
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card-body">
                          <strong>Datos Personales</strong>
                          <hr class=" card-blue card-outline">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1" class="form-label">Cedula</label>
                              <input type="text" name="ced" class="form-control"  value="{{old('ced',$cliente->ced)}}">                              <div class="valid-feedback"> </div>                                   
                            </div>
                            <div class="form-group col-md-6 ">
                              <label for="">Nombre Completo</label>
                              <input type="text" name="nombre" class="form-control" value="{{old('nombre',$cliente->nombre)}}" required>                              <div class="valid-feedback"> </div>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="">Telefono</label>
                              <input type="text" name="telefono" class="form-control"  value="{{old('telefono',$cliente->telefono)}}" required>                              <div class="valid-feedback"> </div>
                            </div>
            
                            <div class="form-group col-md-6">
                              <label for="validationServer01">Estrato</label>
                              <select name="estrato" class="form-control" value="{{old('estrato',$cliente->estrato)}}"  required>
                                <option value="{{old('estrato',$cliente->estrato)}}">{{$cliente->estrato}}</option>
                                <option value="1">Estrato 1</option>
                                <option value="2">Estrato 2</option>
                                <option value="3">Estrato 3</option>
                                <option value="4">Estrato 4</option>
                                <option value="5">Estrato 5</option>
                                <option value="6">Estrato 6</option>
                              </select>                              
                              <div class="valid-feedback"> </div>
                            </div>
                          </div>                               
                         
                          <div class="input-group mb-10">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" name="correo" class="form-control" value="{{old('correo',$cliente->correo)}}" required>
                            <div class="valid-feedback"> </div>
                          </div>                                
                          <hr class=" card-blue card-outline">
                          <strong>Datos de Ubicacion</strong>
                          <hr>
                          <div class="form-row">
                            <div class="form-group col-md-6">                                   
                              
                              <label for="">Municipio</label>
                              <select class="form-control form-control-sm js-example-basic-single" name="municipio" value="{{ old('municipio')}}"  id="municipios" style="width: 95%" required>
                                 
                                <option value="{{old('municipio',$cliente->municipio)}}">{{old('municipio',$cliente->municipio)}}</option> 
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
                              <input type="text" name="calle" value="{{old('calle',$cliente->calle)}}" class="form-control form-control-sm" id="" placeholder="Direccion">
                            </div>
                          </div>
                          <hr class=" card-blue card-outline">
                          <strong>Datos de Servicio</strong>
                          <hr>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="">Fecha de inicio</label>
                              <input type="date" name="fecha_inicio" class="form-control" value="{{old('fecha_inicio',$cliente->fecha_inicio)}}" required>                              <div class="valid-feedback"> </div>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="">Fecha Final</label>
                              <input type="date" name="fecha_final" class="form-control" value="{{old('fecha_final',$cliente->fecha_final)}}">                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="validationServer01">Tipo De Servicio</label>
                              <select name="tipo_servicio" class="form-control" value="{{old('tipo_servicio',$cliente->tipo_servicio)}}" required>
                              <option value="{{$cliente->tipo_servicio}}">{{$cliente->tipo_servicio}}</option>
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
                              <label for="">Reuso</label>
                              <select name="reuso" class="form-control" value="{{old('reuso',$cliente->reuso)}}"> 
                                <option value="{{old('reuso',$cliente->reuso)}}">{{old('reuso',$cliente->reuso)}}</option>                                                            
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
                              <select  name="tecnologia" class="form-control" value="{{old('canon',$cliente->tecnologia)}}"  required>
                                <option value="{{old('canon',$cliente->tecnologia)}}">{{old('canon',$cliente->tecnologia)}}</option>
                                <option value="Red De Enlace">Radio Enlace</option>
                                <option value="Red De Fibra Optica">Red De Fibra Optica</option>
                                <div class="valid-feedback"> </div>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="validationServer01">Canon</label>
                              <input type="text" name="canon" class="form-control" value="{{old('canon',$cliente->canon)}}" required>                              <div class="valid-feedback"> </div>
                            </div>
                          </div>
                           <div class="form-row">
                            <label for="validationServer01">Estado</label>
                            <select  name="estado" class="form-control" value="{{old('estado',$cliente->estado)}}"  required>                            
                              <option value="{{old('estado',$cliente->estado)}}">{{$cliente->estado}}</option>
                              <option value="Activo">Activo</option>
                              <option value="Inactivo">Inactivo</option>
                            </select>
                            <div class="valid-feedback"> </div>
                          </div>
                          <br>
                          <button type="submit" class="btn text-light mx-1" style="background-color:#3333CC">Agregar cliente</button>
            
                        </div>
                      </div>
                  </div>                        
                </form>
                
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>


         
        </div>
        <!-- /.card-body -->        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
@endsection
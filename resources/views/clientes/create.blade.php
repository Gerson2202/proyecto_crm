@extends('includes.dash')
@section('contenido')

<link rel="stylesheet" href="{{asset('vendor\select2-4.0.13\dist\css\select2.min.css')}}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Añadir nuevo Clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('clientesIndex')}}" style="color: #20207d">Pagina Principal</a></li>
              {{-- <li class="breadcrumb-item "><a href="#">Nuevo Cliente</a></li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card " >
        <div class="card-header "  >
          <h3 class="card-title">Datos Del Cliente</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          
             <section class="content">
              <div class="container-fluid">
                <form action="{{route('clientesStore')}}" method="POST">
                  @csrf
                  <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                      <!-- general form elements -->
                      <div class="card card-danger" >
                        <div class="card-header" style="background-color:#999999">
                          <h3 class="card-title" >Datos Personales</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                          <div class="card-body">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Cedula</label>
                                <input type="numeric" name="ced" class="form-control" id="exampleInputEmail1" placeholder="Numero de cedula" required>
                                <div class="valid-feedback"> </div>
                                @error('ced')
                                    <br>
                                   
                                    <div class="alert alert-danger alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                       {{$message}}
                                    </div>
                                    <br>
                                @enderror
                              </div>
                              <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nombre y Apellido</label>
                                <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Nombre Completo" required>
                                <div class="valid-feedback"> </div>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Telefono</label>
                                <input type="text" name="telefono" class="form-control" id="exampleInputEmail1" placeholder="Numero de celular" required>
                                <div class="valid-feedback"> </div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="validationServer01">Estrato</label>
                                <select name="estrato" class="form-control "  required>
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
                           
                            <div class="input-group mb-12">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                              </div>
                              <input type="email" name="correo" class="form-control" placeholder="Email" required>
                              <div class="valid-feedback"> </div>
                              
                            </div>
                            @error('correo')
                            <br>
                             <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" style="height: -50%" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                               {{$message}}
                            </div>

                            <br>
                            @enderror
                          
                            
                          </div>
                          <!-- /.card-body -->
          
                          
                      </div>
                    </div>
                    <div class="col-md-12">
                      <!-- Form Element sizes -->
                      <div class="card card-success">
                        <div class="card-header" style="background-color:#999999" >
                          <h3 class="card-title">Datos de Ubicacion</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-row">
                            {{-- <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Ciudad</label>
                              <input type="text" name="ciudad" class="form-control" id="exampleInputEmail1" placeholder="Ciudad" required>
                              <div class="valid-feedback"> </div>
                            </div> --}}
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Municipio</label>
                              <select class="form-control js-example-basic-single" name="municipio" id="municipios" required>
                                                         
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
                              <label for="exampleInputEmail1">Direccion</label>
                              <input type="text" name="calle" class="form-control" id="exampleInputEmail1" placeholder="Direccion">
                            </div>
                          </div>
                          <div class="form-row">
                           
                          </div>
                          
                         
                          
                        </div>
                        <!-- /.card-body -->
                      </div>

                      <div class="card card-danger">
                        <div class="card-header" style="background-color:#999999">
                          <h3 class="card-title">Informacion  De Servicio</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Fecha de inicio</label>
                              <input type="date" name="fecha_inicio" class="form-control" id="exampleInputEmail1" placeholder="Numero de celular" required>
                              <div class="valid-feedback"> </div>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Fecha Final</label>
                              <input type="date" name="fecha_final" class="form-control" id="exampleInputEmail1" placeholder="Numero de celular">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="validationServer01">Tipo De Servicio</label>
                              <select name="tipo_servicio" class="form-control"  required>
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
                              <select name="tipo_servicio" class="form-control"  required>
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
                              <select  name="tecnologia" class="form-control"  required>
                                <option value="Red De Enlace">Radio Enlace</option>
                                <option value="Red De Fibra Optica">Red De Fibra Optica</option>
                                <div class="valid-feedback"> </div>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="validationServer01">Estado</label>
                              <select  name="estado" class="form-control"  required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                              </select>
                              <div class="valid-feedback"> </div>

                            </div>
                          </div>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="fas fa-dollar-sign"></i>
                              </span>
                            </div>
                            <input type="text" name="canon" class="form-control" placeholder="$Canon" required>
                            <div class="valid-feedback"> </div>
                          </div>
                          <div class="form-group">
                            
                          </div>
                        </div>
                        <div class="card-footer" >
                          <button type="submit" class="btn  text-light" style="background-color:#3333CC">Agregar cliente</button>
                        </div>
                      
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
          
                     
                      
                    </div>
                    <!--/.col (right) -->
                  </div>
                  <script src="https:code.jquery.com/jquery-3.5.1.min.js"></script>
                  <script src="{{asset('vendor\select2-4.0.13\dist\js\select2.min.js')}}"></script> 
                  <script>
                
                    $("#municipios").select2({
                    placeholder: "Municipio",
                    theme: "classic",
                                
                    });
                  </script> 
                  
                </form>
                
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>


         
        </div>
        <!-- /.card-body -->
        <div class="card-footer bnt btn-info" style="background-color:#20207d">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
    
@endsection
@extends('includes.dash')
@section('contenido')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-key"></i> Administracion De Permisos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina Principal</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
             {{-- DETALLE DE ´PERMISOS --}}
            <div class="card tabla1" id="cardUsuariosRol">
              <div class="card-header" style="background: white">
                <h3 class="card-title">Detalle de permiso</h3>
                <div class="card-tools">
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>                          
                  </div>                     
                </div>
              </div>
              <div class="card-body">   
                        <table class="table table -striped" id="tablaRol">
                      <thead>
                          <th>Nombre</th>
                          <th>Descripcion</th>
                      </thead>
                      <tbody>                        
                          <tr>
                              <td>{{$permiso->name}}</td>
                              <td>{{$permiso->description}}</td>                              
                          </tr> 
                        </tbody>
                  </table>   
              </div>
            </div>

             {{-- ROLES CON ESTE PERMISO--}}
             <div class="card tabla2" id="cardUsuariosRol">
              <div class="card-header" style="background: white">
                <h3 class="card-title">Roles con este  permiso</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool"  data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>                          
                </div>
              </div>
              <div class="card-body">   
                        <table class="table table -striped" id="tablaRol">
                      <thead>
                          <th>Nombre</th>
                          <th>Descripcion</th>
                      </thead>
                      <tbody>
                          @foreach ($permiso->roles as $item)
                              <tr>
                              <td><a href="{{route('roleShow',$item->id)}}" class="btn btn-sm">{{$item->name}}</a></td>
                              <td>{{$item->description}}</td>
                              
                          </tr>
                          @endforeach
                          
                        
                        

                      </tbody>
                  </table>   
              </div>
            </div>
        </div>
        

    </section>
    <!-- /.content -->
  </div>
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script>
    $(document).ready(function(){
      $('.tabla1').CardWidget('collapse',true);
      $('.tabla2').CardWidget('collapse',true);

    });
  </script>
@endsection
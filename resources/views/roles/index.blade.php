@extends('includes.dash')
@section('contenido')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             
            <h1 > <i class="fas fa-fw fa-unlock-alt"></i>Administracion De Roles</h1>
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

      <!-- Default box -->
      <div class="card card-info">
        <div class="card-header" >
          <h3 class="card-title"><i class="fas fa-table"></i> <strong>Todos los  Roles</strong> </h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
              <a href="#" class="btn btn-tool" id="Vercard" data-toggle="tooltip" title="Crear">
                <i class="fas fa-plus"></i></a>              
          </div>
        </div>
        <div class="card-body">  
          <table class="table table-striped table-bordered" id="tablaRol">
            <thead>
                <th>Nombre</th>
                <th>Descripcion</th>
            </thead>
            <tbody>
                @foreach ($roles as $item)
                <tr>
                    <td><a href="{{route('roleShow',$item->id)}}" class="btn btn-sm " style="background: rgb(201, 219, 219)">{{$item->name}}</a> </td>
                    <td class="text-info">{{$item->description}}</td>
                </tr>
                @endforeach 
            </tbody>
        </table>
              
        </div>
      </div>
      {{-- CARD CREAR ROL --}}
      <div id="cardCrearRol">
        <div class="card" id="">
          <div class="card-header" style="background: white"><strong>Creacion de rol</strong> </div>
          <div class="card-body">
              <div>
                  <form action="{{route('RolesStore')}}" method="POST" id="formRole">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="text" name="txtNombre" id="txtNombre"  class="form-control" id="" placeholder="Nombre de Rol" required>
                            <div class="valid-feedback"> </div>                                   
                          </div>
                          <div class="form-group col-md-8 ">
                            <label for="">Descripcion</label>
                            <input type="text" name="txtDescripcion" id="txtDescripcion" class="form-control" id="" placeholder="Descripcion" required>
                            <div class="valid-feedback"> </div>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-12">
                            {{-- <a href="#" id="btnAgregar" class="btn btn-success btn-sm btn-block">Agregar</a>                              --}}
                          </div>
                      </div>
              </div>            
          </div>        
        </div>
       <div class="card" id="cardPermisos">
        <div class="card-header" style="background: white"><strong>Asignacion de permisos</strong> </div>
        <div class="card-body">
            <div>               
                                             
                      @foreach ($permisos as $item)
                      <div class="form-check">                        
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="txtPermiso_id[]" id="txtPermiso_id" value="{{$item->id}}" >
                          {{$item->description}}
                        </label>
                      </div>
                      @endforeach
                    <br>
                  
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button  class="btn btn-success btn-sm btn-block">Agregar</button>
                          {{-- <a href="#" id="btnAgregar" class="btn btn-success btn-sm btn-block">Agregar</a>                              --}}
                        </div>
                    </div>
                </form>
            </div>
  
        </div>        
      </div>
      </div>
      
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script>
    $(document).ready(function(){
      $('.tabla').CardWidget('collapse',true);
    });

 
      let tablaRol=$('#tablaRol');
      $('#cardCrearRol').hide();

      $('#Vercard').click(function(){
        $('#cardCrearRol').show();
      });

    //   $('#btnAgregar').click(function(){
    //     var datosP = new FormData(document.getElementById("formRole")); 
    //     // alert (datosP);
    //     $.ajax(
    //         {
    //             url: "/roles/store", 
    //             type: "POST",
    //             data: datosP,
    //             processData: false,   //tell jQuery not to process the data
    //             contentType: false,    //tell jQuery not to set contentType
    //             //a continuacion refrescar la tabla despues de un evento
    //             success: function(response){
    //             alert('Rol Guardado!');            
    //             tablaRol.ajax.reload();              
    //             // limpiarFomr();
                 
    //             }
    //         })     
    //   });
      
  </script>
    
@endsection
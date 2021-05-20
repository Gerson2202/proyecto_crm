@extends('includes.dash')
@section('contenido')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3> <i class="fas fa-user-edit"></i> Edicion de Usuario</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('homeIndex')}}">Pagina Principal</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
           {{-- panel de informacion --}}
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{$user->profile_photo_url}}"
                            alt="User profile picture">
                    </div>
    
                    <h3 class="profile-username text-center">{{$user->name}}</h3>
    
                    <p class="text-muted text-center">{{$user->email}}</p>
    
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b></b> <a class="float-right"></a>
                        </li>
                        <li class="list-group-item">
                        <b></b> <a class="float-right"></a>
                        </li>
                        <li class="list-group-item">
                        <b></b> <a class="float-right"></a>
                        </li>
                    </ul>
    
                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            {{-- PANEL NADVAR --}}
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Bodega</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Roles</a></li>
                        <li class="nav-item"><a class="nav-link" href="#permisos" data-toggle="tab">Permisos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar</a></li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="activity">                          
                            {{-- <H4>CONTENIDO</H4> --}}
                            <div class="row">
                              <div class="col-6">
                                <h5 class="text-info">Bodega de materiales</h5>                                  
                                <hr>
                                <table class="table table-sm">
                                  <thead>
                                    <tr>
                                        <th>Material</th>
                                        <th>Cantidad</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                      @foreach ($materiales as $item)
                                      <tr>
                                        <th scope="row" class="text-info">{{$item->material->nombre}}</th>
                                        <td>{{$item->stock}}</td>
                                        </tr> 
                                      @endforeach
                                       
                                                                            
                                  </tbody>
                                </table>
                              </div>
                              <div class="col-6">
                                <h5 class="text-info">Bodega de Equipos</h5>                                  
                                <hr>
                                <table class="table table-sm">
                                  <thead>
                                    <tr>
                                        <th>Tipo</th>
                                        <th>Mac</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                      @foreach ($equipos as $item)
                                      <tr>
                                        <th scope="row" class="text-info">{{$item->nombre}}</th>
                                        <td><a href="{{route('equipoShow',$item->id)}}">{{$item->mac}}</a></td>
                                        </tr> 
                                      @endforeach
                                       
                                                                            
                                  </tbody>
                                </table>
                              </div>
                              {{-- <div class="col-6">
                                <h5>Equipos en posecion</h5>
                                <hr>
                              </div> --}}
                            </div>
                          
                        </div>
                        <!-- /.tab-pane  ROLES Y PERMISOS-->
                          @include('usuarios.section.rolesypermisos')
                        {{-- PANEL EDICION USER Y ASIGA PROYECTOS --}}
                        @include('usuarios.section.editar')
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                  
            </div>
        </div>     
    </section>
    <!-- /.content -->
  </div>
  @include('includes.pluggin')
  {{-- EDICION DE PROYECTOS --}}
  <script>   

         $('#selectProject').on('change', onSelectProjectChange); 

         function onSelectProjectChange() 
         {
            var project_id = $(this).val();
            $.ajax(
                      {
                          url: "/nivel/buscar/"+project_id, 
                          type: "GET",
                          processData: false,   //tell jQuery not to process the data
                          contentType: false, //tell jQuery not to set contentType
                          
                          success: function(nivel)
                            {
                                
                                var html_select = '<option value="">Seleccione nivel</option>';                                
                                for (var i=0; i<nivel.length; ++i)
                                {
                                    html_select += '<option value="'+nivel[i].id+'">'+nivel[i].name+'</option>';                                
                                    $('#selectLevel').html(html_select);
                                }                                
                            }
                    })
         }       
       
          
  </script>
  {{-- ENLAZAR USUARAIO A CLIENTE --}}
  <script>
    $("#btnEnlazar").on('click', function ()
     {
      var datosP = new FormData(document.getElementById("formEnlazarcliente")); 
      $.ajax(
          {
            url: "/crm/cliente/enlazarUser", 
            type: "POST",
            data: datosP,
            processData: false,   //tell jQuery not to process the data
            contentType: false,    //tell jQuery not to set contentType
              //a continuacion refrescar la tabla despues de un evento
             success: function(response){
               alert('Ticket Guardado!');            
               
              }
         })   
    });

    // SELECT 2
    $("#selectClientes").select2({
         placeholder: "selecciona el cliente",
         theme: "classic",                        
                          
                      
     });
  </script>
    
@endsection
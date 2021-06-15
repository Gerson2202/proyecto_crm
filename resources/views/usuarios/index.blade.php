@extends('includes.dash')
@section('contenido')
{{-- DATABLES --}}
@include('includes.datatable.Styles')
 {{-- END LINKS --}}
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-user-tie"></i> Administracion De Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina Principal</a></li>
              {{-- <li class="breadcrumb-item btn-outline-success"><a href="#">Nuevo</a></li> --}}
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
          <h3 class="card-title"><i class="fas fa-user-check"></i> Lista de usuarios </h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-default"  title="Nuevo">
              <i class="fas fa-user-plus"></i></button>          
          </div>
        </div>
        {{-- modal --}}          
            <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Datos de usuario</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">              
                          <form method="POST" action="{{route('userStore')}}" id="formAgregarUser">
                              @csrf
                              <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Nombres</label>
                                    <input type="text" name="txtName" id="txtName" class="form-control"  value="" placeholder="Nombre y Apellido" required>
                                    <div class="valid-feedback"></div>
                                </div>                          
                              </div>
                               <div class="form-row">
                                <div class="col-md-12 mb-3">
                                  <label for="validationServer01">Correo</label>
                                  <input type="email" name="txtEmail" id="txtEmail" class="form-control"  value="{{old('txtEmail','@gmail.com')}}" required>
                                  <div class="valid-feedback"></div>
                                </div>                         
                              </div>
                              <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Contraseña</label>
                                    <input type="text" name="txtPassword" id="txtPassword" class="form-control" value="{{old('txtPassword',Str::random(8))}}" placeholder="Password" required>
                                    <div class="valid-feedback"></div>
                                </div>                          
                              </div>                          
                              <div class="modal-footer">
                                <button type="submit" class="btn text-light" style="background-color:#3333cc">Agregar</button>
                                {{-- <a href="#" class="btn text-light" id="btnGuardar"  style="background-color:#3333cc">Agregar</a> --}}
                              
                              </div> 
                          </form> 
                      </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>

            {{-- CARD DE USUARIOS --}}
        <div class="card-body">
          @if (session('mensaje'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{session('mensaje')}}
            </div>
            @endif
          <div class="row">
            @foreach ($users as $item)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Digital Strategist
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$item->name}}</b></h2>
                      <p class="text-muted text-sm"><b>Roles: </b> @foreach ($item->roles as $rol)
                      </b>{{$rol->name}}/</p>
                      @endforeach 
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        {{-- <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li> --}}
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono #: + 57 322450943</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{$item->profile_photo_url}}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    @if ($item->id<2)
                    {{-- No muestre nada poruqe es suer admin y no quiero eliminar --}}
                    @else
                    <a href="#" class="btn btn-sm bg-danger btnEliminar" dato="{{$item->id}}">
                      <i class="fas fa-trash-alt"></i>
                    </a>   
                    @endif
                    
                    <a href="{{route('userShow',$item->id)}}" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> Ver Perfil
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
           
          </div>
        
                  

        </div>
        <!-- /.card-body -->
       
      </div>
      
       

    
  </div>
  @include('includes.pluggin') 
  <script>
    let idUser;
    $('.btnEliminar').click(function(){
       idUser=$(this).attr('dato');
      Swal.fire({
                  title: 'Estas Seguro?',
                  text: "Deseas Eliminar este Usuario?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    let ruta1 = "{{ route('userEliminar', 'req_id') }}" 
                    var ruta = ruta1.replace('req_id',idUser)
                    $.ajax(
                      {
                        url: ruta, 
                        processData: false,   //tell jQuery not to process the data
                        contentType: false,    //tell jQuery not to set contentType
                          //a continuacion refrescar la tabla despues de un evento
                        success: function(response){              
                          Swal.fire({
                              icon: 'success',
                              title: 'Usuario Eliminado',
                              showConfirmButton: false,
                              timer: 700
                          }).then((result) => {
                              // redireccion con javascript
                              window.location.href = "/Crm/user/index";
                              //recargar página  jQuery
                              location.reload();
                          });
                          }
                    })  
                    
                  }
                })       
    });
  </script>
   {{-- BUSCADOR --}}
@include('includes.buscador')
@endsection
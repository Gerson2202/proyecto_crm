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
            <h1>Administracion De Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina Principal</a></li>
              <li class="breadcrumb-item btn-outline-success"><a href="#">Nuevo</a></li>
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
          <h3 class="card-title">Lista de usuarios </h3>
          <a class="btn text-light btn-sm mx-4" data-toggle="modal" data-target="#modal-default" href="#" style="background-color:#999999">
            <i class="fas fa-user-plus"></i> Nuevo
          </a>            
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
                          <form method="POST" id="formAgregarUser">
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
                                <a href="#" class="btn text-light" id="btnGuardar"  style="background-color:#3333cc">Agregar</a>
                              
                              </div> 
                          </form> 
                      </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
        <div class="card-body">
            
                    <table class="table table -striped" id="user">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>img</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>opciones</th>
                                
                              </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table> 

        </div>
        <!-- /.card-body -->
       
      </div>

      @include('includes.datatable.Scripts')

      {{-- TABLA --}}
    <script> 
            
          let table= $('#user').DataTable({
                "ajax": "{{route('userListar')}}",
                            "columns": [
                              {data: 'id'},
                              {data: 'profile_photo_url'},                              
                              {data: 'name'},
                              {data: 'email'},
                              {data: 'id'},
                                                                
                            ],
                            "columnDefs": [ {
                                "targets":1,
                                "data": "download_link",
                                "render": function ( data, type, row, meta ) {
                                  return ' <li class="list-inline-item"><img style="width: 50px; height: 50px;" class="img-circle" src = "'+data+'" ></li> ';
                                }
                              },
                              {
                                "targets":4,
                                "data": "link",
                                "render": function ( data, type, row, meta ) {
                                  return ' <a href="/Crm/user/show/'+data+'" class="btn btn-sm btn-primary text-light"><i class="fas fa-user"> Ver Perfil</i></a> ';
                                }
                              } ],
              responsive:true,
              autoWidth: false,
              
              "language":
                { 
                    "lengthMenu": "Mostrar _MENU_ Registros",
                    "zeroRecords": "Obteniendo datos....",
                    "info":"Pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrado de  _MAX_ registros totales)",
                    "sSearch": "Buscar:",
                    "oPaginate": {
                      "sFirst": "Primero",
                      "sLast": "Ultimo",
                      "sNext": "Siguiente",
                      "sPrevious": "Anterior"
                },
                "sProcessing": "Procesando...",
            }
            
            
            });
        </script>  

    </section>

    {{-- FUNCIONES USER --}}
    <script>
      $('#btnGuardar').click(function(){
        var datosP = new FormData(document.getElementById("formAgregarUser")); 
        // console.log(datosP);
          $.ajax(
              {
                url: "/Crm/user/store", 
                type: "POST",
                data: datosP,
                processData: false,   //tell jQuery not to process the data
                contentType: false,    //tell jQuery not to set contentType
                  //a continuacion refrescar la tabla despues de un evento
                error: function(nuevo){
                 
                  
                    toastr.error("!!Intenta con otro Correo!");              
                    
                  },
               success: function(nuevo){
                  toastr.success("!!Usuario Agregado!!"); 
                  table.ajax.reload();            
                  limpiar();
                  }
            })    
      });

      function limpiar(){
        $('#modal-default').modal('hide');
        $('#txtName').val("");
        $('#txtPassword').val("");
        $('#txtEmail').val("");
      }
    </script>
    <!-- /.content -->
  </div>
    
@endsection
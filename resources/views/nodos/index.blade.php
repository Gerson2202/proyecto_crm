@extends('includes.dash')
@section('contenido')
<link rel="stylesheet" href="{{asset('assets/vendor/sweetalert2/sweetalert2.min.css')}}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="nav-icon fas fa-broadcast-tower text-blue"></i> Administracion De Nodos</h1>
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
        <div class="row">
            <div class="col-12">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  {{-- <h4>Custom Content Below</h4> --}}
                  <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Home</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Sedes</a>
                    </li>
                    {{--<li class="nav-item">
                      <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Mis Clientes</a>
                    </li> --}}
                  </ul>
                  {{-- SECCION HOME --}}
                  <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                      <br>
                      <div class="row">
                        {{-- TABLA DE NODOS y agregar ndo --}}
                        @include('nodos.section.indexTabla')
                          {{-- fin del modal --}}
                          
                           
                          {{-- card infformacion           --}}
                          <div class="col-lg-6 col-12">
                            <div class="card bg-info bg-disabled" id="cardDetalle" style="display: none">
                                <div class="card-header"><strong>Informacion</strong>  
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                          <i class="fas fa-minus"></i></button>
                                          <a href="#"  class="btn btn-tool btnEliminar" id="btnEliminar"  title="Remove"><i class="fas fa-trash-alt"></i></a>
                                          
                                        <button type="button" class="btn btn-tool" id="btnEditar" data-toggle="modal" data-target="#modal-editar" title="Editar"><i class="fas fa-edit"></i></button>    
                                      </div>
                                </div>
                                <div class="card-body">
                                  <strong>Nombre:</strong><span id="spanNombre"></span>
                                  <hr style="background: white">
                                  <strong>Ubicacion:</strong><span id="spanUbicacion"></span>
                                  <hr  style="background: white">
                                  <strong>Coordenadas:</strong><span id="spanCoordenadas"></span>
                                  <hr  style="background: white">
                                  <strong>Descripcion:</strong><span id="spanDescripcion"></span>
                                 
                                  <hr  style="background: white" style="background: white">
                                  <strong>Equipos:</strong><span id="spanEquipos" name="spanEquipos[]"></span>
                                  <div  id="listado"></div>
                                  <hr>
                                </div>
                            </div>
                          </div> 

                          {{-- MODAL EDITAR --}}
                          <div class="modal fade" id="modal-editar">                              
                                    <form method="POST" id="formNodoUpdate">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Editar Nodo</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">                                                
                                              @csrf
                                              <div class="form-row">
                                                <div class="form-group col-md-4">
                                                  <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                                  <input type="text" name="txtNombreEdit" id="txtNombreEdit" class="form-control" placeholder="Nombre de nodo" required>
                                                  <div class="valid-feedback"> </div>                                   
                                                </div>
                                                <div class="form-group col-md-8 ">
                                                  <label for="">Ubicacion</label>
                                                  <input type="text" name="txtUbicacionEdit" id="txtUbicacionEdit" class="form-control" id="" placeholder="Direccion" required>
                                                  <div class="valid-feedback"> </div>
                                                </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-6">
                                                  <label for="exampleInputEmail1" class="form-label">Coordenadas</label>
                                                  <input type="text" name="txtCoordenadasEdit" id="txtCoordenadasEdit"  class="form-control" id="" placeholder="Digita Coordenadas" required>
                                                  <div class="valid-feedback"> </div>                                   
                                                </div>
                                                <div class="form-group col-md-6 ">
                                                  <label for="">Descripcion</label>
                                                  <input type="text" name="txtDescripcionEdit" id="txtDescripcionEdit" class="form-control" id="" placeholder="añade una Descripcion" required>
                                                  <div class="valid-feedback"> </div>
                                                </div>
                                              </div>
                                              <div class="form-row">
                                                <div class="form-group col-md-12">
                                                  <label for="exampleInputEmail1" class="form-label">Equipos</label>
                                                  <select name="SelectEquiposEdit[]" id="selectEquiposEdit" multiple="multiple" class="custom-select"  style="width: 100%" required>
                                                    @foreach ($equiposAll as $item)
                                                        <option value="{{$item->id}}">{{$item->mac}}</option>
                                                    @endforeach
                                                    
                                                  </select>
                                                  <div class="valid-feedback"> </div>                                   
                                                </div>
                                              </div>                                              
                                                                                             
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                              <a href="#" id="btnUpdate" class="btn btn-primary">Modificar</a>
                                          </div>                                                   
                                        </div>
                                      </div>
                                   </form>  
                            </div>                                
                                
                             
                      </div>
  
                    </div>
                    {{-- SEDES --}}

                    <div class="tab-pane fade show " id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                      <br>
                      <div class="form-row">
                        <div class="col-4">
                          <div class="card">
                              <div class="card-header card-primary  card-outline text-center text-info">Agregar Sede</div>
                              
                              <form action="" id="formAggSede">
                                @csrf
                                <div class="card-body">           
                                  <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Nombre"> 
                                  <br>
                                  
                                  <a href="#" onclick="AgregarSede()" class="btn btn-info btn-sm">Agregar </a>
                                
                                
                                </div>            
                            </form>
                          </div>
                        </div>
                        <div class="col-8">
                          <div class="card">
                              <div class="card-header card-primary  card-outline text-center">Sedes</div>
                              <div class="card-body">
                                <div class="table-responsive">
                                  <table class="table table-sm" id="tablaSede">
                                    <thead>
                                      <tr>       
                                          <th>id</th>               
                                          <th>Nombre</th>
                                          <th>Opciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                          
                                       </tr>                                       
                                    </tbody>
                                  </table>
                              </div>
                               
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- /.card -->
              </div>
            </div>
          </div>         

    
    </section>
    <!-- /.content -->
  </div>
  @include('includes.pluggin')
  <script>
    // ver detalle del NODO
    let idNodo;
      $('.btnVer').click(function(e)
      {
        e.preventDefault();
        var datos = $(this).attr('datos');
        var equipos = $(this).attr('equipos');
        let dt=JSON.parse(datos);
        let eq=JSON.parse(equipos);

        // Lista de quipos
        let equiposArray=dt.equipo
        // Extraemos solo array con ids para ususarlo en el select2
        let array=equiposArray.map((equipo)=>equipo.id);

        idNodo=dt.id;

        $('#cardDetalle').show();
        $('#spanNombre').html(" "+dt.nombre);
        $('#spanUbicacion').html(" "+dt.direccion);
        $('#spanCoordenadas').html(" "+dt.coordenadas);
        $('#spanDescripcion').html(" "+dt.descripcion);
       
       console.log(array);
        $("#listado").html("");   //VACIAMOS EL DIV 
        var listado =document.getElementById("listado");
        eq.forEach(function(data,index)
        {
              var linea= document.createElement("li");                            
              var contenido= document.createTextNode(data.nombre+"- MAC:" +data.mac);
              listado.appendChild(linea);
              linea.appendChild(contenido);
        })
        // ELIMINAR NODO   
        $('#btnEliminar').click(function(e)
         {    
            // e.preventDefault();
                Swal.fire({
                  title: 'Estas Seguro?',
                  text: "Deseas Eliminar este Nodo?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si!'
                }).then((result) => {
                  if (result.isConfirmed) {

                    let ruta1 = "{{ route('nodoEliminar', 'req_id') }}" 
                    var ruta = ruta1.replace('req_id',idNodo)
                    $.ajax(
                      {
                        url: ruta, 
                        processData: false,   //tell jQuery not to process the data
                        contentType: false,    //tell jQuery not to set contentType
                          //a continuacion refrescar la tabla despues de un evento
                        success: function(response){              
                          Swal.fire({
                              icon: 'success',
                              title: 'Nodo Eliminado',
                              showConfirmButton: false,
                              timer: 700
                          }).then((result) => {
                              // redireccion con javascript
                              window.location.href = "/Crm/nodo/index";
                              //recargar página  jQuery
                              location.reload();
                          });
                          }
                    })  
                    
                  }
                })       
          
         });   
        //  BTN EDITAR NODO
         $('#btnEditar').click(function(e)
         {    
            $('#txtNombreEdit').val(dt.nombre);
            $('#txtUbicacionEdit').val(dt.direccion);
            $('#txtCoordenadasEdit').val(dt.coordenadas);
            $('#txtDescripcionEdit').val(dt.descripcion);  
            $('#selectEquiposEdit').val(array).trigger('change.select2');
         });
         
        //  ACTION EDITAR NODO
         $('#btnUpdate').click(function()
         {   
          var datosUpdate = new FormData(document.getElementById("formNodoUpdate")); 
          let ruta11 = "{{ route('nodoUpdate', 'req_id') }}" 
          var ruta2 = ruta11.replace('req_id',idNodo)
            $.ajax(
                {
                  url: ruta2, 
                  type: "POST",
                  data: datosUpdate,
                  processData: false,   //tell jQuery not to process the data
                  contentType: false,    //tell jQuery not to set contentType
                    //a continuacion refrescar la tabla despues de un evento
                  success: function(response){
                   
                    Swal.fire({
                              icon: 'success',
                              title: 'Cambios Guardados',
                              showConfirmButton: false,
                              timer: 700
                          }).then((result) => {
                              // redireccion con javascript
                              // window.location.href = "/Crm/nodo/index";
                              //recargar página  jQuery
                              location.reload();
                          });
                      
                        
                  }
              }) 
         });

      });
  </script>
  
<script>
                
  $("#selectEquipos").select2({
  placeholder: "selecciona Equipos",
              
  });
  $("#selectEquiposEdit").select2({
  placeholder: "selecciona Equipos",
              
  });

  function AgregarSede()
  {
    var sede= new FormData(document.getElementById("formAggSede")); 
      $.ajax(
          {
            url: "{{route('sedeStore')}}", 
            type: "POST",
            data: sede,
            processData: false,   //tell jQuery not to process the data
            contentType: false,    //tell jQuery not to set contentType
              //a continuacion refrescar la tabla despues de un evento
             success: function(response){
               $('#txtNombre').val("");
              toastr.success("Sede Guardada");
              tablaSede.ajax.reload();
              }
         })  
  };

  var tablaSede =$('#tablaSede').DataTable(
      {
                      "ajax": "{{route('sedeListar')}}",
                      "columns": [
                        {data: 'id'},
                        {data: 'nombre'}, 
                        {defaultContent: ' </button> <button class="btn btn-sm btn-danger tittle="eliminar" id="btnEliminaSede"><i class="fas fa-trash-alt"></i></button>'}                 

                        
                      ],
                    responsive:true,
                    autoWidth: false,
                        
                    "language": { 
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

      var fila; //captura la fila en la que estoy

        $(document).on("click","#btnEliminaSede",function(){
         fila= $(this).closest("tr");
         let idSede= parseInt(fila.find('td:eq(0)').text()); //tomamos el primero dato el 0 que se encuentra en esa fila en nuestro caso es el id
         Swal.fire({
                  title: 'Estas Seguro?',
                  text: "Deseas Eliminar esta Sede?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    let rutaS1 = "{{ route('sedeDelet', 'req_id') }}" 
                    var rutaS = rutaS1.replace('req_id',idSede)
                    $.ajax(
                    {
                        url: rutaS, 
                        processData: false,   //tell jQuery not to process the data
                        contentType: false, //tell jQuery not to set contentType
                          
                          success: function(response)
                          {
                            tablaSede.ajax.reload();
                            toastr.success("Sede Eliminada");
                          }        
                    }) 
                  }
                })      


        });

</script>
{{-- MENSAJE DE EXITO --}}
@if (session('mensaje'))
<script>
  toastr.success("{{session('mensaje')}}");
</script>                
@endif

{{-- END MENSAJE DE EXITO --}}
    @include('includes.buscador')
@endsection
@extends('includes.dash')
@section('contenido')
<link rel="stylesheet" href="{{asset('assets/vendor/sweetalert2/sweetalert2.min.css')}}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="nav-icon fas fa-broadcast-tower text-blue"></i> Administracion De Nodossss</h1>
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
                    {{-- <li class="nav-item">
                      <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Agregar</a>
                    </li>
                    <li class="nav-item">
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
                    $.ajax(
                      {
                        url: "/Crm/nodo/eliminar/"+idNodo, 
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

      });
  </script>
  
<script>
                
  $("#SelectEquipos").select2({
  placeholder: "selecciona Equipos",
              
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
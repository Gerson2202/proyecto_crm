@extends('includes.dash')
@section('contenido')
{{-- arriba esta lo del autocomplete --}}
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-sign-out-alt"></i> Salida de Equipos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('equiposIndex')}}">Pagina Principal</a></li>
                {{-- <li class="breadcrumb-item "><a href="">Pagina prueba</a></li>  --}}
            </ol>
           </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
   {{-- lista de contratos --}}
      <!-- Default box style="background-color:#3333cc"-->
      <div class="card">
        <div class="card-header card-blue card-outline" style="background: white" >
          <h3 class="card-title"><i class="fas fa-table"></i>Lista de salidas</h3>          
        </div>
        <div class="card-body">
          <table class="table table-striped table-bordered" id="salidas">
            <thead>
              <tr>
                  <th>id</th>
                  <th>fecha</th>
                  <th>Destino</th>
                  <th>Opciones</th>
              </tr>
         </thead>
          <tbody >
          </tbody>

          </table>
        </div> 
        @include('includes.pluggin')
        <script> 
                            
           let tabla= $('#salidas').DataTable({
              "ajax": "{{route('salidaListado')}}",
              "columns": [
                  {data: 'id'},
                  {data: 'fecha'},
                  {data: 'destino'},     
                  {defaultContent: '<button class="btn btn-sm btn-danger btnEliminar" id="btnEliminar"><i class="fas fa-trash-alt"></i></button>'}                          
              ],
              "columnDefs": [ {
                                "targets":0,
                                "data": "download_link",
                                "render": function ( data, type, row, meta ) {
                                  return '<a href="/Crm/Inventario/salida/show/'+data+'" class="btn btn-info btn-sm">'+data+'<a>';
                                }
                              }],
              responsive:true,
              autoWidth: false,
              "order": [[ 0, 'asc' ], [ 1, 'asc' ]],
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
        <!-- /.card-body style="background-color:#3333cc"-->
        <div class="card-footer text-light" >
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

  {{-- ELIMINAR  --}}
<script>
  let fila;
  let id;
  $(document).on("click",".btnEliminar",function(){
    fila=$(this).closest("tr");
    let id= parseInt(fila.find('td:eq(0)').text());
    Swal.fire({
                  title: 'Estas Seguro?',
                  text: "Deseas Eliminar Esta Salida?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax(
                      {
                        url: "/Crm/Inventario/salida/delet/"+id, 
                        processData: false,   //tell jQuery not to process the data
                        contentType: false,    //tell jQuery not to set contentType
                          //a continuacion refrescar la tabla despues de un evento
                        success: function(response){              
                          toastr.success("Salida Eliminada");
                          tabla.ajax.reload();
                          }
                    })  
                    
                  }
                })    
    
  });
</script>
                     
        
  
    
@endsection
@extends('includes.dash')

@section('contenido')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vista Principal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('tecnicoIndex')}}">Pagina Principal</a></li>
              {{-- <li class="breadcrumb-item btn-outline-success"><a href="{{route('equipoCreate')}}">Nuevo Equipo</a></li> --}}
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content-body">
      <!-- Main content -->
      <div class="content">
        {{-- SECTION DETALLE DE ACTA --}}
        <div class="container-fluid">          
          @include('tecnicos.section.showDetalleActa')
          {{-- SECTION IMAGENES --}}          
          @include('tecnicos.section.showSectionImg')
        </div><!-- /.container-fluid -->
      </div>
     </section>
    <!-- /.content -->
</div>
@include('includes.pluggin')
  
@include('tecnicos.section.showImagenesScript')

  {{-- COLLPASAR TARGETAS --}}
  <script>
    $(document).ready(function(){
      $('.cardAggimg').CardWidget('collapse',true);
      $('.cardImgs').CardWidget('collapse',true);
    });
  </script>
{{-- ELIMINAR FOTO --}}
<script>
  var fila; //captura la fila en la que estoy
       
       $(document).on("click",".btnEliminarImg",function(){
        fila= $(this).closest("tr");
        let idImg= parseInt(fila.find('td:eq(0)').text()); 
        Swal.fire({
                 title: 'Estas Seguro?',
                 text: "Deseas Eliminar Esta imagen?",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Si!'
               }).then((result) => {
                 if (result.isConfirmed) {
                  let rutaef1 = "{{ route('eliminarImg', 'req_id') }}" 
                  var rutaf = rutaef1.replace('req_id',idImg)
                   $.ajax(
                     {
                       url: rutaf, 
                       processData: false,   //tell jQuery not to process the data
                       contentType: false,    //tell jQuery not to set contentType
                         //a continuacion refrescar la tabla despues de un evento
                       success: function(response){ 
                         tablaImg.ajax.reload();             
                         Swal.fire({
                             icon: 'success',
                             title: 'Imagen  Eliminada',
                             showConfirmButton: false,
                             timer: 700
                         })
                         }
                   })  
                   
                 }
               })  
       });
</script>

{{-- ACRIP DE AGREGAR MATERIALES A ACTA --}}
<script>

  function agregarMaterial()
      {  

        var datosP = new FormData(document.getElementById("formAgregarMaterialActa")); 
          $.ajax(
              {
                url: "{{route('agregarMaterialActa')}}", 
                type: "POST",
                data: datosP,
                processData: false,   //tell jQuery not to process the data
                contentType: false,    //tell jQuery not to set contentType
                  //a continuacion refrescar la tabla despues de un evento
                success: function(response){
                  toastr.success("Material Agregado"); 
                  $('#inputCantidad').val('0');    
                  tableMateriales.ajax.reload();
                  }
            })           
      };
</script>
{{-- ACRIPT PARA TABLA MATERIALES ACTA --}}
<script> 
// TABLA DE MATERIALES
  var idActa=$('#txtidActa').val();        
  let ruta1a = "{{ route('listarMateriales', 'req_id') }}" 
  var rutaM = ruta1a.replace('req_id',idActa)

  let tableMateriales=$('#tablaMateriales').DataTable({
    "bPaginate": false, "bFilter": false, "bInfo": false,
    
    'ajax' : {
        'url' : rutaM,
    },
    "columns": [
        {data: 'material.nombre'},
        {data: 'stock'},
        // {data: 'id'},
        // {data: 'material_id'},
    ],
    // "columnDefs": [
    //                       {
    //                         "targets":2,
    //                         "data": "link",
    //                         "render": function ( data, type, row, meta ) {
                              
    //                           return ' <a href="#" onclick="eliminarMaterial('+data+')" class="btn btn-sm btn-danger text-light eliminarMaterial"><i class="fas fa-trash-alt"> </i></a> ';
    //                         }
    //                       },
    //                         {
    //                           // OCULTAR COLUMNA
    //                             "targets": [ 3 ],
    //                             "visible": false,
    //                             "searchable": false
    //                         }
    //                       ],
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

@endsection
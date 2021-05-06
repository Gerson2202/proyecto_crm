@extends('includes.dash')

@section('contenido')

<div class="content-wrapper kanban">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administracion De Inventario</h1>

        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Pagina Principal</a></li>
            <li class="breadcrumb-item btn-outline-default"><a href="{{route('equipoCreate')}}">Nuevo Equipo</a></li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content pb-3">
    <div class="container-fluid h-100">
      <div class="card card-row ">
        <div class="card-header" style="background: white">
          <h3 class="card-title " style="color: #357cda" >
            <i class="fas fa-edit"></i>
            Gestion De actividades!
          </h3>

        </div>
        <div class="card-body">
          @include('equipos.section.cardColores')

          {{-- LOS DOS ROW --}}
          @include('equipos.section.paneles')
      </div>
      </div>

    </div>
  </section>
</div>
@include('includes.pluggin')
<script>
  // AGREGAR MATERIAL
   $('#btnAgregarMaterial').click(function(){

     var datos = new FormData(document.getElementById("formMaterial"));
       $.ajax(
           {
             url: "/Crm/inventario/material/store",
             type: "POST",
             data: datos,
             processData: false,
             contentType: false,
             success: function(nuevo){

                 toastr.success("!!Material Agregado");
                 $('#inputStock').val("");
                 $('#inputName').val("");
                 tablaMateriales.ajax.reload();


             },
          })
   });

  function limpiarFormFactura()
  {
    $('#txtCodigo').val("");
    $('#txtProveedor').val("");
    $('#txtFecha').val("");
    $('#txtDescripcion').val("");
    $('#txtDocumento').val("");
  }

  // AGREGAR MOVIMIENTOS
  $('#btAgregarMovimiento').click(function(){
    // e.preventDefault();
    // var values = $("input[id='task']") .map(function(){return $(this).val();}).get();
    // var values =  $("input[id='txtStocks']") .map(function(){return $(this).val();}).get().filter(Boolean);
    // console.log(values);
    // // myArrClean = values.filter(Boolean);
    //  $('#arrayStockHiden').val(values);
    // // console.log(myArrClean);
    // var token=$('#token').val();

    // console.log(myArrClean);

    var datos = new FormData(document.getElementById("formMovimiento"));
      $.ajax(
          {
            url: "/Crm/e/Inventario/salida",
            type: "POST",
            data: datos,
            //  headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // },
            processData: false,   //tell jQuery not to process the data
            contentType: false,    //tell jQuery not to set contentType
              //a continuacion refrescar la tabla despues de un evento
                 error: function(salida){
                toastr.warning("!! Llenar todos los campos!!");
                let error=salida.responseJSON.errors.documento;
                if (error!=null) {
                  toastr.error("!!El codigo ya existe,Intenta con otro!!");
                   }
                 },
                success: function(salida){
                //  limpiarFormFactura();
                //  $('#modal-lg').modal('hide');
                //  toastr.success("!!Movimiento Guardado!!");
                //   // // solucion al no cerrarse
                //  if ($('.modal-backdrop').is(":visible"))
                //   {$('body').removeClass('modal-open'); $('.modal-backdrop').remove();
                //    } ;


                },
         })
  });

  function limpiarFormFactura()
  {
    $('#txtCodigo').val("");
    $('#txtProveedor').val("");
    $('#txtFecha').val("");
    $('#txtDescripcion').val("");
    $('#txtDocumento').val("");
  }

</script>
 {{-- BUSCAR EQUIPSO --}}

 <script>

   $("#equiposearch").select2({
     placeholder: "selecciona Los Equipos",

   });
 </script>
 {{-- DATATBLE MATERIALES --}}
 <script>

 let tablaMateriales=$('#tablaMateriales').DataTable({
    "ajax": "{{route('materialListar')}}",
    "bPaginate": true, "bFilter": false, "bInfo": false,
    "pageLength" : 5,
    "columns": [
        {data: 'nombre'},
        {data: 'stock'},
        {data: 'id'},
        {data: 'id'},
    ],
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
    },
    "columnDefs": [
                    {
                       "targets":2,
                         "data": "link",
                         "render": function ( data, type, row, meta ) {
                           return ' <a href="#" onclick="editarMaterial('+data+')" class="btn btn-sm btn-primary text-light"><i class="fas fa-edit">  </i></a> ';
                      }
                   },
                   {
                       "targets":3,
                         "data": "link",
                         "render": function ( data, type, row, meta ) {
                           return ' <a href="#" onclick="sumarMaterial('+data+')" class="btn btn-sm btn-info text-light"><i class="fas fa-plus-square">  </i></a> ';
                      }
                   }],


    });

// ELIMINAR METRIAL
    function eliminarMaterial(data)
    {
      $.ajax(
          {
            url: "/Crm/inventario/material/eliminar/"+data,
            processData: false,   //tell jQuery not to process the data
            contentType: false,    //tell jQuery not to set contentType
            success: function(salida){
             toastr.success("Material eliminado");
             tablaMateriales.ajax.reload();



             },
         })
    }; 
    // EDITAR METERIAL
    function editarMaterial(data)
    {
      $('#cardEditarMateriales').css("display", "block");      
      $('#idMaterialEditar').val(data);
      $.ajax(
          {
            url: "/Crm/inventario/material/editar/"+data,
            processData: false,   //tell jQuery not to process the data
            contentType: false,    //tell jQuery not to set contentType
            success: function(material){
              $('#inputnameEdit').val(material.nombre);
              $('#inputStokEdit').val(material.stock);



             },
         })
    };  

    // UDDATE MATERIAL
    $('#btneditarMaterial').click(function(){

        var datos = new FormData(document.getElementById("formEditarMaterial"));
          $.ajax(
              {
                url: "/Crm/inventario/material/update",
                type: "POST",
                data: datos,
                processData: false,
                contentType: false,
                success: function(nuevo){

                    toastr.success("!!Material Editado");
                    tablaMateriales.ajax.reload();
                    $('#inputStokEdit').val("");
                    $('#cardEditarMateriales').css("display", "none");
                   


                },
            })
      });
      

</script>
<script>
  var idSumar="";

      $(document).ready(function(){
      // Ocultamos el Card
      
     $('#cardSumarMateriales').css("display", "none");
     $('#cardEditarMateriales').css("display", "none");
    });

     // SUMAR MATERIAL
   function sumarMaterial(data)
    {
      $('#cardSumarMateriales').css("display", "block");
      $('#idMaterial').val(data);
    };

    $('#btnSumarMaterial').click(function(){
        var datos = new FormData(document.getElementById("formSumarMaterial"));
          $.ajax(
              {
                url: "/Crm/inventario/material/sumar",
                type: "POST",
                data: datos,
                processData: false,
                contentType: false,
                success: function(nuevo){

                    toastr.success("!!Material Sumado");
                    tablaMateriales.ajax.reload();
                    $('#stockSumar').val("");
                    $('#cardSumarMateriales').css("display", "none");
                   


                },
            })
      });
</script>

{{-- MENSAJE DE EXITO --}}
    @if (session('mensaje'))
    <script>
      toastr.success("{{session('mensaje')}}");
    </script>
    @endif
    @include('includes.buscador')

@endsection
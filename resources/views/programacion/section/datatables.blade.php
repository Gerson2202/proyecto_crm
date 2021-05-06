{{-- TABLA PROGRAMACION--}}
<script>  





//   PRGRAMACIONES EN COLA
  var tablaProgramacioncola=$('#programacionCola').DataTable(
  {
      "ajax": "{{route('programacionListarCola')}}",
      "columns": [ 
        {data: 'fecha'},
        {data: 'direccion'},  
        {data: 'descripcion'}, 
      ],
      responsive:true,
      autoWidth: false,
          "order": [[ 0, 'des' ], [ 1, 'des' ]],
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

  // TODAS LA PROGRAMACIONES
//   var tablaProgramacion=$('#programacion').DataTable(
//   {
//       "ajax": "{{route('programacionDatatable')}}",
//       "columns": [ 
//         {data: 'id'},
//         {data: 'titulo'},  
        
//         // {data: 'action',orderable: false},      
//         {defaultContent: '<a href="#" id="showModal" class="btn btn-info btn-sm showModal" data-toggle="modal" data-target="#modal-default2" id="show"> <i class="fas fa-search nav-icon"></i> </a>'}                 
      
//       ],
//       responsive:true,
//       autoWidth: false,
//           "order": [[ 0, 'des' ], [ 1, 'des' ]],
//           "language": { 
//               "lengthMenu": "Mostrar _MENU_ Registros",
//               "zeroRecords": "Obteniendo datos....",
//               "info":"Pagina _PAGE_ de _PAGES_",
//               "infoEmpty": "No records available",
//               "infoFiltered": "(filtrado de  _MAX_ registros totales)",
//               "sSearch": "Buscar:",
//               "oPaginate": {
//                 "sFirst": "Primero",
//                 "sLast": "Ultimo",
//                 "sNext": "Siguiente",
//                 "sPrevious": "Anterior"
//               },
//               "sProcessing": "Procesando...",
//           }
  
  
//   });
</script>
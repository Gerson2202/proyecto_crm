<script> 
    //  TABLA PROGRAMACIONES
     let tabla2= $('#programaciones').DataTable(
       {
            "ajax": "{{route('programacionListarAsiganadas')}}",
            "columns": [
              {data: 'id'},              
              {data: 'titulo'},
              {data: 'fecha'},
              {data: "hora_inicial"},
              {data: "hora_final"},              
              {data: 'direccion'},
              {data: 'estado'},
              {defaultContent: '<button class="btn btn-sm btn-success" id="btnCambiarEstado" title="cambiar de estado"><i class="fas fa-sync"></i></button>'},
              {data: 'cliente.nombre'},
              {data: 'descripcion'},
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
      // TABLA ACTAS
      let tablaActas= $('#actas').DataTable(
       {
            "ajax": "{{route('actasList')}}",
            "columns": [
              {data: 'id'},
              {data: 'fecha'},
              {data: "actividad"},
              {data: "user.name"}
            ],
            "columnDefs": [ {
                            "targets":0,
                            "data": "download_link",
                            "render": function ( data, type, row, meta ) {
                              return '<a href="/Crm/tecnico/show/'+data+'" class="btn btn-default text-info">Ver<a>';
                             }
                            }
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

      
   </script>
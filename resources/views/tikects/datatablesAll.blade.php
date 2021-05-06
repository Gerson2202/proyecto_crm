{{-- ACA VAN TODO EL SCRIP PARA REALIZAR LAS 3 TABLAS Y LA DE PROYECTOS--}}


 {{-- script de databales --}}
 <script> 
 
    // TABLA PROYECTOS
    var tablaProgramacion =$('#tablaProyectos').DataTable(
      {
                      "ajax": "{{route('proyectoListar')}}",
                      "columns": [
                        {data: 'id'},
                        {data: 'nombre'},
                        {data: 'descripcion'},
                        {data: 'start'},
                        {defaultContent: ' <button class="btn btn-info btn-sm mx-1" id="btnEditar" title="Editar"><i class="fas fa-edit"></i></button> <button class="btn btn-sm btn-danger tittle="eliminar" id="btnEliminarProyecto"><i class="fas fa-trash-alt"></i></button>'}                 

                        
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
         // TABLA 1 - TICKET ALL
    var tabla1=$('#tabla1').DataTable(
      {   
                      "ajax": "{{route('ticketListarAll')}}",
                      "columns": [
                        {data: 'id'},
                        {data: 'asunto'}
                        // {defaultContent: ' <button class="btn btn-info btn-sm mx-1" id="btnAtender" title="Editar"><i class="fas fa-edit"></i>Atender</button>'}                 

                        
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

        // TABLA 2 - tickets SIN ASIGNAR
        // let fecha = moment(item.created_at).format("YYYY-MM-DD, h:mm:ss");
        var tabla2 =$('#tabla2').DataTable(
      {
                      "ajax": "{{route('ticketNuevoListar')}}",
                      "columns": [
                        {data: 'id'},
                        {data: 'asunto'},
                        {data: 'created_at'},
                        {defaultContent: '<button class="btn btn-info btn-sm mx-1" id="btnAtender" title="Editar"><i class="fas fa-edit"></i>Atender</button>'},                
                        {defaultContent: '<button class="btn btn-warning btn-sm mx-1 btnAsignar" id="btnAsignar" title="Asignar"><i class="fas fa-user"></i> Asignar</button>'}                 
                        // {data: 'action',orderable: false} 
                        
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

       // TABLA 3 - tickets  ASIGNADOS
    var tabla3 =$('#tabla3').DataTable(
      {
                      "ajax": "{{route('ticketAsignadoListar')}}",
                      "columns": [
                        {data: 'id'},
                        {data: 'asunto'},
                        {data: 'created_at'}
                        // {defaultContent: '<button class="btn btn-danger btn-sm mx-1" id="btnCerrar" title="Editar"><i class="fas fa-close"></i>Cerrar</button>'}                 
                       
                      ],
                      "columnDefs": [ {
                                "targets":0,
                                "data": "download_link",
                                "render": function ( data, type, row, meta ) {
                                  return '<a href="/tikects/show/'+data+'" class="btn btn-info">'+data+'</a>';
                                }
                              }],
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

          // TABLA 4 - COMENTARIOS
    var tabla4 =$('#tablaComentarios').DataTable(
      {
                      "ajax": "{{route('comentariosListar')}}",
                      "columns": [
                        {data: 'id'},
                        {data: 'nombre'},
                        {data: 'contenido'},
                        {defaultContent: '<button class="btn btn-danger btn-sm mx-1" id="btnEliminarComentario" title="Editar"><i class="fas fa-trash-alt"></i></button>'}                 
                       
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

</script>
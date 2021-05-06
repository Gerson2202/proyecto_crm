// {{-- TABLA PRINCIPAL --}}
    
$('#tickets').DataTable({
    responsive:true,
    autoWidth: false,
    
            "language": {
                "lengthMenu": "Mostrar _MENU_ Registros",
                "zeroRecords": "No encontre nadita :( , Disculpa!",
                "info":"Pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de  _MAX_ registros totales)"
            }
    
    
    });

    // {{-- TABLA 2 --}}
    
    
    $('#tickets2').DataTable({
        responsive:true,
        autoWidth: false,
        
                "language": {
                    "lengthMenu": "Mostrar _MENU_ Registros",
                    "zeroRecords": "No encontre nadita :( , Disculpa!",
                    "info":"Pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrado de  _MAX_ registros totales)"
                }
        
        
        });
      
        // {{-- TABLA 3 --}}
      $('#tickets3').DataTable({
        responsive:true,
        autoWidth: false,
        
                "language": {
                    "lengthMenu": "Mostrar _MENU_ Registros",
                    "zeroRecords": "No encontre nadita :( , Disculpa!",
                    "info":"Pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrado de  _MAX_ registros totales)"
                }
        
        
        });
        

    //     // TABLA PROYECTOS
    //   var tablaProgramacion =$('#tablaProyectos').DataTable({
    //                         "processing": true,
    //                         "serverSide": true,
    //                     "ajax": "{{route('proyectoListar')}}",
    //                     "columns": [
    //                       {data: 'id'},
    //                       {data: 'nombre'},
    //                       {data: 'descripcion'},
    //                       {data: 'start'},
    //                       {defaultContent: ' <button class="btn btn-info btn-sm mx-1" id="btnEditar" title="Editar"><i class="fas fa-edit"></i></button> <button class="btn btn-sm btn-danger tittle="eliminar" id="btnEliminarProyecto"><i class="fas fa-trash-alt"></i></button>'}                 

                          
    //                     ],
    //                   responsive:true,
    //                   autoWidth: false,
                          
    //                   "language": { 
    //                     "lengthMenu": "Mostrar _MENU_ Registros",
    //                     "zeroRecords": "Obteniendo datos....",
    //                     "info":"Pagina _PAGE_ de _PAGES_",
    //                     "infoEmpty": "No records available",
    //                     "infoFiltered": "(filtrado de  _MAX_ registros totales)",
    //                     "sSearch": "Buscar:",
    //                     "oPaginate": {
    //                       "sFirst": "Primero",
    //                       "sLast": "Ultimo",
    //                       "sNext": "Siguiente",
    //                       "sPrevious": "Anterior"
    //                     },
    //                     "sProcessing": "Procesando...",
    //                 }
                      
                      
    //               });
    
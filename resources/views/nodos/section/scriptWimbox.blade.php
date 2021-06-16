{{-- DATATABLE --}}
<script>
     var tablaWimbox =$('#tablaWimbox').DataTable(
      {
                      "ajax": "{{route('wimboxListar')}}",
                      "columns": [
                        {data: 'nombre'},
                        {data: 'id'}, 
                        
                      ],
                      "columnDefs": [ 
                              {
                                "targets":1,
                                "data": "link",
                                "render": function ( data, type, row, meta ) {
                                  return ' <a href="#" onclick="EliminarWimbox('+data+')" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash-alt"> </i></a> ';
                                }
                              } ],
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

<script>
    function EliminarWimbox(data) {
        Swal.fire({
                  title: 'Estas Seguro?',
                  text: "Deseas Eliminar este Wimbox?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    let rutaS1W = "{{ route('wimboxDelet', 'req_id') }}" 
                    var rutaSw11 = rutaS1W.replace('req_id',data)
                    $.ajax(
                    {
                        url: rutaSw11, 
                        processData: false,   //tell jQuery not to process the data
                        contentType: false, //tell jQuery not to set contentType
                          
                          success: function(response)
                          {
                            tablaWimbox.ajax.reload();
                            toastr.success("Wimbox Eliminado");
                          }        
                    }) 
                  }
                })    
    }

function AgregarWimbox()
  {
    var sede= new FormData(document.getElementById("formAggWimbox")); 
      $.ajax(
          {
            url: "{{route('wimboxStore')}}", 
            type: "POST",
            data: sede,
            processData: false,   //tell jQuery not to process the data
            contentType: false,    //tell jQuery not to set contentType
              //a continuacion refrescar la tabla despues de un evento
             success: function(response){
               $('#txtNombreW').val("");
              toastr.success("Wimbox Agregado");
              tablaWimbox.ajax.reload();
              }
         })  
  };
</script>
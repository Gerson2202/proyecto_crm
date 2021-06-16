<script>

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
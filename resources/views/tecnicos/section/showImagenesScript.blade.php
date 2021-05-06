
<script>
    var idActa=$('#txtIdActa').html(); 
    
  
      Dropzone.options.myAwesomeDropzone = {

      headers:{
        'X-CSRF-TOKEN' : "{{csrf_token()}}",
        'idActa' : idActa,
      },
      init: function() 
        {
            this.on("queuecomplete", function(file)
                 {
                     tablaImg.ajax.reload(); 
                     $('.dropzone').val("");
                 });
            // PARA AGRAGAR EL BOTON DE REMOVER ARCHIVO
            this.on("addedfile", function(file) {

                // Create the remove button
                var removeButton = Dropzone.createElement("<button class='btn btn-danger btn-sm'><i class='fas fa-times'></i></button>");


                // Capture the Dropzone instance as closure.
                var _this = this;

                // Listen to the click event
                removeButton.addEventListener("click", function(e) {
                    // Make sure the button click doesn't submit the form:
                    e.preventDefault();
                    e.stopPropagation();

                    // Remove the file preview.
                    _this.removeFile(file);
                    // If you want to the delete the file on the server as well,
                    // you can do the AJAX request here.
                });

                // Add the button to the file preview element.
                file.previewElement.appendChild(removeButton);
            });
            


        },
                
      
      dictDefaultMessage: "Arrastre Una imagen al recuadro para subirlo(max:8)",
      acceptedFiles: "image/*",
      maxFilesize: 2, // MAXIMO TAMAÑO PERMITIDO
      maxFiles: 8, //maximo de fotos al mismo tiempo
     
    };
   
  
                              
        var tablaImg=$('#tableImgActa').DataTable({
          "ajax": '/acta/imagenes/list/'+idActa,
          "columns": [
              {data: 'id'},
              {data: 'url'},
              {defaultContent: '<button class="btn btn-sm btn-danger btnEliminarImg"><i class="fas fa-trash-alt"></i></button>'},            
              
          ],
          "columnDefs": [ {
                                  "targets":1,
                                  "data": "download_link",
                                  "render": function ( data, type, row, meta ) {
                                    return ' <li class="list-inline-item"><img style="width:150px; height:150px;" src = "'+data+'" ></li> ';
                                  }
                                },
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
          }
          
          
          });
                    
  </script>
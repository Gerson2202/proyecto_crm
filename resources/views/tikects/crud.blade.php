{{-- // CRUD DE TICKSTS --}}

<script> 
    // AGREGAR TICKETS  
    $('#txtImgShow').hide();//oculatamos img
    
    
    function agregarTicket()
   {        
     
      var datosP = new FormData(document.getElementById("formAgregarTicket")); 
      $.ajax(
          {
            url: "{{route('tikectStore')}}",  
            type: "POST",
            data: datosP,
            processData: false,   //tell jQuery not to process the data
            contentType: false,    //tell jQuery not to set contentType
              //a continuacion refrescar la tabla despues de un evento
             success: function(response){   
              $(".modalCrearTicket").modal("hide");                      
               tabla1.ajax.reload();
               tabla2.ajax.reload();               
               limpiarFomrTicket();               
               toastr.success("Ticket Agregado");  
              //  tabla2.ajax.reload();  //QUE SE RECARGUE LA DATATBALE
              //  tabla1.ajax.reload();
              }
         })           
   };

  
    //ATENDER TICKET
    $(document).on("click","#btnAtender",function()
     {
         fila= $(this).closest("tr");
            let id= parseInt(fila.find('td:eq(0)').text()); //tomamos el primero dato el 0 que se encuentra en esa fila en nuestro caso es el id
            let rutaA = "{{ route('ticketAtender', 'req_id') }}" 
            var rutaAt = rutaA.replace('req_id',id)
            $.ajax(
              {
                  url: rutaAt, 
                  type: "GET",
                  processData: false,   //tell jQuery not to process the data
                  contentType: false, //tell jQuery not to set contentType
                  
                   success: function(response)
                   {
                      tabla2.ajax.reload();
                      tabla3.ajax.reload();
                      toastr.info("Ticket Atendido");
                   }        
              }) 

    });

      // MOSTRAR DELLATE DE TICKET AL TOQUE
      var fila;
      var idTicket;
      $('#tabla1').on('click', 'td', function ()
        {
            // var data = tabla_tarea.row( this ).data();
            $('#cardDetallTicket').show();
            fila= $(this).closest("tr");
            let id= parseInt(fila.find('td:eq(0)').text());
            idTicket= id; //damos valos ala varible global que hize para mandar el id ala vista 
            let ruta1 = "{{ route('infoTicket', 'req_id') }}" 
            var ruta = ruta1.replace('req_id',id)
            $.ajax(
                   
                      {
                          url: ruta, 
                          type: "GET",
                          processData: false,   //tell jQuery not to process the data
                          contentType: false, //tell jQuery not to set contentType
                          
                          success: function(tikect)
                            {
                              var info = JSON.parse(tikect);
                              // console.log(info.user_hecho.profile_photo_url)
                              // console.log(info);
                              let fecha = moment(info.created_at).format("YYYY-MM-DD")
                              $('#id').html(info.id);
                              $('.txtAsuntoShow').html(info.asunto);
                              $('.txtClienteShow').html(info.cliente.nombre);                              
                              $('.txtMensajeShow').html(info.mensaje);                             
                                                            
                              $('.txtFechaShow').html(fecha);
                              $('#txtNombreShow').html(info.user_hecho.name);  
                              $('.txtMedioShow').html(info.medio.nombre);    
                              
                              
                              if(info.user_suport!=null ){
                                $('.txtPersonalEncargado').html(info.user_suport.name);
                              }else{
                                $('.txtPersonalEncargado').html('Sin atender');
                                                            
                              };


                               if(info.tipologia_id!=null){
                                $('#hTipologia').show("");
                                $('.txtTipoShow').html(info.tipologia.nombre);
                                
                              }else{
                                $('.txtTipoShow').html("");
                                $('#hTipologia').hide("");
                              };


                              if(info.peticion!=null){
                                $('#hPeticion').show("");
                                $('.txtPeticionShow').html(info.peticion.nombre);
                              }else{
                                $('#hPeticion').hide("");
                              };
                              
                              // AGREGAR IMAGEN DINAMICA
                              $('#txtImgShow').show();
                              var src = info.user_hecho.profile_photo_url;
                              var image = $('#txtImgShow').attr("src",src);
                              
                              
                              
                          }
                    })
                  
            
        });
        
        // IR A CHAT FORMA DE USAR UN BOTON PARA CAMBIO DE VISTA SIN AJAX
        $('#irChat').click(function()        
         {  
          let rutaS = "{{ route('ticketShow', 'req_id') }}" 
          var rutaSh = rutaS.replace('req_id',idTicket)  
          var src = rutaSh;
          var image = $('#irChat').attr("href",src); // SIN USAR AJAX 
         })

        //  ELIMINAR TICKET
         $('#eliminarTicket').click(function()
         {    
                Swal.fire({
                  title: 'Estas Seguro?',
                  text: "Deseas Eliminar este Ticket?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    let rutaE = "{{ route('ticketEliminar', 'req_id') }}" 
                    var rutaEl = rutaE.replace('req_id',idTicket)
                    $.ajax(
                    {
                        url: rutaEl, 
                        type: "GET",
                        processData: false,   //tell jQuery not to process the data
                        contentType: false, //tell jQuery not to set contentType
                          
                          success: function(response)
                          {
                            tabla1.ajax.reload();
                            tabla2.ajax.reload(); 
                            $('#cardDetallTicket').hide();
                            toastr.success("Ticket Eliminado");
                          }        
                    }) 
                  }
                })       
          
         })
  </script>

  {{-- FUNCIONES EXTRAS --}}
  <script>
    //LIMPIAR FORM AL GUARDAR PROYECTO
   function limpiar()
   {
        $("#modalnewTicket").modal('hide'); 
         $("#txtNombre").val("");
         $("#txtDescripcion").val("");
         $("#txtFecha").val(""); 
   }

  // CERRAR PANEL DE EDICION en proyectos

  $('.btnCerrarEdicion').click(function(e)
  {
         e.preventDefault();
        
          //  $('#cardAgregarProyecto').show();
           $('#rowEditar').hide();
  });

  //  CRUD DE TICKETS
    // LIMPIAR FORMULARIO AL CREAR TICKET
  

    function limpiarFomrTicket()
    {
      // $("#modalnewTicket").modal('hide'); 
      $('.txtNombreCliente').val("");
      $('#txtAsunto').val("");
      $('#txtTipo').val("");
      $('#txtMensaje').val("");
      $('#txtFile').val("");
     };

     
    //ELIMINAR TICKET
  
  
  </script>
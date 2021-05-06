@extends('includes.dash')
@section('contenido')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-sms"></i> Informacion de Ticket </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina Principal</a></li>
              <li class="breadcrumb-item "><a  href="javascript:history.back(-1);">Ir atras</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>   
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        {{-- <div class="card-header">
          <h3 class="card-title">Lista </h3>
        </div> --}}
        <div class="card-body">
            <div class="row">
               @include('tikects.section-show.contenido')

            </div>            
        </div>
      
        <!-- /.card-body -->
      </div>
      {{-- SECTION IMAGENES --}}
      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="card cardAggimg">
            <div class="card-header text-info"><i class="fas fa-edit "></i><strong> Agregar Imagenes</strong>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>             
              </div>
            </div>
            <div class="card-body">
            <form action="{{route('ticketSubirImagenes')}}" method="POST" id="my-awesome-dropzone" class="dropzone" >
              <input type="hidden" name="idTicket" value="{{$ticket->id}}">
            </form>
            </div>
         </div>
        </div>
        <div class="col-lg-8 col-12">
          <div class="card cardImgs">
            <div class="card-header text-info"><strong> Imagenes Cargadas</strong>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>             
              </div>
            </div>
            <div class="card-body">
              {{-- TABLA AMAGENES --}}
              <table class="table table-sm table-striped table-borderes" id="tableImgTickets">
                <thead>
                  <tr>
                      <th>Id</th>
                      <th>Imagen</th>
                      <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>                                      
                </tbody>
              </table>
              </table>

            </div>
         </div>
        </div>
        
      </div>
      <!-- /.card -->    

    </section>
    <!-- /.content -->
  </div>

   {{-- PUSHER --}}
   <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
   @include('includes.pluggin')
   {{-- COLLPASAR TARGETAS --}}
  <script>
    $(document).ready(function(){
      $('.cardAggimg').CardWidget('collapse',true);
      $('.cardImgs').CardWidget('collapse',true);
    });
  </script>
  
    {{-- para timezone --}}
   <script>
         pintarMensaje()
           
         //EVIAR MENSAJE
         $('#btnEnviar').click(function(e)
           {    
                  e.preventDefault();
                 var datosP = new FormData(document.getElementById("formMensaje")); 
                 $.ajax(
                     {
                         url: "/mensaje/guardar", 
                         type: "POST",
                         data: datosP,
                         processData: false,   //tell jQuery not to process the data
                         contentType: false,    //tell jQuery not to set contentType
                         //a continuacion refrescar la tabla despues de un evento
                         success: function(response)
                         {
                           $('.mensajito').val("");
                            pintarMensaje();
                         }
                     }) 
                         
           });

         
         // PINTAR MENSAJE EN LA TABLA

         function pintarMensaje()            {
           
             var id = $('#txtIdMensaje').html();                
             // , h:mm:ss
                 $.ajax(
                     {
                         url: "/mensaje/listar/"+id, 
                         processData: false,   
                         contentType: false,    
                       
                             success: function(ticket){
                                 var dato=JSON.parse(ticket);
                                 let caja= document.querySelector('#cajaMensajes'); 
                                 caja.innerHTML='';
                                 console.log(dato);
                                 for(let item of dato)                                    
                                 {
                                   let fecha = moment(item.created_at).format("YYYY-MM-DD, h:mm:ss");
                                   caja.innerHTML += 
                                   `<div class="direct-chat-msg">
                                       <div class="direct-chat-infos clearfix">
                                         <span class="direct-chat-name float-left">${item.user.name}</span>
                                         <span class="direct-chat-timestamp float-right" id="txtFechaMensaje">${fecha}</span>
                                       </div>
                                       <img class="direct-chat-img" src="${item.user.profile_photo_url}" alt="message user image">
                                       <div class="direct-chat-text  id="txtMensaje">${item.mensaje}</div>  
                                    </div> `                                      
                                 }
                           
                             }
                     }) 
         };

         // CAMMBIAR ESTADO DE TICKET
         $('#cambiarEstado').click(function()
         {
           var datos = $(this).attr('datos');
           var dato=JSON.parse(datos);
           var id= dato.id;
           var src = "/tikects/cambiarEstado/"+ id;
           var vs = $('#cambiarEstado').attr("href",src); // SIN USAR AJAX       

         });
   </script>
     {{-- ELIMINAR MENSJAES --}}
   <script>        
     let id;
     $(document).on("click",".vaciarChat",function(){
       var idTicket= $(this).attr('idTicket');
       Swal.fire({
                     title: 'Estas Seguro?',
                     text: "Deseas Eliminar Los mensajes?",
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                     cancelButtonColor: '#d33',
                     confirmButtonText: 'Si!'
                   }).then((result) => {
                     if (result.isConfirmed) {
                       $.ajax(
                         {
                           url: "/mensajes/eliminar/"+idTicket, 
                           processData: false,   //tell jQuery not to process the data
                           contentType: false,    //tell jQuery not to set contentType
                             //a continuacion refrescar la tabla despues de un evento
                             success: function(response){              
                             Swal.fire({
                                 icon: 'success',
                                 title: 'Mensajes Eliminados',
                                 showConfirmButton: false,
                                 timer: 700
                             }).then((result) => {
                               pintarMensaje();
                             });
                             }
                             })  
                       
                     }
                   })    
       
     });
   </script>
  {{-- //PUSHER --}} 
 <script>

   // Enable pusher logging - don't include this in production
   Pusher.logToConsole = true;

   var pusher = new Pusher('ef4dc591deca44dc0ead', {
     cluster: 'us2'
   });

   var channel = pusher.subscribe('chat-channel');
   channel.bind('chat-event', function(data) {
     // alert(JSON.stringify(data));
     pintarMensaje()
   });
 </script>

{{-- ELIMINAR IMAGEN --}}
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
                    $.ajax(
                      {
                        url: "/ticket/imagen/eliminar/"+idImg, 
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

  {{-- MENSAJE DE EXITO CIERRE DE TICKETS--}}

  @if (session('mensaje'))
  <script>
    toastr.warning("{{session('mensaje')}}");
  </script>                
  @endif

{{-- END MENSAJE DE EXITO --}}

{{-- SCRIPTS PARA MULTIPLES IMAGENES CON DATATABLE INCLUIDO --}}
@include('tikects.section-show.tableImg')
 
{{-- AGREGAR COMENTARIO A INPUT MENSAJE --}}
<script>
  $(document).ready(function(){
    $('#selectComentario').on('change',function(){
    var valor = $(this).val();
    $('#txtMensaje').val(valor);
    });
  })  
</script> 
@endsection
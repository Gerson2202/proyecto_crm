@extends('includes.dash')
@section('contenido')
{{-- <link rel="stylesheet" href="{{asset('vendor\select2-4.0.13\dist\css\select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/sweetalert2/sweetalert2.min.css')}}"> --}}
{{-- links de datables --}}


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> <i class="fas fa-tags"></i> Administracion de Tickets </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('homeIndex')}}">Pagina Principal</a></li>
              {{-- <li class="breadcrumb-item "><a href="{{route('clientesCreate')}}">Nuevo</a></li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>       
     {{-- MODAL CREAR TICKET --}}
     
     @include('tikects.formNewTicket')

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary  card-outline">
        <div class="card-header" style="background: white">
          <div class="card-tools">
            <a class=" text-blue mx-1" title="nuevo ticket" href="{{route('indexInforme')}}" >
              <i class="fa fa-print "></i>
              <a class=" text-blue mx-1" title="nuevo ticket" data-toggle="modal" data-target="#modalnewTicket" href="#" >
                <i class="fa fa-plus"></i>
            </a>            
          </div> 
        </div>

        <div class="card-body">          
            {{-- //menu --}}
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">              
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Sin Asignar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Asignadas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-comentarios-tab" data-toggle="pill" href="#custom-content-below-comentarios" role="tab" aria-controls="custom-content-below-comentarios" aria-selected="false">Comentarios</a>
              </li>
               {{-- <li class="nav-item">
                <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Proyectos</a>
              </li>       --}}
            </ul>
            {{-- fin menu --}}
            <div class="tab-content" id="custom-content-below-tabContent">
                {{-- MENUHOME --}}
                @include('tikects.menuHome')
                {{-- MENU TICKETS SIN ASIGNAR y ASIGNADOS--}}
                @include('tikects.menuSinasignar')   
                      
                {{-- MENU PROYECTOS --}}    
                @include('tikects.menuProyecto')  
                {{-- MENU COMENTARIOS               --}}
                @include('tikects.menuComentarios')  
            </div>
        </div>  
      </div>  

    </section>
    <!-- /.content -->
  </div>
  
  
  {{-- script de slect2 --}}
 @include('includes.pluggin') 
  

  {{-- DESABILITAR SELCTORES EN EL FORMULARIO --}}
  <script>
     $('#txtTipologia').on('change', onSelectProjectChange); 
      function onSelectProjectChange() 
      {
        var topologia_id = $(this).val();
        
        // alert(topologia_id);
        if (topologia_id!="") {
          $('#txtPeticion').attr("disabled",true);
        } else {
          $('#txtPeticion').attr("disabled",false);
        }
        
      };   

      $('#txtPeticion').on('change', onSelectProjectChange2); 
      function onSelectProjectChange2() 
      {
        var peticion_id = $(this).val();
        
        // alert(peticion_id);
        if (peticion_id!="") {
          $('#txtTipologia').attr("disabled",true);
        } else {
          $('#txtTipologia').attr("disabled",false);
        }
        
      };
  </script>

 {{-- DATATABLES --}}
  @include('tikects.datatablesAll')
  {{-- CRUDTICKETS --}}
  @include('tikects.crud')
  {{-- CRUD PROYECTOS --}}
  @include('tikects.crudProyectos')
  
  <script>

    $("#txtNombreCliente").select2({                              
      theme: "classic",
                                                                
    });
    
     $("#idUser").select2({                              
      theme: "classic",
                                                                
    });
    $("#txtMensaje").select2({                              
      theme: "classic",
                                                                
    });
  </script>
  {{-- en script slect2 --}}

  {{-- ASIGNAR TICKET --}}
  <script>
    var fila1;
    var idUser;
    var idTicket;
    $(document).on("click",".btnAsignar",function(){
         fila1= $(this).closest("tr");
         idTicket= parseInt(fila1.find('td:eq(0)').text());           
         $('#modal-asignar').modal('show');
         $('#idTicket').val(idTicket);
    });
    
    
    function asignarTicket()
   {        
       idUser=$('#idUser').val();
      $.ajax(
          {
            url: "/asignar/Ticket/"+idTicket+"/"+idUser, 
            data: idUser,
            processData: false,   //tell jQuery not to process the data
            contentType: false,    //tell jQuery not to set contentType
              //a continuacion refrescar la tabla despues de un evento
             success: function(response){
               $('#modal-asignar').modal('hide');
               toastr.success("Ticket Asignado");
               tabla1.ajax.reload();
               tabla2.ajax.reload();
               tabla3.ajax.reload();
             
              }
         })           
   };
  </script>

{{-- CRUD COMENTARIOS --}}
  <script>

    // GUARDAR COMENTARIOS
  function AgregarComentario()
   {        
      var comentario= new FormData(document.getElementById("formAggComentario")); 
      $.ajax(
          {
            url: "/comentario/guardar", 
            type: "POST",
            data: comentario,
            processData: false,   //tell jQuery not to process the data
            contentType: false,    //tell jQuery not to set contentType
              //a continuacion refrescar la tabla despues de un evento
             success: function(response){
               $('#txtNombre').val("");
               $('#txtContenido').val("");
              toastr.success("Comentario Guardado");
              tabla4.ajax.reload();
              }
         })           
   };

  //  ELIMINAR COMENTARIOS

  var fila; //captura la fila en la que estoy

        $(document).on("click","#btnEliminarComentario",function(){
         fila= $(this).closest("tr");
         let idComentario= parseInt(fila.find('td:eq(0)').text()); //tomamos el primero dato el 0 que se encuentra en esa fila en nuestro caso es el id
         Swal.fire({
                  title: 'Estas Seguro?',
                  text: "Deseas Eliminar este Comentario?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax(
                    {
                        url: "/comentario/eliminar/"+idComentario, 
                        processData: false,   //tell jQuery not to process the data
                        contentType: false, //tell jQuery not to set contentType
                          
                          success: function(response)
                          {
                            tabla4.ajax.reload();
                            toastr.success("Comentario Eliminado");
                          }        
                    }) 
                  }
                })      


        });
  </script>
   
  @include('includes.buscador')
  {{-- AGREGANDO VUE.JS --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script> --}}
  
  
    
@endsection
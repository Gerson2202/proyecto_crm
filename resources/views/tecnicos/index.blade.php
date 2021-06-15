@extends('includes.dash')

@section('contenido')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-people-arrows"></i> Panel de soporte</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('homeIndex')}}">Pagina Principal</a></li>
              {{-- <li class="breadcrumb-item btn-outline-success"><a href="{{route('equipoCreate')}}">Nuevo Equipo</a></li> --}}
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content-body">  
      
      <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Custom Tabs -->
              <div class="card card-primary card-outline">
                <div class="card-header d-flex p-0" styvvvvvvvvvvvvvvle="background: white">
                  <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Pricipal</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Historial</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Bodega</a></li>
                   
                      <a class="nav-link" data-toggle="modal" data-target="#modal-default" data-toggle="dropdown" href="#">
                        Nueva Acta 
                      </a>  
                        @include('tecnicos.section.modalActa')      
                                        
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">    
                      {{-- PANEL PRINCIPAL--}}
                      <!-- /.row -->
                        @include('tecnicos.section.principal')
                    </div>
                    <!-- /.tab-pane HISTORIAL-->
                    <div class="tab-pane" id="tab_2">
                      <br>
                      @include('tecnicos.section.tablaActas')                      
                    </div>

                    <div class="tab-pane" id="tab_3">
                      <br>
                      @include('tecnicos.section.bodega')                      
                    </div>
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- ./card -->
            </div>
            <!-- /.col -->
          </div>
       </div>
  
       @include('includes.pluggin')
        {{-- TABLA PROGRAMACIONES --}}
        @include('tecnicos.section.datatables')

    {{-- CAMBIAR DE ESTADO --}}
    <script>
       var ids;
       var fila;
          $(document).on("click","#btnCambiarEstado",function()
        {
          
              fila= $(this).closest("tr");
              let ids=parseInt(fila.find('td:eq(0)').text());
              let ruta1 = "{{ route('cambioEstado', 'req_id') }}" 
              var ruta = ruta1.replace('req_id',ids)
                $.ajax(
                  {
                      url: ruta, 
                      type: "GET",
                      processData: false,   
                      contentType: false,
                      
                        success: function(response)
                        {
                          toastr.info("El estado de la programacion ah sido editado")
                          tabla2.ajax.reload();
                        }        
                  }) 

          });
          
    </script>
    
      {{-- MENSAJE DE EXITO --}}
      @if (session('mensaje'))
      <script>
        toastr.success("{{session('mensaje')}}");
      </script> 
       @endif
      {{-- selectores de modal acta --}}
      <script>
                          
        $("#equipo_salida").select2({
          placeholder: "Equipos retirados",
        });

        $("#equipo_ingreso").select2({
          placeholder: "Equipos Instalados",
        });
      </script>
    
    {{-- BUSCADOR --}}

      @include('includes.buscador')
    {{-- END MENSAJE DE EXITO --}}
      </section>
    <!-- /.content -->
    {{-- COLLAPSAR TODO --}}
    <script>
      $(document).ready(function(){
        $('.collapseCronograma').CardWidget('collapse',true);
        $('.collapseNotif').CardWidget('collapse',true);
  
        $('.btnVerTabla').click(function(){
          $('#tablaProgramaciones').show();
        });
        // 
      });


    </script>
    <script>
    var idEquipo="";
       $('.btnPrestar').click(function() {
                        
          var datos = $(this).attr('datos');         
          // var info = JSON.parse(datos);
          $(".idEquipo").val(datos);
                        
                        

         });
      
      // PRESTAR EQUIPO
      function prestarEquipo(params) {
        var datosP = new FormData(document.getElementById("formPrestarEquipo")); 
        $.ajax(
            {
              url: "/Crm/tecnico/prestarEquipo", 
              type: "POST",
              data: datosP,
              processData: false,   //tell jQuery not to process the data
              contentType: false,    //tell jQuery not to set contentType
                //a continuacion refrescar la tabla despues de un evento
              success: function(response){
                toastr.success("Equipo Prestado")
                location.reload();
                }
          })       
      }
    </script>
</div>
@endsection
@extends('includes.dash')

@section('contenido')
{{-- <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>  --}}

<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header login-fondo">     
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-user-cog"></i> Administracion De Clientes</h1>
          </div>
          <div class="col-sm-6">
            
            <ol class="breadcrumb float-sm-right">
              {{-- <li  class="breadcrumb-item"><a href="#" class="btn btn-default">Pagina Principal</a></li> --}}
              {{-- <li class="breadcrumb-item"><a href="{{route('clientesCreate')}}" style="color: #3333cc" > <i class="fa fa-plus"></i> Nuevo </a></li> --}}
                           
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content ">
       <!-- ./row -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-body">
                {{-- <h4>Custom Content Below</h4> --}}
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Home</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Profile</a>
                  </li> --}}
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Agregar</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Mis Clientes</a>
                  </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                  {{-- SECTION HOME --}}
                    @include('clientes.section.home')
                  {{-- SECTION AGG CLIENTE --}}
                  <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                    @include('clientes.section.form')
                  </div>
                  {{-- SECTION TABLA CLIENTES --}}
                  <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
                    @include('clientes.section.datatable')
                  </div>
                </div>
                
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
       
        <!-- /.card -->
      </div>
      {{-- ALERTAS DE ERRORES --}}
       @include('includes.pluggin')   
       {{-- @include('includes.datatable.Scripts')   --}}
       <script>
         $(document).ready(function(){
          $('.cardActividadReciente').CardWidget('collapse',true);
         });
       </script>
        @error('ced')
        <script>
          toastr.error("!!Cedula Duplicada, Revisa que no hayas agregado este cliente!!");
        </script>
        @enderror 

        @error('correo')
        <script>
          toastr.error("!!El correo Ya esta registrado con otro cliente!!");
        </script>
        @enderror 

        {{-- END ALERTAS --}}
        {{-- SELECT2 --}}        
        <script>
                              
          $("#municipios").select2({
          placeholder: "Municipio",
          theme: "classic",
                      
          });
        </script> 
        {{-- DATATABLE --}}
        
        <script>                             
              $('#clientes').DataTable(
                {
                  "ajax": "{{route('clientesListar')}}",
                  "columns": [
                      {data: 'id'},
                      {data: 'ced'},
                      {data: 'nombre'},
                      {data: 'estado'},
                      {defaultContent: '<a class="btn btn-info btn-sm mx-1 btnEditar" id="btnEditar" href="#" title="Ver"><i class="fas fa-search"></i></a>'}  
                      
                  ],
                  responsive:true,
                  autoWidth: false,
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
         {{-- btnEditar --}}
         <script>
           let id;
           var fila;
           $(document).on("click","#btnEditar",function(){
            fila= $(this).closest("tr");            
            let id= parseInt(fila.find('td:eq(0)').text());
            // alert(id);
            let src = "/Crm/Clientes/ver/"+id;
            // alert(src);
            var btn = $('.btnEditar').attr("href",src); 
           });
         </script>
       
    </section>
    <!-- /.content -->
</div>

@endsection
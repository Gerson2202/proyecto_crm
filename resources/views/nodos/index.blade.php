@extends('includes.dash')
@section('contenido')
<link rel="stylesheet" href="{{asset('assets/vendor/sweetalert2/sweetalert2.min.css')}}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="nav-icon fas fa-broadcast-tower text-blue"></i> Administracion De Nodos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina Principal</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
              <div class="card card-primary card-outline">
                <div class="card-body">
                  {{-- <h4>Custom Content Below</h4> --}}
                  <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Home</a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Sedes</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Wimbox</a>
                    </li> 
                  </ul>
                  {{-- SECCION HOME --}}
                  <div class="tab-content" id="custom-content-below-tabContent">
                    {{-- NODOS --}}
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                      <br>
                      <div class="row">
                        {{-- TABLA DE NODOS y agregar ndo --}}
                        @include('nodos.section.indexTabla')
                         
                      </div>  
                    </div>                
                      
                    {{-- SEDES --}}

                    <div class="tab-pane fade show " id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                      <br>
                      <div class="form-row">
                        @include('nodos.section.sedes')
                      </div>
                    </div>
                    {{-- WIMBOX --}}
                    <div class="tab-pane fade show " id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
                      <br>
                      <div class="form-row">
                        @include('nodos.section.wimbox')
                      </div>
                    </div>
                  </div>
                <!-- /.card -->
              </div>
            </div>
          </div>         

    
    </section>
    <!-- /.content -->
  </div>
  @include('includes.pluggin')
  @include('nodos.section.scriptNodos')
  @include('nodos.section.scriptSedes')
  @include('nodos.section.scriptWimbox')
  
  <script>
                  
    $("#selectEquipos").select2({
    placeholder: "selecciona Equipos",              
    });
    $("#selectEquiposEdit").select2({
    placeholder: "selecciona Equipos",
                
    });  

  </script>
    {{-- MENSAJE DE EXITO --}}
    @if (session('mensaje'))
    <script>
      toastr.success("{{session('mensaje')}}");
    </script>                
    @endif

    {{-- END MENSAJE DE EXITO --}}
    @include('includes.buscador')
@endsection
@extends('includes.dash')
@section('contenido')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      {{-- @include('includes.scripts') --}}
      
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" >
            <h1><i class="fas fa-address-book"></i> Informacion del Cliente </h1>
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
        <div class="card">
            {{-- <div class="card-header">
              <h4 class="card-title" style="color: #666666">Informacion Detallada Del Cliente</h4>
            </div> --}}
            <div class="card-body card-blue card-outline">
              <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                  <div class="row">
                    {{-- CAJITAS 3 --}}
                    @include('clientes.sectionShow.cajitas')
                   
                  </div>
                  {{-- ROW ACTIVIDAD RECIENTE --}}
                  <div class="row">
                    <div class="col-12" style="color: #666666">
                      <h4>Actividad Reciente</h4>
                        <div class="post">
                          <div class="user-block">
                            {{-- <img class="img-circle img-bordered-sm" src="" alt="user image"> --}}
                            <span class="username">
                              {{-- <a href="#">Jonathan Burke Jr.</a> --}}
                            </span>
                            {{-- <span class="description">Shared publicly - 7:45 PM today</span> --}}
                          </div>
                          <!-- /.user-block -->
                          <p>
                           
                          </p>
    
                          <p>
                            {{-- <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a> --}}
                          </p>
                        </div>
    
                        <div class="post clearfix">
                          <div class="user-block">
                            {{-- <img class="img-circle img-bordered-sm" src="" alt="User Image"> --}}
                            <span class="username">
                              {{-- <a href="#">Sarah Ross</a> --}}
                            </span>
                            {{-- <span class="description">Sent you a message - 3 days ago</span> --}}
                          </div>
                          <!-- /.user-block -->
                          <p>
                           
                          </p>
                          <p>
                            {{-- <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a> --}}
                          </p>
                        </div>
    
                        <div class="post">
                          
                        </div>
                    </div>
                    <div>                      
                    </div>
                  </div>
                  {{-- ROW EQUIPOS CARGADOS y DOCUMENTOS --}}
                    @include('clientes.sectionShow.cardEquipo')
                    {{-- CARD PLANES EDICION --}}
                    <div class="row cardPlanes">
                      <div class="col-lg-12 col-12">
                        <div class="card cardPlanes">
                          <div class="card-header "><i class="fas fa-globe text-blue"></i><strong class="text-info" > Planes Actuales</strong>
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool " data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                            </div>
                          </div>
                          <div class="card-body">
                            <table class="table table-striped ">
                              <thead>
                                <tr>
                                  <th>plan</th>
                                  <th>Megas</th>
                                  <th>Opciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                  @foreach ($clientePlan as $item)
                                  <tr>
                                   <td>{{$item->plan->descripcion}}</td>
                                   <td>{{$item->plan->cant_megas}}</td>
                                   <form class="formEliminar" action="{{route('clienteQuitarPlan',$item->plan->id)}}" method="POST" id="formEliminar">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="idCliente" value="{{$cliente->id}}">
                                    <td> <button type="submit" class="btn-danger btn btn-sm"><i class="fas fa-trash-alt"></i></button></td>
                                   </form>
                                   
                                  
                                   {{-- <td><a href="#" idPlan="{{$item->plan->id}}"class="btnEliminar btn-danger btn btn-sm"><i class="fas fa-trash-alt"></i></a></td> --}}
                                  </tr>
                                   @endforeach
                                  
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                  {{--PANEL DATOS PERSONALES --}}
                <div class="col-12 bg-light col-md-12 col-lg-4 order-1 order-md-2">
                  <h3 class="" style="color: #666666"><i class="fas fa-paint-brush" ></i> {{$cliente->nombre}}</h3>
                 
                  <p class="text-muted">Nuestro clientes {{$cliente->nombre}} esta ubicado en el municipio de 
                    {{$cliente->municipio}} con direccion {{$cliente->calle}} y se encuentra registrada desde la fecha {{$cliente->fecha_inicio}} con fecha de finalizacion para el dia {{$cliente->fecha_final}}.  </p>            
                  
                  <h5  style="color: #666666"><b>Datos Personales</b></h5>
                  <ul class="list-unstyled">
                    <h3 id="idCliente" style="display: none">{{$cliente->id}}</h3>  {{--//ID DE CLIENTE --}}
                    <li class="text-secondary">
                        <i class="fas fa-user-tie"></i>Nombre: {{$cliente->nombre}}
                    </li>
                    <li class="text-secondary">
                        <i class="fas fa-id-badge"></i> Cedula: {{$cliente->ced}}
                    </li>
                    <li class="text-secondary">
                        <i class="fas fa-envelope"></i>Correo: {{$cliente->correo}}
                    </li>
                    <li class="text-secondary">
                        <i class="fas fa-phone-alt"></i> Telefono: {{$cliente->telefono}}
                    </li>
                    <li class="text-secondary">
                        <i class="fas fa-address-card"></i>Estrato: {{$cliente->estrato}}
                    </li>
                    <li class="text-secondary">
                        <i class="fab fa-servicestack"></i>Tipo de Servicio: {{$cliente->tipo_servicio}}
                    </li>
                    <li class="text-secondary">
                        <i class="fas fa-network-wired"></i>Tecnologia: {{$cliente->tecnologia}}
                    </li>
                    <li class="text-secondary">
                        <i class="fas fa-recycle"></i> Reuso: {{$cliente->reuso}}
                    </li>
                    <li class="text-secondary">
                        <i class="fas fa-dollar-sign"></i>  Valor Total: {{$cliente->canon}}
                    </li>
                    <li class="text-secondary">
                        <i class="fas fa-thumbs-up"></i>Estado Actual: {{$cliente->estado}}
                    </li>
                   
                  <div class="text-center mt-5 mb-3">
                    <a href="{{route('clientesEdit',$cliente->id)}}" class="btn btn-sm btn-warning">Editar Informacion</a>
                    <a href="#" id="btnPlanes" class="btn btn-sm btn-info">Editar Planes</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
    

    </section>
    <!-- /.content -->
  </div>

  {{-- SCRIPT PARA MOSTRAR DETALLE DE OPERATIVIDA --}}
  @include('includes.pluggin')
    {{-- <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>   --}}
    <script>
      $(document).ready(function(){
          $('.collapseEquipos').CardWidget('collapse',true);
          $('.callapseDocumentos').CardWidget('collapse',true);
      });
    </script>
  <script>
    $('#cardOperativa').hide();
    $('.verOperativa').click(function(e){
      e.preventDefault();
      $('#cardOperativa').show();
      var ip = $(this).attr('ip');
      var winbox = $(this).attr('winbox');
      var ssid = $(this).attr('ssid');
         
      $("#showIp").html(ip);
      $("#showWinbox").html(winbox);
      $("#showSsid").html(ssid);   
            
     
    });
  </script> 

    {{-- ALERTAS --}}
    @if (session('mensaje'))
    <script>
      toastr.success("{{session('mensaje')}}");
    </script>                
    @endif
  {{-- END ALERTAS --}}
   {{-- ALIMINAR PLAN --}}
   <script>
      $('.formEliminar').submit(function(e)
      {
      e.preventDefault();
        Swal.fire({ 
                title: 'Estas Seguro?',
                text: "Deseas Eliminar este Plan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!'
              }).then((result) => {
                if (result.isConfirmed) {
                  this.submit();
                }
              })   
      });
  </script>

  <script>
    $(document).ready(function(){
      $('.cardPlanes').hide();     
    });

    $('#btnPlanes').click(function(){
      $('.cardPlanes').show();  
    });   
  </script>
   {{-- BUSCADOR --}}
@include('includes.buscador')

@endsection
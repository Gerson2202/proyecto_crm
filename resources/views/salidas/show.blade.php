@extends('includes.dash')
@section('contenido')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-cloud-upload-alt"></i> Detalle de salida</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina Principal</a></li>
              {{-- <li class="breadcrumb-item"><a href="{{route('clientesCreate')}}">Nuevo</a></li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      {{-- SECCION EQUIPOS Y MATERIALES --}}
      <div class="row">
        <div class="col-lg-6 col-12">
          <div class="card equipos ">
            <div class="card-header">
              <h3 class="card-title text-info">Equipos Cargados </h3>         
    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            {{-- ACA PONGO EL ID DE USER DE LA SALIDA --}}
            <input type="hidden" id="idUser" value="{{$salida->user->id}}">
            {{-- ACA PONGO EL ID DE USER DE LA SALIDA --}}

            <div class="card-body">
                <div class="row">
                    @foreach ($equipoSalida as $equipoSalida)
                    <div class="col-lg-6 col-6">
                        <!-- small box -->
                        <div class="small-box">
                          <div class="inner">
                            <h3>#{{$equipoSalida->equipo->id}}</h3>
                           <strong>Equipo: </strong><span>{{$equipoSalida->equipo->nombre}}</span>
                           <br>
                           <strong>Fecha: </strong><span>{{$salida->fecha}}</span>
                           <br>
                           <strong>Destino: </strong><span>{{$salida->destino}}</span>
                           
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                          <a href="#" class="small-box-footer informacion bg-info"  Equipoid="{{$equipoSalida->equipo->id}}" nombre="{{$equipoSalida->equipo->nombre}}"
                            fecha="{{$salida->fecha}}" responsable=" {{$salida->user->name}}" destino=" " descripcion=" {{$salida->descripcion}}"
                            mac="{{$equipoSalida->equipo->mac}}"  serial="{{$equipoSalida->equipo->serial}}"
                            data-toggle="modal" data-target="#modal-lg">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
                          
                        </div>
                    </div>              
                                      
                    @endforeach
                    {{-- MODAL --}}
                    <div class="modal fade" id="modal-lg">
                      <div class="modal-dialog ">
                        <div class="modal-content bg-info">
                          <div class="modal-header">
                            <h4 class="modal-title  ">Informacion de Equipos</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div class="col-12">
                                <dl class="row">
                                  <dt class="col-sm-4"><i class="fas fa-file-signature"></i> Mac:</dt>
                                  <dd class="col-sm-8 mac " id="mac"></dd>
                                  <dt class="col-sm-4"><i class="fas fa-weight"></i> Serial:</dt>
                                  <dd class="col-sm-8 serial " id="serial"></dd>
                                  <dt class="col-sm-4 "><i class="fas fa-tachometer-alt"></i> Responsable:</dt>                
                                  <dd class="col-sm-8 responsable " id="responsable"></i></dd>
                                  <dt class="col-sm-4"><i class="fas fa-tachometer-alt"></i> Descripcion:</dt>                
                                  <dd class="col-sm-8 descripcion " id="descripcion"></i></dd>
                                </dl>
                                  {{-- <h4>
                                    <i class="fas fa-globe nombre"></i>
                                    <small class="float-right fecha"> </small>
                                  </h4>
                                  <hr>
                                  <strong>Mac:</strong>
                                  <span class="mac"></span>
                                  <hr>
                                  <strong>Serial:</strong>
                                  <span class="serial"></span>
                                  <hr>
                                  <strong>Persona Responsable:</strong>
                                  <span class="responsable"></span>
                                  <hr>
                                  <strong>Descripcion:</strong>
                                  <span class="descripcion"></span> --}}
                              </div>
                              
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div> 
                </div>
            </div>
          </div>
        </div>
        {{-- MATERIALES --}}
        <div class="col-lg-6 col-12">
          <div class="card materiales">
            <div class="card-header">
              <h3 class="card-title text-info">Cargar Materiales</h3>         
    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-12">
                  <form action="" id="formAgregarMaterial">
                    @csrf
                    <div class="form-row">
                      <div class="col-md-4 mb-4">
                        <label for="validationServer01">Material </label>
                        <select name="txtIdMaterial" class="custom-select" id="responsable"  required>
                          @foreach ($materiales as $material)
                          <option value="{{ $material->id }}">{{ $material->nombre }}</option>
                          @endforeach                     
                        </select>
                        <div class="valid-feedback"> </div>
                      </div>
                      <div class="col-md-4 mb-4">
                        <label for="validationServer01">Cantidad </label>
                        <input type="number" class="form-control" value="1" min="1" placeholder="m" id="inputCantidad" name="txtStock">
                        <input type="hidden" name="txtIdSalida" id="txtIdSalida" value="{{$salida->id}}">
                        <input type="hidden" name="txtIdUser" id="txtIdUser" value="{{$salida->user->id}}">
                        <div class="valid-feedback"> </div>
                      </div>
                      <div class="col-md-4 mb-4">
                        <a href="#" id="btnAgregarMaterial" onclick="agregarMaterial()" class="btn btn-info" style="position: absolute;top: 45%;">Cargar</a>
                      </div>
                    </div>
                  </form>
                  </div>
                  
                     
                </div>
                <hr>
                <table class="table table-sm" id="tablaMateriales">
                  <thead>
                    <tr>
                        
                        <th>Nombre</th>
                        <th>cantidad</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                      </tr>                                       
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Default box -->
      
      {{-- cars 3  soporte--}}
      <div class="card">
        <div class="card-header imgSalida">
          <h3 class="card-title text-info">Soporte </h3>
           <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
              <div class="col-2"></div>
              <div class="col-8">
                <img src="{{asset($salida->documento)}}" class="product-image" alt="Product Image">
                {{-- <img class="card-img-top" src="{{asset($item->img)}}" alt="Card image"> --}}

              </div>
              <div class="col-2">

              </div>
                
                
            </div>
        </div>
      </div>
      
      
     
      
     
    </section>
    

    @include('includes.pluggin')
    <script>
      // AL INICIAR LA PAGINA     

      $(document).ready(function(){
        $('.imgSalida').CardWidget('collapse',true);
        $('.equipos').CardWidget('collapse',true);
        $('.materiales').CardWidget('collapse',true);

      });
    </script>
    @include('salidas.section.showScrypt')
    <!-- /.content -->
  </div>
    
@endsection
@extends('includes.dash')
@section('contenido')
<link rel="stylesheet" href="{{asset('vendor\select2-4.0.13\dist\css\select2.min.css')}}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Informacion De Equipo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('equiposIndex')}}">Pagina Principal</a></li>
              <li class="breadcrumb-item "><a href="{{route('equipoCreate')}}">Nuevo</a></li>
            </ol>
          </div>          
        </div>
      </div><!-- /.container-fluid -->
     
    </section>
   
    <section class="content">
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <br>
                <img src="{{URL::asset('assets/img/router.jpg')}}" class="product-image" alt="Product Image">
                {{-- <img class="card-img-top" src="{{asset($item->img)}}" alt="Card image"> --}}

              </div>
            </div>
            <div class="col-12 col-sm-6">
              @if ($equipo->tipoequipo!=null)
              <h3 class="my-3">{{$equipo->tipoequipo->nombre}}</h3>
              @else
              <h3 class="my-3">sin tipo</h3>
              @endif
              
              <p></p>

              <hr>
              <h4>Caracteristicas</h4>
              <div class="bg-light py-2 px-3 mt-4">
                <h4 class="mt-0">
                  <small >Codigo: <small class="text-info">{{$equipo->codigo}}</small> </small>
                  <br>
                 
                  <small>Serial: <small class="text-info">{{$equipo->serial}}</small> </small>
                  <br>
                  <small >Mac: <small class="text-info">{{$equipo->mac}}</small></small>
                  <br>
                  <small >Estado: <small class="text-info">{{$equipo->estado}}</small> </small>
                  <br>
                  
                  <small>Destino:<small class="text-info">{{$equipo->destino}}</small> </small>
                  <br>
                  <small >Fecha: <small class="text-info">{{$equipo->fecha}}</small></small>
                  <br>
                  @if ($equipo->factura_id!=null)
                      <small >Proveedor:<small class="text-info">{{$equipo->factura->proveedor}}</small> </small>
                  @else
                      <small >Proveedor: Sin factura asociada</small>
                  @endif
                  
                  <br>
                  
                  <small >Observacion:<small class="text-info">{{$equipo->observacion}}</small> </small>
                  <br>
                  @if ($equipo->factura_id!=null)
                    <small >Num. Factura:<small class="text-info">{{$equipo->factura->codigo}}</small></small>
                  @else
                  <small >Num. Factura: Sin factura asociada</small>
                  @endif
                  

                </h4>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Detalles</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Asignar</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Modificar</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
                 <br>
                 {{-- DETALLE OPERATIVO --}}
                <div class="card">
                  @if ($equipo->cliente_id!=null)
                    <div class="card-body">                                
                      <h4>
                        <i class="fas fa-globe"></i> {{$equipo->ip}}.
                        <span> <strong>IP</strong></span>
                      </h4>
                      @if ($equipo->wimbox_id!=null)
                        <h6>Winbox 
                          <span class="mx-3"><strong> {{$equipo->wimbox->nombre}}</strong></span>                                   
                        </h6>
                        @else
                        <span class="mx-3"><strong> Wimbox eliminado</strong></span> 
                      @endif                     
                      <h6>SSID
                        <span class="mx-3"><strong> {{$equipo->ssid}}</strong></span>                                   
                      </h6>
                      <h6>Otro 
                        <span class="mx-3"><strong> {{$equipo->otro}}</strong></span>                                   
                      </h6>
                      <h6>Cliente:  
                      <span class="mx-3"><strong> <a href="{{route('clientesShow',$equipo->cliente_id)}}" class="btn">{{$equipo->cliente->nombre}}</a></strong></span>                                   
                      </h6>
                    </div>                      
                  @endif
                  @if ($equipo->nodo_id!=null)
                    <div class="card-body">                                
                      <h4>
                        <i class="fas fa-globe"></i> {{$equipo->ip}}.
                        <span> <strong>IP</strong></span>
                      </h4>
                      <h6>Winbox 
                        <span class="mx-3"><strong> {{$equipo->winbox}}</strong></span>                                   
                      </h6>
                      <h6>SSID
                        <span class="mx-3"><strong> {{$equipo->ssid}}</strong></span>                                   
                      </h6>
                      <h6>Otro 
                        <span class="mx-3"><strong> {{$equipo->otro}}</strong></span>                                   
                      </h6>
                      <h6>Nodo:  
                      <span class="mx-3"><strong> <a href="{{route('nodoIndex')}}" class="btn">{{$equipo->nodo->nombre}}</a></strong></span>                                   
                      </h6>
                    </div> 
                  @else
                      
                  @endif
                  
                </div>
              </div>
              {{-- FORMULARIO DE AsIGANAR --}}
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                 @include('equipos.section.asignarEquipo')
              </div>
             
              

              {{-- FORMULARIO DE MODIFICAR --}}
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                <form action="{{route('equipoUpdaate',$equipo->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Tipo</label>
                          <select name="tipoequipo_id" id="nombre" class="form-control" required>
                            @if ($equipo->tipoequipo!=null)
                            <option value="{{old('estado',$equipo->tipoequipo_id)}}">{{old('estado',$equipo->tipoequipo->nombre)}}</option>

                              @else
                              <option value=""></option>

                              @endif
                             @foreach ($tipos as $item)
                                 <option value="{{$item->id}}">{{$item->nombre}}</option>  
                             @endforeach
                                         
                          </select>
                          <div class="valid-feedback"> </div>
                      </div>
                      
                      <div class="col-md-6 mb-3">
                        <label for="validationServer01">Estado </label>
                        
                            <select name="estado" class="form-control">
                                <option value="{{old('estado',$equipo->estado)}}">{{old('estado',$equipo->estado)}}</option>
                                <option value="Nuevo">Nuevo</option>
                                <option value="Usado">Usado</option>
                                <option value="Revision">Revision</option>
                                <option value="De baja">De baja</option>
                            </select>
                        <div class="valid-feedback"> </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Mac</label>
                            <input type="text" class="form-control" value="{{old('mac',$equipo->mac)}}" name="mac" >
                            <div class="valid-feedback"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Codigo </label>
                            <input type="text" class="form-control" value="{{old('codigo',$equipo->codigo)}}" name="codigo" >
                            <div class="valid-feedback"> </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Serial </label>
                            <input type="text" class="form-control" value="{{old('serial',$equipo->serial)}}" name="serial" >
                            <div class="valid-feedback"> </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer02">Destino</label>
                            <select name="destino" class="form-control">
                                <option value="{{old('destino',$equipo->destino)}}">{{old('destino',$equipo->destino)}}</option>
                                <option value="Bodega">Bodega</option>
                                <option value="Cliente">Cliente</option>
                                <option value="Personal">Personal de soporte</option>
                                <option value="Nodo">Nodo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-12 mb-3">
                        <label for="exampleInputEmail1">Num. Factura</label>
                        
                         <select name="factura_id" class="custom-select form-control" style="width: 50%" id="facturas" requerid>
                         
                          @if ($equipo->factura_id!=null)
                          <option value="{{old('factura_id',$equipo->factura_id)}}"></option>
                            @foreach ($facturas as $fact)
                              <option value="{{ $fact->id }}">{{ $fact->codigo }}</option>
                            @endforeach  
                          
                          @else
                            <option value=""></option>
                            @foreach ($facturas as $fact)
                              <option value="{{ $fact->id }}">{{ $fact->codigo }}</option>
                            @endforeach  
                          @endif
                                            
                        </select> 

                      </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Observacion </label>
                            <textarea name="observacion" class="form-control" rows="3">{{old('observacion',$equipo->observacion)}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Modificar</button>
                    </div>
                    <script src="https:code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script src="{{asset('vendor\select2-4.0.13\dist\js\select2.min.js')}}"></script>   
                    <script>
        
                      $("#facturas").select2({
                        placeholder: "selecciona tu factura",
                        theme: "classic",
                        
                          
                      
                      });
                  </script> 
                </form>
              </div>
            </div>
          </div>
        </div>               
    </div>  
    </section>
    <!-- /.content -->
  </div>
 @include('includes.pluggin')
 {{-- @include('includes.Scripts') --}}
 {{-- MENSAJE DE EXITO --}}
     @if (session('mensaje'))
     <script>
       toastr.success("{{session('mensaje')}}");
     </script>                
      @endif
 <!-- Main content -->
  <script>

    $("#selectCliente").select2({                              
      theme: "classic",
                                                                 
    });

    $("#selectNodo").select2({                              
      theme: "classic",
                                                                 
    });

    $('#cardCliente').hide();
    $('#cardNodo').hide();

   $('#checkCliente').click(function(){
     $('#cardCliente').show();
     $('#cardNodo').hide();
     });

     $('#checkNodo').click(function(){
      $('#cardNodo').show();
      $('#cardCliente').hide();
    });
    
  </script> 
@endsection
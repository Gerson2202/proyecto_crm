@extends('includes.dash')
@section('contenido')
<link rel="stylesheet" href="{{asset('vendor\select2-4.0.13\dist\css\select2.min.css')}}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Añadir nuevo Equipo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('equiposIndex')}}">Pagina Principal</a></li>
              <li class="breadcrumb-item "><a href="{{route('equiposList')}}">Ir al Listado</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">  
        
          {{-- card1 --}}
          <div class="card">
            <div class="card-header text-info"><i class="fas fa fa-edit"></i> Datos Generales
            </div>
            <div class="card-body">
            <form action="{{route('equiposStore')}}" method="POST" enctype="multipart/form-data">              
                @csrf
               <div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Tipo</label>
                      <select name="selectNombre" id="selectNombre" class="form-control" required>
                         <option value=""></option>
                        <option value="antena" {{old('selectNombre')=='antena'? 'selected': ''}}>Antena</option>
                        <option value="router" {{old('selectNombre')=='router'? 'selected': ''}}>Router</option>
                        <option value="switch" {{old('selectNombre')=='switch'? 'selected': ''}}>Switch</option>                  
                      </select>
                      <div class="valid-feedback"> </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Fecha</label>
                    <input type="date" class="form-control" name="fecha" value="{{old('fecha')}}"  required>
                    <div class="valid-feedback"> </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                      <label>Estado</label>
                      <select name="estado" class="form-control" value="{{old('estado')}}" required>
                        <option value=""></option>
                        <option value="nuevo" {{old('estado')=='nuevo'? 'selected': ''}} >Nuevo</option>
                        <option value="usado" {{old('estado')=='usado'? 'selected': ''}}>Usado</option>
                        <option value="revision" {{old('estado')=='revision'? 'selected': ''}}>Revision</option>
                        <option value="de-baja" {{old('estado')=='de-baja'? 'selected': ''}}>De baja</option>
                      
                      </select>
                      <div class="valid-feedback"> </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Destino</label>
                      <select name="destino" class="form-control"required>
                         <option value="" ></option>
                        <option value="bodega" {{old('destino')=='bodega'? 'selected': ''}}>Bodega</option>
                        <option value="cliente" {{old('destino')=='cliente'? 'selected': ''}}>Cliente</option>
                        <option value="nodo" {{old('destino')=='nodo'? 'selected': ''}}>Nodo</option>
                        <option value="personal" {{old('destino')=='personal'? 'selected': ''}}>Personal</option>                              
                      </select>
                      <div class="valid-feedback"> </div>
                  </div>
                </div>
                {{-- <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="">Imagen</label>
                      <div class="input-group">
                      <div class="custom-file">
                        <input name="img" type="file" class="custom-file-input" id="" required> 
                        <label name="img" class="custom-file-label" for="">Cargar imagen</label>
                      </div>
                      <div class="valid-feedback"> </div>
                  </div>
                  </div>
                </div> --}}
               </div>
            </div>         
          </div>
           {{-- card2 --}}
           <div class="card">
            <div class="card-header text-info"><i class="fas fa fa-edit"></i>Datos Tecnicos
            </div>
            <div class="card-body">
              <div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Mac</label>
                    <input type="text" name="mac" class="form-control" value="{{old('mac')}}"  placeholder="Mac" required>
                    <div class="valid-feedback"> </div>                             
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Codigo</label>
                    <input type="text" name="codigo" id="codigo" class="form-control" value="{{old('codigo')}}" placeholder="Codigo" required>
                   </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Serial</label>
                    <input type="text" name="serial" id="serial" class="form-control" value="{{old('serial')}}" placeholder="Serial" >
                    <div class="valid-feedback"> </div>                           
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Num. Factura</label>
                    <select name="factura_id" class="form-control" id="facturas"  >
                      <option value=""></option>
                      @foreach ($facturas as $fact)
                      <option value="{{ $fact->id }}">{{ $fact->codigo }}</option>
                      @endforeach                     
                    </select>
                    
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">observacion</label>
                    <input type="text" name="observacion" class="form-control" value="{{old('observacion')}}"  placeholder="observacion">
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" style="background-color:#3333ca" class="btn btn-primary">Registrar Equipo</button>
            </div>
          </form> 
          </div>
      
     
    </section>
   
</div>

 @include('includes.pluggin')
  <script>
                
        $("#facturas").select2({
        placeholder: "selecciona tu factura",
        theme: "classic",
        
        });
        // DESAHBILITAR INPUTS
      $('#selectNombre').on('change', selectNombre); 
      function selectNombre() 
      {
         var nombre= $(this).val();       
                 
         if (nombre=="antena") {
           $('#serial').attr("disabled",true);
           $('#codigo').attr('value',"ATG--");
         } else{
          $('#serial').attr("disabled",false);
         }
         if (nombre=="router") {

           $('#codigo').attr('value',"RTT--");
         } 
         if (nombre=="switch") {
          $('#codigo').attr('value',"WSH--");
          } 
      };   
   </script> 
  @error('mac')
    <script>
      toastr.error("!!La Mac de este equipos Ya esta Registrada!!");
    </script>   
  @enderror
  
  @error('codigo')
    <script>
      toastr.error("!!El codigo de este equipo Ya esta Registrado!!");
    </script>    
  @enderror

  @error('serial')
  <script>
    toastr.error("!!El Serial de este equipo Ya esta Registrado!!");
  </script>   
  @enderror
    
@endsection
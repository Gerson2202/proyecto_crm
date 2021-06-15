@extends('includes.dash')
@section('contenido')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-globe"></i> Administracion De Planes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('homeIndex')}}">Pagina Principal</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->       
    </section>

       
    <!-- Main CONTENIDO -->
    <section class="content">    
         <!-- Default box  TABLA PLANES-->
      <div class="card">
        <div class="card-header card-blue card-outline" style="background: white">
          <h3 class="card-title"><i class="fas fa-table"></i>Lista de Planes</h3>

          <div class="card-tools">
              <a class="btn text-blue btn-sm" dusk="crearplan" data-toggle="modal" data-target="#modal-default" href="#">
                <i class="fa fa-plus"></i>
              </a> 
          </div>
        </div>         
        {{-- FIN DE MODAL --}}
        <div class="card-body">
          <form action="{{route('planesExcel')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="custom-file mx-1" style="width: 50%" >
                <input name="file" type="file" class="custom-file-input"  required>
                <label name="file" class="custom-file-label" for="">Importar desde Excel</label>
              </div>
            <button class="btn btn-sm btn-info"> Importar datos</button>
            </div>           
          
          </form>
          <hr>
          <TAble class="table table-striped table-bordered" id="planes">
            <thead>
                <tr>
                  <th>CODIGO</th>
                  <th>DESCRIPCION</th>
                  <th>#MEGAS</th>
                  <th>OPCIONES</th>
                </tr>        
            </thead>
            <tbody>             
              @foreach ($nuevo as $item)
              <tr>
                <th scope="row">{{$item->id_plan}}</th>
                <td>{{$item->descripcion}}</td>
                <td>{{$item->cant_megas}}</td>
                <td>
                  <a href="{{route('planesEdit',$item->id)}}" style="margin: 10px" ><i class="fas fa-pen-alt"></i></a>
                  <a href="#" style="margin: 10px" class="verPlanes" planFull="{{$item}}" 
                    data-toggle="modal" data-target="#modal-lg" ><i class="fas fa-search"></i></a>
                  </td>
              </tr>
             @endforeach
              
             
               {{-- modal --}}
              @include('planes.section.modales')
            </tbody>                  
         </TAble> 
        </div>
        {{-- datatblesScript --}}
        
        @include('includes.pluggin')
        <script> 
        
          $('.verPlanes').click(function(e){
            e.preventDefault();
            var plan= $(this).attr('planFull');
            planInfo= JSON.parse(plan);
            console.log(planInfo);
            $("#id_plan").html(planInfo.id);   
            $("#descripcion").html(planInfo.descripcion);
            $("#cantMegas").html(planInfo.cant_megas+" Megas");
            $("#velSubida").html(planInfo.vel_subida+" Megas");
            $("#velBajada").html(planInfo.vel_bajada+" Megas");  
            $("#fecha").html("Vigente desde el "+planInfo.fecha_inicio+" Con un  valor de $  "+planInfo.canon);
            $("#global").html("Global: "+planInfo.globaal);     
            
          });
          </script>     
          
          
        <!-- /.card-body -->      
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
    {{-- MENSAJE DE EXITO --}}
    
    @if (session('mensaje'))
    <script>
      toastr.success("{{session('mensaje')}}");
    </script>                
  @endif
{{-- MENSAJE DE ERROR --}}
      @error('id_plan')
        <script>
          toastr.error("El id del plan ya existe , intenta con otro");
        </script>  
     @enderror
    {{-- BUSCADOR --}}
    @include('includes.buscador')
    {{-- MENSAJE DE ERROR DE AXCCEL --}}
    @if (isset($errors)&& $errors->any())
           <div class="div alert-danger">
             @foreach ($errors->all() as $item)
             <script>
               toastr.error("Error! revisar que el codigo no este duplicado.");
             </script>  
             @endforeach
           </div>
          @endif

@endsection
@extends('includes.dash')
@section('contenido')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             
            <h1 > <i class="fas fa-fw fa-unlock-alt"></i>Administracion De Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina Principal</a></li>
              <li class="breadcrumb-item "><a href="{{route('RolesIndex')}}">Roles</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      {{-- DETALLE DE ROL --}}
      <div class="card card1 bg-info">
        <div class="card-header">
          <h3 class="card-title">Detalle de rol</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
              <a href="#" class="btn btn-tool" id="btnEditcard" data-toggle="tooltip" title="Editar">
                <i class="fas fa-edit"></i></a>
                {{-- PARA NO PODER ELIMINAR EL ROL SUPERADMIIN --}}
                @if ($rol->id<2) 
                     
                 @else
                 <a href="{{route('roleDestroy',$rol->id)}}" class="btn btn-tool" id="btnEditcard" data-toggle="tooltip" title="Eliminar">
                  <i class="fas fa-trash-alt"></i></a>    
                 @endif
                            
          </div>
        </div>
        <div class="card-body">

                <div class="row">
                    <div class="col-6">
                        <p>Nombre</p>
                        <small>{{$rol->name}}</small>
                    </div>
                    <div class="col-6">
                        <p>Descripcion</p>
                        <small>{{$rol->description}}</small>
                    </div>

                </div>
                        
        </div>
      </div>
      {{-- PERMISOS DEL ROL --}}
      <div class="card card2 bg-info" id="cardPermisosRol">
        <div class="card-header" >
          <h3 class="card-title">Permisos de rol</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>                         
          </div>
        </div>
        <div class="card-body">   
            <table class="table table -striped" id="tablaRol">
                <thead>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                </thead>
                <tbody>
                    @foreach ($rol->permissions as $permission)
                    <tr>
                        <td>{{$permission->name}}</td>
                        <td>{{$permission->description}}</td>
                    </tr>
                    @endforeach
                  

                </tbody>
            </table>        
        </div>
      </div>
       {{-- UDUARIOS CON EL ROL --}}
       <div class="card card3 bg-info" id="cardUsuariosRol">
        <div class="card-header">
          <h3 class="card-title">Usuario con este rol</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>                         
          </div>
        </div>
        <div class="card-body">   
                   <table class="table table -striped" id="tablaRol">
                <thead>
                    <th>Nombre</th>
                    <th>Correo</th>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        
                    </tr>
                    @endforeach 
                  

                </tbody>
            </table>   
        </div>
      </div>
      {{-- PANLES DE EDICION --}}
      <div class="card card4" id="cardEditRol">
        <div class="card-header" style="background: white"><strong>Edicion de rol</strong> 
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>             
              </div>
        </div>
        <div class="card-body">
            <div>
              {!!Form::open(['route'=>['roleUpdate',$rol->id], 'method'=>'POST'])!!}
               
              <div class="ml-2 row">
                <div class=" col-12 col-sm-6 ">
                    {!!Field::text('name',old('name', optional($rol)->name),['value'=>'{{$rol->name}}'])!!} 
    
                </div>

                <div class=" col-12 col-sm-6 ">
                     {!!Field::text('description',old('name', optional($rol)->description),['placeholder'=>'Nombres'])!!} 
    
                </div>
                <h6>Editar Permisos</h6>                
                <div class="row">
                    @foreach ($permisos as $item)
                    <div class="ml-3  col-12">
                    {!! Field::checkbox("txtPermiso_id[{{$item->id}}]",
                    $item->id, 
                    $rol->hasPermissionTo($item->id),
                    ['label'=>$item->name])!!}
                    </div>                    
                    @endforeach
                  </div>
                  <br>
                    <div class="form-group col-md-12 float-ringht">
                        <button class="btn btn-success btn-sm btn-block">Editar</button>
                      {{-- <a href="#" id="btnAgregar" class="btn btn-success btn-sm btn-block">Agregar</a>  --}}
                    </div>
              {!! Form::close() !!}

                {{-- <form action="{{route('roleUpdate',$rol->id)}}" method="POST" id="formEditRole">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            
                          <label for="exampleInputEmail1" class="form-label">Nombre</label>
                          <input type="text" name="txtNombre" id="txtNombre" value="{{$rol->name}}" class="form-control" id="" placeholder="Nombre de Rol" required>
                          <div class="valid-feedback"> </div>                                   
                        </div>
                        <div class="form-group col-md-8 ">
                          <label for="">Descripcion</label>
                          <input type="text" name="txtDescripcion"  value="{{$rol->description}}" id="txtDescripcion" class="form-control" id="" placeholder="Descripcion" required>
                          <div class="valid-feedback"> </div>
                        </div>                                         
                   </div>
                    <h6>Permisos</h6>
                    <hr>
                    <div class="form-group ">
                          @foreach ($permisos as $item)
                          <div class="form-check">                        
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="txtPermiso_id[]" id="txtPermiso_id" value="{{$item->id}}" >
                              {{$item->description}}
                             </label>
                          </div>
                          @endforeach                          
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                          <button class="btn btn-success btn-sm btn-block">Editar</button>
                        <a href="#" id="btnAgregar" class="btn btn-success btn-sm btn-block">Agregar</a> 
                      </div>
                  </div>
                </form> --}}
            </div>
        </div>
     </div>
      <!-- /.card -->

     
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

  
  @include('includes.pluggin')
  <script>
    $(document).ready(function(){
      $('.card1').CardWidget('collapse',true);
      $('.card2').CardWidget('collapse',true);
      $('.card3').CardWidget('collapse',true);
    });
      let tablaRol=$('#tablaEditRol');
      $('#cardEditRol').hide();
      $('#cardEditPermisos').hide();

      $('#btnEditcard').click(function(){
        $('#cardEditRol').show();
        $('#cardPermisosRol').hide();
        $('#cardEditPermisos').show();
      });   
      
  </script>
  {{-- MENSAJE DE EXITO --}}
  @if (session('mensaje'))
        <script>
            toastr.success("{{session('mensaje')}}");
           </script>                
    @endif

{{-- END MENSAJE DE EXITO --}}
 
    
@endsection
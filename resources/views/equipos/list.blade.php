@extends('includes.dash')

@section('contenido')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-satellite-dish"></i> Administracion De Equipos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('equiposIndex')}}">Pagina Principal</a></li>
              <li class="breadcrumb-item "><a href="{{route('equipoCreate')}}">Nuevo Equipo</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header card-blue card-outline" style="background: white" >
          <h3 class="card-title text-"><i class="fas fa-table"></i> Lista de Equipos</h3>
        </div>
        <div class="card-body">  
              
           {{-- FORMULARIO EXECEL --}}
          <form action="{{route('equiposexecel')}}" method="POST" enctype="multipart/form-data">
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
          <TAble class="table table-striped table-bordered" id="equipos">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Serial</th>
                    <th>Mac</th>
                    <th>Observacion</th>                
        
                </tr>
        
            </thead>
            <tbody >
                   @foreach ($nuvoEquipo as $item)
          
                    <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td><a href="{{route('equipoShow',$item->id)}}" class="btn btn-default"> @if ($item->tipoequipo!=null)
                      {{$item->tipoequipo->nombre}}
                    @else
                    Sin Tipo
                    @endif</a>
                      </td>
                      <td>{{$item->codigo}}</td>
                      <td>{{$item->serial}}</td>
                      <td>{{$item->mac}}</td>
                      <td>{{$item->observacion}}</td>
                      
                    </tr>
                        
                     @endforeach 
            </tbody>
  
                    
           
         </TAble>   
        </div>     
      @include('includes.pluggin')

        <script> 
          
          $('#equipos').DataTable({
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


           @if (isset($errors)&& $errors->any())
           <div class="div alert-danger">
             @foreach ($errors->all() as $item)
             <script>
               toastr.error("Error! revisar que no haya informacion duplicada");
             </script>  
             @endforeach
           </div>
         @endif
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
    
@endsection
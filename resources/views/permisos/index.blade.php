@extends('includes.dash')
@section('contenido')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-key"></i> Administracion De Permisos </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina Principal</a></li>
              {{-- <li class="breadcrumb-item btn-outline-success"><a href="{{route('clientesCreate')}}">Nuevo</a></li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-info">
        <div class="card-header">
          <h3  class="card-title"><i class="fas fa-table"></i> Listado de permisos</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
              
        </div>
        <div class="card-body">

         
                <div class="container">
                    <table class="table table -striped">
                        <thead>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                        </thead>
                        <tbody>
                            @foreach ($permisos as $item)
                            <tr>
                                <td><a href="{{route('permisosShow',$item->id)}}" class="btn btn-sm " style="background: rgb(201, 219, 219)">{{$item->name}}</a> </td>
                                <td class="text-info">{{$item->description}}</td>
                            </tr>
                            @endforeach
                          

                        </tbody>
                    </table>
                </div> 
              </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script>
    $(document).ready(function(){
      $('.table').CardWidget('collapse',true);

    });
  </script>
@endsection
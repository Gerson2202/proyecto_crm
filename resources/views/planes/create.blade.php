@extends('includes.dash')
@section('contenido')
 <link rel="stylesheet" href="{{asset('assets/vendor/sweetalert2/sweetalert2.min.css')}}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administracion De Planes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('homeIndex')}}">Pagina Principal</a></li>
              <li class="breadcrumb-item "><a href="{{route('planesIndex')}}">Ir atras</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>    
    <!-- Main content -->
    <section class="content">            
              <div class="row">
                {{-- PANELDE DERECHO --}}
                <div class="col-md-3">
                  <div class="card card-blue card-outline">
                    <div class="card-header" >
                      <h3 class="card-title text-info"><strong> Informacion Del Plan</strong></h3>
                      {{-- <div class="card-tools">
                        <button type="button"  class="btn btn-tool"  title="Eliminar">
                          <i class="fas fa-trash-alt text-danger"></i></button>         
                      </div> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <strong><i class="far fa-file-alt mr-1"></i>{{$plan->descripcion}}</strong>
        
                        <p class="text-muted">
                        Este plan esta vigente desde la fecha :{{$plan->fecha_inicio}}
                        </p>
        
                        <hr>
        
                      <strong>Codigo Identificativo:  </strong>
        
                        <p class="text-muted">{{$plan->id_plan}}</p>
        
                        <hr>
                        
        
        
                        <strong><i class="far fa-file-alt mr-1"></i> Caracteristicas</strong>
                        <hr>
                        <p class="text-muted">Megas totales: {{$plan->cant_megas}}</p>
                        <p class="text-muted">Velocidad de subida: {{$plan->vel_subida}}</p>
                        <p class="text-muted">Velocidad de bajada: {{$plan->vel_bajada}}</p>
                        <p class="text-muted">Valor $ : {{$plan->canon}}</p>
                        <p class="text-muted">GLOBAL: {{$plan->globaal}}</p>
                        <p>
                          <form action="{{route('planDelet',$plan->id)}}" id="formEliminar" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit" title="Eliminar Plan"><i class="fas fa-trash-alt"></i></button>
                          </form>
                        </p>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->

                {{-- PANEL IZQUIERDO --}}
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-header p-2" >
                      <ul class="nav nav-pills " >
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="#settingss" data-toggle="tab">setting</a></li> --}}
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Modificar</a></li>
                      
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                          <!-- Post -->
                          <div class="post">
                            
      
                          
      
                            
                          </div>
                          <!-- /.post -->
      
                          <!-- Post -->
                          
                        </div>
                        <!-- /.tab-pane PANEL 1-->
                        <div class="tab-pane" id="timeline">
                          {{-- body del panel --}}
                        </div>
                        
                        <!-- /.tab-pane EDICION  DE PLAN-->      
                        <div class="tab-pane" id="settings">
                        
                          <form class="form-horizontal" action="{{route('planUpdate',$plan->id)}}" method="POST">
                          @csrf
                        
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Codigo</label>
                              <div class="col-sm-10">
                                <input type="text" name="id_plan" class="form-control" id="exampleInputEmail1" value="{{old('id_plan',$plan->id_plan)}}">
                                
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail" class="col-sm-2 col-form-label">descripcion</label>
                              <div class="col-sm-10">
                                <input type="text" name="descripcion" class="form-control" id="exampleInputEmail1" value="{{old('descripcion',$plan->descripcion)}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label"># de megas</label>
                              <div class="col-sm-10">
                                <input type="text" name="cant_megas" class="form-control" id="exampleInputEmail1" value="{{old('cant_megas',$plan->cant_megas)}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputSkills" class="col-sm-2 col-form-label">V. Bajada</label>
                              <div class="col-sm-10">
                                <input type="text" name="vel_bajada" class="form-control" id="exampleInputEmail1" value="{{old('vel_bajada',$plan->vel_bajada)}}">                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputSkills" class="col-sm-2 col-form-label">V. Subida</label>
                              <div class="col-sm-10">
                                <input type="text" name="vel_subida" class="form-control" id="exampleInputEmail1" value="{{old('vel_subida',$plan->vel_subida)}}">                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail" class="col-sm-2 col-form-label">Canon $</label>
                              <div class="col-sm-10">
                                <input type="text" name="canon" class="form-control" id="exampleInputEmail1" value="{{old('cant_megas',$plan->canon)}}">                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">Global</label>
                              <div class="col-sm-10">
                                <input type="text" name="globaal" class="form-control" id="exampleInputEmail1" value="{{old('globaal',$plan->globaal)}}">                              </div>
                            </div>

                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn text-light" style="background-color:#3333cc">Modificar</button>
                             
                              </div>
                              
                            </div>
                          </form>
                        </div>
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->                        
    </section>
    <!-- /.content -->
  </div>
  {{-- <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
   {{-- MENSAJE DE EXITO --}}
   @include('includes.pluggin')
   @if (session('mensaje'))
     <script>
       toastr.success("{{session('mensaje')}}");
     </script>                
    @endif

 {{-- END MENSAJE DE EXITO --}}
  <script>

        $('#formEliminar').submit(function(e)
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
@endsection
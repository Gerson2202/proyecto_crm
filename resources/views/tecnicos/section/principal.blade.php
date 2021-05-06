<div class="row">                       
    <!-- /.col -->              
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header" style="background: white">
          <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
           Resumen de Actividades
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">                            
       
          <div class="row">
              <div class="col-lg-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>      
                    <div class="info-box-content">
                      <span class="info-box-text">Tickets</span>
                      <span class="info-box-number">@if ($cantidaTickets->cantidad<2)
                        <p>{{$cantidaTickets->cantidad}} Activo</p>
                        @else
                        <p>{{$cantidaTickets->cantidad}} Activos</p>   
                        @endif</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
              </div>
              <div class="col-lg-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-clock"></i></span>      
                    <div class="info-box-content">
                      <span class="info-box-text">Programaciones</span>
                      <span class="info-box-number"> @if ($cantidaProgramacion<2)
                        <p>{{$cantidaProgramacion}} Activo</p>
                        @else
                        <p>{{$cantidaProgramacion}} Activos</p>   
                        @endif</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
              </div>
          </div>
        </div>
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
     
    </div>
    
  </div>
  <div class="row">
      <!-- /.col -->     
    <div class="col-lg-6 col-12">
       <!-- /.card CRONOGRAMA-->
       <div class="card collapseCronograma">
         <div class="card-header">
           <h3 class="card-title"><i class="fas fa-clock"></i> Actividades</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>            
          </div>
         </div>
        <div class="card-body">
            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
              <!-- The timeline -->
              <div class="timeline timeline-inverse">
                <!-- timeline time label -->
                <div class="time-label">
                  <span class="bg-danger">
                    Cronograma de programaciones
                  </span>
                </div>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                @foreach ($programacion as $item)
                <div> 
                  <i class="fas fa-clock bg-primary"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i>{{$item->hora_inicial}}</span>

                    <h3 class="timeline-header"><a href="#">{{$item->titulo}}</a> hora de inicio:</h3>

                    <div class="timeline-body">
                      Direccion: {{$item->direccion}}
                      <hr>
                      Cliente:  {{$item->cliente->nombre}}
                    
                    </div>
                  </div>
                </div> 
                @endforeach
                             
                <!-- END timeline item -->
                <div>
                  <i class="far fa-clock bg-gray"></i>
                </div>
              </div>
            </div>
            <!-- /.tab-pane -->
        </div>
    </div>
    </div>
    <div class="col-md-6">
      <div class="card card-default card-responsive p-0 collapseCronograma">
        <div class="card-header" style="background: white">
          <h3 class="card-title">
            <i class="fas fa-exclamation-triangle"></i>
            Notificaciones
          </h3>
          <div class="card-tools">
            <button type="button"  class="btn btn-tool btnVerTabla"  title="Ver Programaciones">
              <i class="fas fa-calendar"></i></button>     
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>          
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @foreach ($ticket as $item)
            @if ($item->support_id!=null)
              <div class="alert alert-info  alert-dismissible" >
                <button type="button" class="close btn-sm" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-circle"></i> Alerta!</h5>
              Nuevo ticket asignado <a href="{{route('ticketShow',$item->id)}}" class="text-dark">click para ver detalles</a>
              </div>
            @else
                  
            @endif                                
          @endforeach         

          @foreach ($programacion as $item)
            {{-- @if ($item->user_id!=null) --}}
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-circle"></i> Alerta!</h5>
                Se te ah asiganado la Programacion # {{$item->id}} 
              </div>
            {{-- @else
                  
            @endif                                 --}}
          @endforeach 

          
          
        </div>
        <!-- /.card-body -->
      </div>     
    </div>
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-12">
      <div class="card" id="tablaProgramaciones" style="display: none">
        <div class="card-header card-blue card-outline" style="background: white">
          <h3 class="card-title">Programaciones asignadas</h3>          
        </div>
        <br>
        <!-- /.card-header -->
        <div class="container">
          <div class="card-body table-responsive p-0" >
            <table class="table table-head-fixed text-nowrap table-striped table-bordered" id="programaciones">
              <thead>
                <tr>
                  <th>ID</th>                                      
                  <th>Asunto</th>
                  <th>Fecha</th>
                  <th>Hora inicial</th>
                  <th>Hora final</th>                                      
                  <th>Direccion</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th>Cliente</th> 
                  <th>Descripcion</th>                                     
                </tr>
              </thead>
              <tbody>
               
                
              </tbody>
            </table>
          </div>
        </div>
      
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    
  </div>

 
<div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
    <br>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-school"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Clientes potenciales</span>
              <span class="info-box-number">
                10
                <small>%</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inactivos</span>
              <span class="info-box-number"># {{$clientInac}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-double"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Activos</span>
              <span class="info-box-number"># {{$clientAct}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Nuevos Miembros</span>
              <span class="info-box-number">{{$clientesnewcant}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    <div class="row">
      {{-- <div class="col-6">
        <div class="card card-gray card-outline" >
          <div class="card-header">
            <h5 class="card-title">Ultimos Clientes</h5>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-link">#3</a>
              <a href="#" class="btn btn-tool">
                <i class="fas fa-pen"></i>
              </a>
            </div>
          </div>
          <div class="card-body">                          
               
          </div>
        </div>
        <div class="card card-gray card-outline " >
          <div class="card-header">
            <h5 class="card-title">Movimientos</h5>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-link">#2</a>
              <a href="#" class="btn btn-tool">
                <i class="fas fa-pen"></i>
              </a>
            </div>
          </div>
          <div class="card-body">
            
               
          </div>
        </div>
      </div> --}}
      <div class="col-12">
        <div class="card card-blue card-outline cardActividadReciente" >
          <div class="card-header">
            <h5 class="card-title"><i class="fas fa-bell"></i> Actividad Reciente</h5>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus text-dark"></i></button>
            </div>
          </div>
          <div class="card-body">                             
            @foreach ($clientesnew as $item)
                <p>El cliente <a href="{{route('clientesShow',$item->id)}}">{{$item->nombre}}</a> ah sido Agregado recientemente</p>
                <hr>
            @endforeach  
          </div>
        </div>
      </div>                     
      
    </div>

  </div>
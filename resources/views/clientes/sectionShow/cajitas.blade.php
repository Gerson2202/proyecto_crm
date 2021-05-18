 {{-- CAJITA1 --}}
 {{-- <div>
  <div class="col-12 col-sm-4" >
    <div class="info-box bg-light" >
      <div class="info-box-content " >
        <span class="info-box-text text-center text-muted" style="color: #666666">Planes Actuales</span>
          @foreach($clientePlan as $clientePlan)
                <a href="{{route('planesEdit',$clientePlan->plan->id)}}"><span class="info-box-number text-center text-muted mb-0">{{$clientePlan->plan->descripcion}}</span></a>    
          @endforeach                          
       </div>
    </div>
  </div> --}}
  {{-- CAJITA2 --}}
  {{-- <div class="col-12 col-sm-4">
    <div class="info-box bg-light">
      <div class="info-box-content">
        <span class="info-box-text text-center text-muted">Contratos</span>
        @foreach($clienteContrato as $clienteContrato)
        
        <a href="{{route('ContratosIndex')}}"><span class="info-box-number text-center text-muted mb-0">{{$clienteContrato->cod_contrato}}</span></a>
        @endforeach
     </div>
    </div>
  </div> --}}
  {{-- CAJITA3 --}}
  {{-- <div class="col-12 col-sm-4">
    <div class="info-box bg-light ">
      <div class="info-box-content">
        <span class="info-box-text  text-center text-muted">Estado de Cuenta </span>
        <span class="info-box-number text-center text-muted mb-0">20</span>
      </div>
    </div>
  </div>
 </div> --}}


  <div class="col-md-6 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-info"><i class="fas fa-globe"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Planes Actuales</span>        
        @foreach($clientePlan as $clientePlan)
        <a href="{{route('planesEdit',$clientePlan->plan->id)}}"><span class="info-box-number text-dark mb-0">{{$clientePlan->plan->id_plan}}</span></a>    
        @endforeach  
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-6 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-success"><i class="fas fa-file-signature"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Contratos</span>
        @foreach($clienteContrato as $clienteContrato)        
        <a href="{{route('ContratosIndex')}}"><span class="info-box-number text-dark">{{$clienteContrato->cod_contrato}}</span></a>
        @endforeach
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  {{-- <div class="col-md-4 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-warning"><i class="fas fa-coins"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Estado de cuenta</span>
        <span class="info-box-number">13,648</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div> --}}
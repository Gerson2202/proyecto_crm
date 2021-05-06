<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$totalPlanes}}</h3>

          <p>Planes Actuales</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('planesIndex')}}" class="small-box-footer">Mas Informacion<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col USUARIOS-->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$totalUsers}}<sup style="font-size: 20px"></sup></h3>
          <p>Usuarios Activos</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>              
        <a href="#" class="small-box-footer">Mas Informacion<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col CLIENTES-->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$totalClientes}}</h3>

          <p>Clientes Totales</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{route('clientesIndex')}}" class="small-box-footer">Mas Informacion<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$totaEquipos}}</h3>

          <p>Equipos Registrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{route('equiposIndex')}}" class="small-box-footer">Mas Informacion<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
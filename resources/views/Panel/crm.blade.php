@extends('includes.dash')

@section('contenido')

{{-- styles --}}
{{-- Link de fullcalendar --}}
 




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bienvenido</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
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
        <div class="row">
          <div class="col-lg-7 col-12 " >
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="estadistica" height="300" style="height: 300px;"></canvas>                         
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="estadistica" height="300" style="height: 300px;"></canvas>                         
                  </div>  
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
  
          </div>
          <div class="col-lg-5 col-12">
            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Donde nos encontramos?
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button"
                          class="btn btn-primary btn-sm daterange"
                          data-toggle="tooltip"
                          title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button"
                          class="btn btn-primary btn-sm"
                          data-card-widget="collapse"
                          data-toggle="tooltip"
                          title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="vmap" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>

        </div>
  
        </div>
      </div>
      
     
      
    </section>
    <!-- /.content -->
  </div>
{{-- scrippt --}}
    <!-- jQuery -->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor\jquery-ui-1.12.1\jquery-ui.min.js')}}"></script> 
    {{-- <script src="{{asset('jsmios/home/pluggin.js')}}"></script> --}}
    <!-- ChartJS  ESTADISTICAS-->
    <script src="https://cdnjs.com/libraries/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    {{-- JQMAP --}}
    <script src="{{asset('assets\vendor\jqvmap\jquery.vmap.js')}}"></script>
    <script src="{{asset('assets\vendor\jqvmap\maps\jquery-jvectormap-co-merc.js')}}"></script>


  {{-- ESTADISTICAS --}}
  <script>     
    var ctx = document.getElementById('estadistica').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'April', 'May', 'Junio', 'Julio','Agosto,',
            'Septiembre', 'Octubre', 'noviembre', 'Diciembre',
          ],
            datasets: [{
                label: 'Clientes-tiempo',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                 minBarLength: 2,
                 maxBarThickness: 8,
                 barPercentage: 0.5,
                 barThickness: 6,
                data: [14, 15, 12, 16, 17, 15, 16,14,12, 14,15]
            }]
        },

        // Configuration options go here
        options: {}
    });
  </script>
  
  {{-- MAPAS --}}
  <script>
   
      // $('#vmap').vectorMap({
      //   map: 'colombia_en',
      //   onRegionClick: function (element, code, region) {
      //     var message = 'You clicked "'
      //       + region
      //       + '" which has the code: '
      //       + code.toUpperCase();

      //     alert(message);
      //   }
      // });

       $('#vmap').vectorMap({map: 'co_merc'});
            
  </script>

  {{-- BUSCADOR --}}
  @include('includes.buscador')
@endsection
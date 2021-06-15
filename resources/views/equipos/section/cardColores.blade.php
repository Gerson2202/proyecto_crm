<div class="row">
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-blue">
        <div class="inner">
           <h3>{{$totalEquipos}}<sup style="font-size: 20px">#</sup></h3> 
          <p>Equipos Totales</p>
        </div>
        <div class="icon">
          <i class="ion ion-earth"></i>
        </div>
        <a href="{{route('equiposList')}}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>                
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$cantidadBodega->cantidad}}<sup style="font-size: 20px">#</sup></h3>
           <p>En bodega</p>
        </div>
        <div class="icon">
          <i class="ion ion-home"></i>
        </div>
        <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-bodega">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>               
      </div>               
      {{-- modal --}}              
      <div class="modal fade" id="modal-bodega">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Equipos En bodega</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <TAble class="table table-striped" id="equipos">
                      <thead >
                          <tr>
                              <th>Nombre</th>
                              <th>Codigo</th>
                              <th>Mac</th>
                            </tr>
                  
                      </thead>
                      <tbody >
                            @foreach ($equiposBodega as $item)
                            
                              <tr>
                                @if ($item->tipoequipo_id!=null)
                                <th scope="row">{{$item->tipoequipo->nombre}}</th>                                                                 
                                @else
                                    
                                <th scope="row">Sin tipo </th>
                                @endif
                                <td>
                                  <a href="{{route('equipoShow',$item->id)}}" class="btn btn-default btn-sm" style="color: #20207d">{{$item->codigo}}</a>
                                </td>
                                <td>{{$item->mac}}</td>
                                
                              </tr>
                                  
                              @endforeach
                            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                            <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
                            <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
                            <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
                            <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
      
      
                            
      
                            <script> 
                              
                              $('#equipos').DataTable({
                              responsive:true,
                              autoWidth: false,
                              
                                      "language": {
                                          "lengthMenu": "Mostrar _MENU_ Registros",
                                          "zeroRecords": "No se encontraron coincidencias",
                                          "info":"Pagina _PAGE_ de _PAGES_",
                                          "infoEmpty": "No hay equipos en bodega",
                                          "infoFiltered": "(filtrado de  _MAX_ registros totales)"
                                      }
                              
                              
                              });
                              </script>
                      </tbody>
            
                              
                     
                    </TAble> 
                  </div>
                  <div class="modal-footer justify-content-between">
                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
      </div>
        {{-- fin modal --}}

    </div>
    <!-- ./col -->
    {{-- <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>44</h3>
          <p>Informe de Inventario</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" data-toggle="modal" data-target="#modal-informe" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div> --}}

    <div class="col-lg-4 col-12">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
           <h3><sup style="font-size: 20px">{{$cantidadnodos}}</sup></h3> 
          <p>Nodos</p>
        </div>
        <div class="icon">
          <i class="ion ion-earth"></i>
        </div>
        <a href="{{route('nodoIndex')}}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>                
      </div>
    </div>
  </div>


  <div class="modal fade" id="modal-informe">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Informacion</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-sm">
            <thead>
              <tr>
                  <th>Total equipos</th>
                  <th>En bodega</th>
                  <th>en nodos</th>
                  <th>Routers</th>
                  <th>Switch</th>
                  <th>Antenas</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  <th scope="row"></th>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>                                       
            </tbody>
          </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
              <i class="fas fa-edit">Acta Numero :</i>
              <span class="" id="txtIdActa">                        
                {{$acta->id}}</span>                                           
            </div>
            <div class="card-body">
              {{-- <h4>Panel</h4> --}}
              <div class="row">
                <div class="col-5 col-sm-3">
                  <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link  active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Detalles</a>
                    <a class="nav-link  " id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Materiales</a>
                    <a class="nav-link " id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Equipos</a>
                  </div>
                </div>
                <div class="col-lg-7 col-12">
                  <div class="tab-content" id="vert-tabs-tabContent">
                    <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title"><strong class="text-info">Detalle de Acta</strong></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                              <div class="table-responsive">
                                <table class="table table-sm">
                                  <thead>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th>Registrado por:</th>
                                      <td class="text-info">{{$acta->user->name}}</td>
                                      <td>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th>Direccion:</th>
                                      <td class="text-info">{{$acta->direccion}}</td>
                                      <td>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th>Cliente:</th>
                                      <td class="text-info">{{$acta->cliente}}</td>
                                      <td>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th>Actividad:</th>
                                      <td class="text-info">{{$acta->actividad}}</td>
                                      <td>
                                      </td>
                                    </tr>
                                    <tr>
                                      <th>Municipio:</th>
                                      <td class="text-info">{{$acta->municipio}}</td>
                                      <td>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                      </div>

                      <input type="hidden" id="txtidActa" value="{{$acta->id}}">
                      
                    <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">                              
                                <form action="" id="formAgregarMaterialActa">
                                  @csrf
                                  <div class="form-row">
                                    <div class="col-md-4 mb-4">
                                      <label for="validationServer01">Material </label>
                                      <select name="txtIdMaterial" class="custom-select" id="responsable"  required>
                                        @foreach ($materiales as $material)
                                        <option value="{{ $material->id }}">{{ $material->nombre }}</option>
                                        @endforeach                     
                                      </select>
                                      <div class="valid-feedback"> </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                      <label for="validationServer01">Cantidad </label>
                                      <input type="number" class="form-control" value="1" min="1" placeholder="m" id="inputCantidad" name="txtStock">
                                      <input type="hidden" name="txtIdActa" id="txtIdActa" value="{{$acta->id}}">
                                      <input type="hidden" name="txtIdUser" id="txtIdUser" value="{{auth()->user()->id}}">
                                      <div class="valid-feedback"> </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                      <a href="#" id="btnAgregarMaterial" onclick="agregarMaterial()" class="btn btn-info" style="position: absolute;top: 45%;">Cargar</a>
                                    </div>
                                  </div>
                                </form>
                                <hr>
                                <table class="table table-sm" id="tablaMateriales">
                                  <thead>
                                    <tr>
                                        
                                        <th>Nombre</th>
                                        <th>cantidad</th>
                                        <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                      </tr>                                       
                                  </tbody>
                                </table>
                              
                             </div>
                        </div>                                                                                  
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                      
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                              <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                              <div id="accordion">
                                <div class="card bg-info retirados">
                                  <div class="card-header"> 
                                    <h4 class="card-title text-center">
                                      <a class="d-block text-light"data-toggle="collapse" href="#collapseOne">
                                       Ingresados
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                      @foreach ($actaEquipos as $actaEquipo)
                                         @if ($actaEquipo->ingreso_id!=null)
                                            <a href="{{route('equipoShow',$actaEquipo->ingreso->id)}}" class="btn btn-default btn-sm"><p>-{{$actaEquipo->ingreso->nombre}}</p> </a>
                                                 
                                          @else
                                            
                                          @endif
                                      @endforeach
                                          
                                      </div>
                                  </div>
                                </div>
                                <div class="card bg-info ingresados">
                                  <div class="card-header">
                                    <h4 class="card-title" >
                                      <a class="d-block text-light" data-toggle="collapse" href="#collapseThree">
                                        Retirados
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="collapseThree" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                      
                                        @foreach ($actaEquipos as $actaEquipo)
                                        @if ($actaEquipo->salida_id!=null)
                                           <a href="{{route('equipoShow',$actaEquipo->salida->id)}}" class="btn btn-default btn-sm"><p>-{{$actaEquipo->salida->nombre}}</p> </a>
                                                
                                         @else
                                           
                                         @endif
                                       @endforeach                                             
                                  
                                  </div>
                                </div>
                               
                                
                              </div>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                    </div>                 
                    
                                                 
                                
                      
                    </div>
                  </div>
                </div>
                
              </div>
              
              
            </div>
            <!-- /.card -->
          </div>
          
          <!-- /.card -->
        </div>
    </div>
  </div>



{{-- ROW COMPRAS Y MOVIMIENTOS --}}
<div class="row">
    <div class="col-lg-6">
      <div class="card card-blue card-outline " >
      <div class="card-header">
        <h5 class="card-title">Registro de compras</h5>
        
        <div class="card-tools">
          <a href="#" class="btn btn-tool btn-link">#1</a>
        </div>
      </div>
      <div class="card-body">
        <p class="card-text">Aca podras registrar tus facturas .</p>
        <!-- /.d-flex -->
        <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
          <p class="text-warning text-xl">
            <i class="ion ion-ios-cart-outline"></i>
          {{-- </p> --}}
          <p class="d-flex flex-column text-right">
            <span class="font-weight-bold">
              <i class="ion ion-android-arrow-down text-success"></i> 0.8%
            </span>
            <span class="text-muted">SALES RATE</span>
          </p>
        </div>
        <!-- /.d-flex --> 
        <a class="btn btn-default text-blue btn-sm " data-toggle="modal" data-target="#modalFactura" href="#">
          <i class="fa fa-plus"></i> Agregar Factura
        </a>
        <a href="{{route('listFacturas')}}" class="btn btn-default btn-sm mx-2 text-blue" >
          <i class="fa fa-search"></i>Ver Facturas </a>

        {{-- //modal AGRGAR FACTURA --}}
        <div class="modal fade modalAggFactura" id="modalFactura">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background-color:#3333cc">
                <h4 class="modal-title text-light">Agregar Factura</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">
               <form  id="formFactura" method="POST" enctype="multipart/form-data" >
                  @csrf
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="validationServer01">Codigo </label>
                      <input type="text" id="txtCodigo" name="codigo" class="form-control " id="validationServer01"  required>
                      <div class="valid-feedback"> </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="validationServer01">Proveedor</label>
                      <input type="text" id="txtProveedor" name="proveedor" class="form-control " id="validationServer01"  required>
                      <div class="valid-feedback"></div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label for="validationServer01">Fecha </label>
                      <input type="date" id="txtFecha" name="fecha" class="form-control " id="validationServer01"  required>
                      <div class="valid-feedback"> </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="validationServer01">Descripcion</label>
                      <input type="text" id="txtDescripcion" name="descripcion" class="form-control " id="validationServer01"  required>
                      <div class="valid-feedback"></div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="validationServer03">Documento</label>
                      <div class="custom-file">
                        <input name="documento" id="txtDocumento" type="file" class="custom-file-input" required>
                        <label name="documento" class="custom-file-label" for="">Cargar Evidencia</label>
                      </div>
                       
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    {{-- <button class="btn btn-default text-ligth" id="btnAgregar" type="submit" style="background: #3333cc3">Agregar</button> --}}
                    <a class="btn btn-default text-ligth" id="btnAgregarFactura" type="submit" style="background: #3333cc3" href="#">Agregar</a>
                    

                    
                  </div> 
                </form>
              </div>    
          </div>
       </div>
       
      </div>

     </div>
    </div>
    <div class="col-lg-6">
      <div class="card card-blue card-outline " >
        <div class="card-header">
          <h5 class="card-title">Movimientos</h5>
          <div class="card-tools">
            <a href="#" class="btn btn-tool btn-link">#2</a>
          </div>
        </div>
        <div class="card-body">
              <p class="card-text">Aca pordras registrar las salidas de equipos..</p>

              <!-- /.d-flex -->
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
              <p class="text-warning text-xl">
                <i class="ion ion-ios-refresh-empty"></i>
              </p>
              <p class="d-flex flex-column text-right">
                <span class="font-weight-bold">
                  <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                </span>
                <span class="text-muted">SALES RATE</span>
              </p>
            </div>
            <!-- /.d-flex -->
            <button type="button" class="btn btn-default text-blue btn-sm" data-toggle="modal" data-target="#modal-lg">
            <i class="fa fa-plus"></i> Registrar movimientos</button>
            <a href="{{route('salidaList')}}" class="btn btn-default btn-sm text-info mx-2">
              <i class="fa fa-search"></i> Ver salidas</a>
            {{-- modal AGRAGAR SALIDA O MOVIMIENTOS--}}
            <div class="modal fade" id="modal-lg">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header" style="background-color:#3333cc"  >
                    <h4 class="modal-title text-light">Detalles de salida</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <style>
                      .ui-widget.ui-widget-content
                      {
                        border: 1px solid #c5c5c5;
                        z-index: 2000 !important;
                      }
                    </style>
                    <form  method="POST" action="{{route('storeSalida')}}" enctype="multipart/form-data" id="formMovimiento">
                      @csrf
                      <div class="form-row">
                        <div class="col-md-4 mb-3">
                          <label for="validationServer01">Responsable </label>
                          <select name="responsable" class="custom-select " id="responsable"  required>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach                     
                          </select>
                          <div class="valid-feedback"> </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationServer01">Fecha</label>
                          <input type="date" id="fecha" name="fecha" class="form-control " id="validationServer0d"  required>
                          <div class="valid-feedback"></div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="validationServer0s">Destino</label>
                          <input type="text" id="destino" name="destino" class="form-control" placeholder="calle #- direcion" id="validationServer01"  required>
                          <div class="valid-feedback"></div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-12 mb-3">
                          <label for="validationServer02">Equipos a Cargar</label>
                          <select name="equipo_id[]" multiple="multiple" class="custom-select "  id="equiposearch" style="width: 100%"  required>
                            @foreach ($equipos as $user)
                            <option  value="{{ $user->id }}">{{ $user->mac }}</option>
                            @endforeach                     
                        </select> 
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationServer01">Descripcion</label>
                          <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripcion ..."  required></textarea>
                          <div class="valid-feedback"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Soporte</label>
                        <div class="input-group">
                        <div class="custom-file">
                        <input name="documento" type="file" class="custom-file-input" id="documento" required>
                        <label name="documento" class="custom-file-label" for="" >Cargar imagen</label>
                      </div>
                    
                      </div>
                      </div>
                      <div class="modal-footer">
                        
                        {{-- <a href="#" id="btAgregarMovimiento" class="btn text-light"  style="background: #3333cc">Agregar</a> --}}
                        <button class="btn text-light" type="submit" style="background: #3333cc">Agregar</button>
                        
                      </div> 
                  </form>
                  </div>                 
                  
                </div>
                <!-- /.modal-content -->
              </div>
            </div>
        </div>
      </div>
   </div>
</div>

<div class="row">
    <div class="col-12">
      <div class="card card-blue card-outline" >
        <div class="card-header">
          <h5 class="card-title">Equipos</h5>
          <div class="card-tools"><a href="#" class="btn btn-tool btn-link">#3</a></a>
          </div>
        </div>
        <div class="card-body">                  
            <a class="btn btn-app" href="{{route('equiposList')}}">
              <span class="badge bg-success">300</span>
              <i class="fas fa-barcode"></i> <span class="text-blue">Ver Equipos</span> 
            </a>
            <a class="btn btn-app" href="{{route('equipoCreate')}}"  title="agragr">
              <span class="badge bg-purple">891</span>
              <i class="fas fa-users"></i> <span class="text-blue">Agregar Equipos</span> 
            </a>
            <a class="btn btn-app" href="#" data-toggle="modal" data-target="#modal-default" title="materiales">
              {{-- <span class="badge bg-purple">891</span> --}}
              <i class="fas fa-tools"></i> <span class="text-blue">Materiales</span> 
            </a>
        </div>
      </div>
    </div>
</div>

{{-- MODAL MATERIALES --}}
<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Materiales</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6">
             <div class="card">
              <div class="card-header">Lista de materiales</div>
              <div class="card-body">
                <table class="table table-striped table-bordered" id="tablaMateriales"> 
                   <thead >
                     <tr>
                         <th >Nombre</th>
                         <th>stock</th>
                         <th></th>
                         <th  ></th>
                       </tr>
             
                   </thead>
                   <tbody >
                     
                   </tbody>
                </table>
              </div>
             </div> 
             
          </div>
          <div class="col-6">
            <div class="card">
              <div class="card-header">Agregar material</div>
              <div class="card-body">
                
                   <form  method="POST" action=""  id="formMaterial">
                    @csrf
                    <div class="form-row">                   
                      <div class="col-md-7 mb-3">
                        <label for="validationServer01">Nombre</label>
                        <input type="text"  name="nombre" class="form-control" id="inputName" placeholder="nombre de material"  required>
                        <div class="valid-feedback"></div>
                      </div>
                      <div class="col-md-5 mb-3">
                        <label for="validationServer01">Stock</label>
                        <input type="number" min="1"  name="stock" placeholder="cantidad" id="inputStock" class="form-control"  required>
                        <div class="valid-feedback"></div>
                      </div>
                    </div>
                    <hr>
                    <a href="#" class="btn btn-info btn-sm" id="btnAgregarMaterial" style="float: right">Guardar</a> 
                  </form>
               
              </div>
            </div>
            {{-- OCULTO --}}
            <div class="card" id="cardSumarMateriales">
              <div class="card-header">Sumar material</div>
              <div class="card-body">
                
                   <form  method="POST" action=""  id="formSumarMaterial">
                    @csrf
                    <div class="form-row">
                      <div class="col-md-5 mb-3">
                        <label for="validationServer01">Stock</label>                        
                        <input type="number" min="1" name="stock" id="stockSumar" placeholder="cantidad" class="form-control "  required>
                        <input type="hidden" name="idMaterial" id="idMaterial">
                        <div class="valid-feedback"></div>
                      </div>
                    </div>
                    <hr>
                    <a href="#" class="btn btn-info btn-sm" id="btnSumarMaterial" style="float: right">Guardar</a> 
                  </form>
               
              </div>
            </div> 
            {{-- EDITAR MATERIAL --}}
            <div class="card" id="cardEditarMateriales">
              <div class="card-header">Editar material</div>
              <div class="card-body">
                
                   <form  method="POST" id="formEditarMaterial">
                    @csrf
                    <div class="form-row">                   
                      <div class="col-md-7 mb-3">
                        <label for="validationServer01">Nombre</label>
                        <input type="text"  name="inputnameEdit" id="inputnameEdit" class="form-control"  required>
                        <div class="valid-feedback"></div>
                      </div>
                      <div class="col-md-5 mb-3">
                        <label for="validationServer01">Stock</label>
                        <input type="number" min="1" id="inputStokEdit"  name="inputStokEdit" placeholder="cantidad" class="form-control"  required>
                        <input type="hidden" name="idMaterialEditar" id="idMaterialEditar">
                        <div class="valid-feedback"></div>
                      </div>
                    </div>
                    <hr>
                    <a href="#" class="btn btn-info btn-sm" id="btneditarMaterial" style="float: right">Editar</a> 
                  </form>
               
              </div>
            </div> 
            
          </div>
        </div>
        
        

      </div>     
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div> 


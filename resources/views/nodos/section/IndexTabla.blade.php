 {{-- TABLA DE NODOS --}}
 <div class="col-lg-6 col-12">
    <div class="card card-info">
      <div class="card-header"><strong>Nodos</strong>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-default"  title="Nuevo"><i class="fas fa-plus"></i></button>                                           
         </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-sm table-striped table-bordered">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Ver</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($nodo as $item)
                <tr>
                  <th scope="row">{{$item->id}}</th>
                  <td>{{$item->nombre}}</td>
                  <td><a href="#" id="btnVer" datos="{{$item}}" equipos="{{$item->equipo}}" class="text-blue btnVer"><i class="fas fa-edit"></i></a> </td>
                </tr>     
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
     {{-- modal --}}
      <style>
        .ui-widget.ui-widget-content
        {
          border: 1px solid #c5c5c5;
          z-index: 2000 !important;
        }
      </style>
      {{-- modal agragar nodo --}}
    <div class="modal fade" id="modal-default">
      <form action="{{route('nodoStore')}}" method="POST" id="formNodo">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Nuevo Nodo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">                                                
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="exampleInputEmail1" class="form-label">Nombre</label>
                      <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Nombre de nodo" required>
                      <div class="valid-feedback"> </div>                                   
                    </div>
                    <div class="form-group col-md-8 ">
                      <label for="">Ubicacion</label>
                      <input type="text" name="txtUbicacion" id="txtUbicacion" class="form-control" id="" placeholder="Direccion" required>
                      <div class="valid-feedback"> </div>
                    </div>
                </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="exampleInputEmail1" class="form-label">Coordenadas</label>
                      <input type="text" name="txtCoordenadas" id="txtCoordenadas"  class="form-control" id="" placeholder="Digita Coordenadas" required>
                      <div class="valid-feedback"> </div>                                   
                    </div>
                    <div class="form-group col-md-6 ">
                      <label for="">Descripcion</label>
                      <input type="text" name="txtDescripcion" id="txtDescripcion" class="form-control" id="" placeholder="añade una Descripcion" required>
                      <div class="valid-feedback"> </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1" class="form-label">Equipos</label>
                      <select name="selectEquipos[]" id="selectEquipos" multiple="multiple" class="custom-select"  style="width: 100%" >
                        @foreach ($equipos as $item)
                            <option value="{{$item->id}}">{{$item->mac}}</option>
                        @endforeach
                        
                      </select>
                      <div class="valid-feedback"> </div>                                   
                    </div>
                  </div> 
                                                                  
              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit"  class="btn btn-primary">Guardar</button>
              </div>                                                    
            </div>
            </div>
      </form>
    </div>
  {{-- fin del modal --}}
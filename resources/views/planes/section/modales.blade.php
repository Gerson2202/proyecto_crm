{{-- MODAL CREAR PLAN --}}
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn text-light" style="background-color:#3333cc">
          <h4 class="modal-title ">Datos del Plan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       
        <div class="modal-body">
          
          <form action="{{route('planesStore')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="">Codigo de Plan</label>
                <input type="text" minlength="3" name="id_plan" class="form-control"  value="{{old('id_plan')}}" placeholder="####" required>
                <div class="valid-feedback"></div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="">Descripcion</label>
                <input type="text" name="descripcion" minlength="5" class="form-control" value="{{old('descripcion')}}"  placeholder="Titulo O descripcion" required>
                <div class="valid-feedback"></div>
              </div>
          
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="">Cantidad de Megas</label>
                <input type="number" min="1" max="100" name="cant_megas" class="form-control" value="{{old('cant_megas')}}" placeholder="# megas" required>                
                <div class="valid-feedback"></div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="">Velocidad de subida</label>
                <input type="number" min="1" max="100" name="vel_subida" value="{{old('vel_subida')}}" class="form-control"  placeholder="#" required>
                <div class="valid-feedback"></div>
              </div>
          
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="">Velocidad de bajada</label>
                <input type="number" min="1" max="100" name="vel_bajada" value="{{old('vel_bajada')}}" class="form-control"  placeholder="#" required>
                <div class="valid-feedback"></div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="">Fecha de inicio</label>
                <input type="date" name="fecha_inicio" class="form-control"  value="{{old('fecha_inicio')}}" required>
                <div class="valid-feedback"></div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="">Canon</label>
                <input type="number" min="1" name="canon" class="form-control" value="{{old('canon')}}" required>
                <div class="valid-feedback"></div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="">Global</label>
                <select name="global" class="form-control" value="{{old('global')}}" required >
                    <option value="si">si</option>
                    <option value="no">no</option>
                </select>
                
                <div class="valid-feedback"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn text-light" type="submit"  style="background-color:#3333cc">Agregar</button>
            </div> 
         </form>
        </div>
      </div>
    </div>
 </div>

{{-- MODAL DETALLE DE PLAN --}}
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header  bg-light">
          <h4 id="titulo" class="modal-title"  value=""><i class="fas fa-angle-right"></i> Detalle de Plan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row ">
            <div class="col-8">
              <dl class="row">
                <dt class="col-sm-4"><i class="fas fa-file-signature"></i> Descripcion: </dt>                
                <dd class="col-sm-8" id="descripcion"></dd>
                <dt class="col-sm-4"><i class="fas fa-weight"></i> Megas:</dt>
                <dd class="col-sm-8" id="cantMegas"></dd>
                <dt class="col-sm-4"><i class="fas fa-tachometer-alt"></i> Subida:</dt>                
                <dd class="col-sm-8" id="velSubida"></i></dd>
                <dt class="col-sm-4"><i class="fas fa-tachometer-alt"></i> Bajada:</dt>                
                <dd class="col-sm-8" id="velBajada"></i></dd>
              </dl>
          </div>
          <div class="col-4 bg-light">
              
                <h6 class="titulo"></h6>
                <p id="fecha" class="text-info"></p>
                <P id="global" class="text-info"></P>
              </div>

            
          </div>
          
          
          
            
            
          </div>
         {{-- global
         canon  fecha_inicio velBajada,vel_subida cantMegas descripcion id_plan id_plan --}}
        </div>
        <div class="modal-footer justify-content-between">
          {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <a class="btn btn-primary" href="{{route('equipoShow',$equipoSalida->equipo->id)}}">ver equipo</a> --}}
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div> 
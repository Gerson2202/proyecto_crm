   {{-- modal --}}
   <div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header btn-info" style="background-color:#3333cc">
          <h4 class="modal-title">Detalles </h4>
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
          <form action="{{route('storeActaSalida')}}" method="POST" >
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationServer01">Fecha</label>
                    <input type="date" name="fecha" class="form-control "   required>
                    <div class="valid-feedback"></div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationServer01">Direccion</label>
                    <input type="text" name="direccion" class="form-control " placeholder="calle #- direcion"   required>
                    <div class="valid-feedback"></div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationServer0s">Cliente</label>
                    <input type="text" name="cliente" class="form-control"    required>
                    <div class="valid-feedback"></div>
                </div>
              
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Actividad a Realizar</label>
                    <select name="actividad" class="form-control"  required>
                      <option value="Intalacion">Intalacion</option>
                      <option value="Soporte">Soporte</option>
                      <option value="Prestamo">Prestamo</option>
                      <option value="venta">venta</option>
                    
                    </select>
                    <div class="valid-feedback"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationServer0s">Municipio</label>
                  <input type="text" name="municipio" class="form-control"  id="validationServer01"  required>
                  <div class="valid-feedback"></div>
              </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationServer02">Ingreso de Equipos</label>
                    <select name="equipo_ingreso[]" multiple="multiple" class="custom-select " style="width: 100%" id="equipo_ingreso"  >
                      @foreach ($equiposEnPosecion as $equip)
                      <option  value="{{ $equip->id }}">{{ $equip->mac }}</option>
                      @endforeach                     
                  </select> 
                    <div class="valid-feedback"></div>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="validationServer02">Salida de Equipos</label>
                  <select name="equipo_salida[]" multiple="multiple" class="custom-select" style="width: 100%"  id="equipo_salida"  >
                    @foreach ($equipos as $equip)
                    <option  value="{{ $equip->id }}">{{ $equip->mac }}</option>
                    @endforeach                     
                </select>
                    <div class="valid-feedback"></div>
                </div>
            </div>
           
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationServer01">Observaciones</label>
                    <textarea class="form-control" name="observaciones" rows="3" placeholder="Enter ..."  required></textarea>
                    <div class="valid-feedback"></div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
        
              <button class="btn btn-info" type="submit" style="background-color:#3333cc">Guardar</button>
              
            </div> 
          </form>         
        </div>
    </div>
  </div>
{{-- fin modal --}} 
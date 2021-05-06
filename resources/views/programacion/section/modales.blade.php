   {{-- modal para agendar--}}


   <div class="modal fade" id="modal-default" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Agendar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  id="formulario_programacion">
               @csrf
               <div class="row">   
                 <div class="col-12">
                   <small>
                     <div class="form-check">                        
                       <label class="form-check-label">
                       <input type="checkbox" class="form-check-input" name="checkCola" id="checkCola"><strong class="text-blue">Cola de programaciones</strong>                
                       </label>
                    </div>
                   </small>                  
                </div>                            
                
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <br>
                  <label for="validationServer01">Cliente</label>
                  <select name="cliente_id" class="form-control cliente_id" id="cliente_id" style="width: 100%" >
                    <option  value=""></option>
                    @foreach ($clientes as $user)
                    <option  value="{{ $user->id }}">{{ $user->nombre }}</option>
                    @endforeach                     
                </select> 
                  <div class="valid-feedback"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationServer01">Titulo</label>
                  <input type="text" name="titulo" class="form-control" id="titulo"  >
                  <div class="valid-feedback"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationServer01">Direccion</label>
                  <input type="text" name="direccion" class="form-control" id="direccion" placeholder="####" >
                  <div class="valid-feedback"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4 mb-2">
                  <label for="validationServer01">fecha</label>
                  <input type="date" name="fecha"  class="form-control" id="fecha">
                  <div class="valid-feedback"></div>
                </div>
                <div class="col-md-4 mb-2">
                  <label for="validationServer01">hora Inicial</label>
                  <input type="time" name="hora_inicial" class="form-control" id="hora_inicial" >
                  <div class="valid-feedback"></div>
                </div>
                <div class="col-md-4 mb-2">
                  <label for="validationServer01">Duracion (minutos)</label>
                  <input type="number" name="tiempo" class="form-control" id="tiempo" placeholder="####">
                  <div class="valid-feedback"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="validationServer01">Personal Encargado</label>                  
                  <select name="user_id[]" multiple="multiple" class="form-control user_id" id="user_id" style="width: 100%"  required>
                    {{-- <option  value=""></option> --}}
                    @foreach ($usuario as $user)
                    <option  value="{{$user->id }}">{{ $user->name}}</option>
                    @endforeach                     
                  </select> 
                  <div class="valid-feedback"></div>
                </div>              
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="validationServer01">Descripcion</label>
                  <input type="text" name="descripcion" class="form-control" id="descripcion"  >
                  <div class="valid-feedback"></div>
                </div>
              </div>
               <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="tareas">Tareas</label>
                  <textarea class="form-control" name="tareas" id="tareas" cols="15" rows="3"></textarea>
                </div>
              </div>
             
            </form>
            <div class="modal-footer">
              <button onclick="guardar()" id="guardarEvento" class="btn text-light" style="background-color:#3333CC">Agregar</button>
              
            </div>
            
        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
 
  <!-- /.modal2 modificar -->
  <div class="modal fade" id="modal-3" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modificar Programacion</h4>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
        </div>
        <div class="modal-body">
          <form  id="programacionEdit">
               @csrf
               <div class="row">   
                <div class="col-12">
                  <small>
                    <div class="form-check">                        
                      <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="checkEditar" id="checkEditar"><strong class="text-blue">Editar</strong>                
                      </label>
                   </div>
                  </small>                  
               </div>
              </div>
               <div class="form-row">
                <div class="col-md-12 mb-3">
                  <br>
                  <label for="validationServer01">Cliente</label>
                  <select name="txtCliente_id" class="form-control" id="txtCliente_id" style="width: 100%" >
                    <option  value=""></option>
                    @foreach ($clientes as $user)
                    <option  value="{{ $user->id }}">{{ $user->nombre }}</option>
                    @endforeach                     
                </select> 
                  <div class="valid-feedback"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationServer01">Titulo</label>
                  <input type="text" name="txtTitulo" class="form-control" id="txtTitulo"  >
                  <div class="valid-feedback"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationServer01">Direccion</label>
                  <input type="text" name="txtDireccion" class="form-control" id="txtDireccion" placeholder="####" >
                  <div class="valid-feedback"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4 mb-2">
                  <label for="validationServer01">fecha</label>
                  <input type="date" name="txtFecha"  class="form-control" id="txtFecha">
                  <div class="valid-feedback"></div>
                </div>
                <div class="col-md-4 mb-2">
                  <label for="validationServer01">hora Inicial</label>
                  <input type="time" name="txtHora_inicial" class="form-control" id="txtHora_inicial" >
                  <div class="valid-feedback"></div>
                </div>
                <div class="col-md-4 mb-2">
                  <label for="validationServer01">Hora_final</label>
                  <input type="time" name="txtHora_final" class="form-control" id="txtHora_final" placeholder="####">
                  <div class="valid-feedback"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="validationServer01">Personal Encargado</label>
                  <select name="txtUser_id[]" multiple="multiple" class="form-control txtUser_id" id="txtUser_id" style="width: 100%"  required>
                    @foreach ($usuario as $user)
                    <option  value="{{$user->id }}">{{ $user->name }}</option>
                    @endforeach                     
                  </select> 
                  <div class="valid-feedback"></div>
                </div>
              
              </div>
              <div class="form-row">
                <div class="col-md-8 mb-3">
                  <label for="validationServer01">Descripcion</label>
                  <input type="text" name="txtDescripcion" class="form-control" id="txtDescripcion"  >
                  <div class="valid-feedback"></div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationServer01">Estado</label>
                  <select name="txtEstado" class="form-control" id="txtEstado"  >
                    <option  value="1">Abierto</option>
                    <option  value="2">Cerrado</option>                                             
                </select> 
                  <div class="valid-feedback"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                   <input type="hidden" name="txtId" class="form-control" id="txtId"  >
                  </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="tareas">Tareas</label>
                  <textarea class="form-control" name="txtTareas" id="txtTareas" cols="15" rows="3"></textarea>
                </div>
              </div>
            </form>
            <div class="modal-footer">
              {{-- <button onclick="guardar()" class="btn text-light" style="background-color:#3333CC">Guardar</button>  --}}
              <button onclick="modificar()" id="btnModificar" class="btn text-light" style="background-color:#33cca6">Modificar</button>
              <button  id="btnEliminar" class="btn text-light" style="background-color:#cc3333">Eliminar</button>
              <button  id="btnCancelar"  class="btn text-light btnCancelar" style="background-color:#c2cc33" class="close" data-dismiss="modal" aria-label="Close" >Cancelar</button>
            </div>
            
        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  {{-- modal de show --}}
             
  <div class="modal fade" id="modal-default2">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 >
            <i class="nav-icon far fa-calendar-alt ShowTitulo"></i>             
           
          </h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h6>Inicio del evento:
              <i class="far fa-clock"></i>
              <small class="horaInicio">inicio</small>
              <small class="float-right fecha"></small>
            </h6>
            <h6>Finalizacion: 
              <i class="far fa-clock"></i>
              <small class="horaFinal">inicio</small>
            </h6>
            <hr>
            <h6>Cliente: 
              <small class="Mcliente"></small>
            </h6>
            <hr>
            <h6>Direccion: 
              <small class="Mdireccion"></small>
            </h6>
            <hr>
            <h6>Descripcion: 
              <small class="Mdescripcion"></small>
            </h6>
            <hr>
            <h6>Personal Asignado: 
              <small class="Mpersonal" id="usuarios"></small>
            </h6>
            <div id="listado"></div>

            
            
          
          {{-- <p class="horaInicio">Inicio del evento:<small class="fecha"></small> &hellip;</p>  --}}
        </div>
        <div class="modal-footer justify-content-between">
          <p> <strong> Detalles de evento</strong></p>
          {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

 
{{-- MODAL CREAR TICKET --}}
<div class="modal fade modalCrearTicket" id="modalnewTicket">        
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header btn text-light" style="background-color:#999999">
            <h4 class="modal-title ">Nuevo Ticket</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
         {{-- modal crear ticket --}}
          <div class="modal-body">
            
            <form id="formAgregarTicket"  enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <small>
                    <div class="form-check">                        
                      <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="checkLevel" id="checkLevel"><strong class="text-blue">Nivel 2</strong>                
                      </label>
                   </div>
                  </small>                         
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="exampleInputEmail1">Cliente</label>
                  <select name="txtNombreCliente" id="txtNombreCliente" class="form-control" style="width: 100%" required>
                    <option value=""></option>
                    @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                    @endforeach                                
                  </select>                              
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationServer01">Asunto</label>
                  <input type="text" name="txtAsunto" class="form-control" id="txtAsunto" placeholder="Añadir Asunto" required>
                  <div class="valid-feedback"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationServer01">Quejas</label>
                  <select name="txtTipologia" id="txtTipologia" class="form-control" >
                    <option value=""></option>
                    @foreach ($tipologia as $item)
                         <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach
                     
                      
                  </select>
                  <div class="valid-feedback"></div>
                </div>
            
              </div>  
               <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationServer01" >Peticion</label>
                  <select name="txtPeticion" id="txtPeticion" class="form-control" >
                    <option value=""></option>
                    @foreach ($peticion as $item)
                         <option  value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach 
                  </select>                    
                </div> 
                <div class="col-md-6 mb-3">
                  <label for="validationServer01">Medio de atencion</label>
                  <select name="txtMedio" id="txtMedio" class="form-control">
                    @foreach ($medio_atencion as $item)
                         <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach
                  </select>                    
                </div>                              
              </div>                         
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="exampleInputEmail1">Mensaje</label>
                  <select name="txtMensaje" id="txtMensaje" class="form-control" style="width: 100%" required>
                    <option value=""></option>
                    @foreach ($comentarios as $comentario)
                    <option value="{{$comentario->id}}">{{$comentario->nombre}}</option>
                    @endforeach                                
                  </select>                              
                </div>
              </div>
              <div class="modal-footer">
                <a href="#" onclick="agregarTicket()" class="btn text-light"   style="background-color:#3333cc">Agregar</a>
                
              </div> 
           </form>
          </div>
          {{-- end modal --}}
        </div>
    </div>                
   </div>
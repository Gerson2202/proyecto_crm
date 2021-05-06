
<div class="row">
  <div class="col-6">
      <div class="card">
          <div class="card-body">
            <form action="{{route('equipoAsignar',$equipo->id)}}" method="POST">
                @csrf                    
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationServer01">Direccion IP</label>
                        <input type="text" class="form-control"  name="ip" value="{{old('nombre',$equipo->ip)}}" placeholder="#.#.#.#">
                        <div class="valid-feedback"></div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServer01">winbox:</label>
                        <select name="winbox" class="form-control"  required>                            
                        <option value="{{old('nombre',$equipo->winbox)}}">{{old('nombre',$equipo->winbox)}}</option> 
                        <option value="sancayetano">RB San cayetano</option>                                   
                        <option value="cornejo"> RB Cornejo</option>
                        <option value="oficina"> RB Oficina</option>   
                        <option value="vista-hermosa">vista hermosa</option>                            
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationServer01">SSID</label>
                        <input type="text" class="form-control"  name="ssid" value="{{old('nombre',$equipo->ssid)}}" placeholder="#.#.#.#">
                        <div class="valid-feedback"></div>
                    </div>               
                </div> 
                <div class="form-row">
                    <div class="col-md-12 mb-12">
                        <label for="validationServer02">Detalle adicional</label>
                        <input type="text" class="form-control" value="{{old('nombre',$equipo->otro)}}" name="otro" >
                        <div class="valid-feedback"> </div>
                    </div>
                </div>
                <hr>
        
                <p>Asignar Lugar</p>
                {{-- check box --}}
                <div class="row">
                    <div class="col-2">
                        <div class="form-check">                        
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="checkCliente"  id="checkCliente">Cliente                  
                        </label>
                    </div>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-2">
                        <div class="form-check">                        
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="checkNodo"   id="checkNodo">Nodo                  
                            </label>
                        </div>
                    </div>
                
                </div>
                
                <br>                
                <div class="form-row" id="cardCliente">
                    <div class="col-md-12 mb-3" >
                        <label for="exampleInputEmail1">Cliente</label>
                        <select name="cliente_id"  class="form-control"  id="selectCliente" style="width: 100%"  >
                        <option value=""></option>
                        @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach                                
                        </select>                      
                    </div>
                    </div>
                    <div class="form-row" id="cardNodo" >
                    <div class="col-md-12 mb-3" >
                        <label for="exampleInputEmail1">Nodo</label>
                        <select name="nodo_id" id="selectNodo"  class="form-control" style="width: 100%"  >
                            <option value="" ></option>
                            @foreach ($nodos as $nodo)
                            <option value="{{$nodo->id}}">{{$nodo->nombre}}</option>
                            @endforeach                                
                        </select>                      
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-block btn-sm" type="submit">Guardar</button>                      
                </div>
             </form>
          </div>
      </div>    
   </div>
   {{-- FORMULARIO ASIGANAR SEDE --}}
   <div class="col-6">
       <div class="card">
           <div class="card-body">
            <form action="{{route('equipoAsignarSede',$equipo->id)}}" method="POST">
                @csrf                  
                             
                <div class="form-row">
                    <div class="col-md-12 mb-3" >
                        <label for="exampleInputEmail1">Sede</label>
                            <select name="nombre"  class="form-control" id="selectCliente" style="width: 100%">
                                @if ($equipo->sede_id!=null)
                                <option value="{{old('nombre',$equipo->sede_id)}}">{{old('nombre',$equipo->sede->nombre)}}</option>                                                                    
                                @else
                                <option value=""></option>
                                @endif
                               
                                @foreach ($sedes as $sede)
                                 <option value="{{$sede->id}}">{{$sede->nombre}}</option>
                                @endforeach                                
                            </select>                    
                    </div>
                    
                   
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-block btn-sm" type="submit">Guardar</button>                      
                </div>
             </form>
           </div>
       </div>
   </div>
</div>

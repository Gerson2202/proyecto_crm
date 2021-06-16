<div class="row">
    <div class="col-lg-12">                      
      {{-- CARD EQUIPOS CARGADOS --}}
     
      <style>
        .confondo 
         {
           background: white;  /*  color al  */
            color: #357cda;  /*  color alas letras  */
         }
      </style>
      <div class="card">
        <div class="card-header confondo"><i class="fas fa-toolbox"></i><strong class="text-info" > Equipos Cargados</strong>
          <div class="card-tools">
            <button type="button" class="btn btn-tool collapseEquipos" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <TAble class="table table -striped" id="planes">
            <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Mac</th>
                  <th>Sede</th>
                  {{-- <th>Operativa</th> --}}
                </tr>                        
            </thead>
            <tbody>
              @foreach ($equipos as $equipo)
               <tr>
                 @if ($equipo->tipoequipo_id!=null)
                 <th scope="row"><a href="{{route('equipoShow',$equipo->id)}}" class="btn text-blue btn-sm">{{$equipo->tipoequipo->nombre}}</a></th>
                 @else
                 <th scope="row"><a href="{{route('equipoShow',$equipo->id)}}" class="btn text-blue btn-sm">No registrado</a></th>

                 @endif
                  <th scope="row">{{$equipo->mac}}</th>
                  @if ($equipo->sede_id!=null)
                  <th scope="row">{{$equipo->sede->nombre}}</th>                                                                   
                  @else
                  <th scope="row">No registro</th>
                  @endif
                  
                  <td>                                 
                    <a href="#" ip={{$equipo->ip}} ssid={{$equipo->ssid}}  @if ($equipo->wimbox_id!=null)
                      winbox={{$equipo->wimbox->nombre}} 
                      @else
                      winbox="WimboxEliminado"  
                      @endif style="margin: 10px" class="verOperativa"><i class="fas fa-globe"></i></a>
                  </td>
               </tr> 
              @endforeach                             
             
            </tbody>
           
            
           
         </TAble> 
        </div>  
      </div>
      {{-- CARD OPERATIVA --}}
      <div class="card" id="cardOperativa">
        <div class="card-header confondo" ><i class="fas fa-globe"></i><strong class="text-info" >Operativa</strong>
          
           <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
           </div>
        </div>
        <div class="card-body">
            <h6>IP:  
              <span class="mx-3"><strong id="showIp"></strong></span>                                   
            </h6>
            <h6>Winbox:
              <span class="mx-3"><strong id="showWinbox"></strong></span>                                   
            </h6>
            <h6>SSID:
              <span class="mx-3"><strong id="showSsid"></strong></span>                                   
            </h6>
            <h6>Otro: 
              <span class="mx-3"><strong id="Showotro"></strong></span>                                   
            </h6>
        </div>
      </div>
       {{-- END CARD --}} 

       {{-- CARD DOCUMENTOS --}}
      <div class="card">
        <div class="card-header confondo"><i class="fas fa-file-pdf"></i><strong class="text-info"> documentos</strong>
          <div class="card-tools">
            <button type="button" class="btn btn-tool callapseDocumentos" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-striped table-valign-middle">
            <thead>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>
                <small class="text-success mr-1">
                  <i class="fas fa-file-pdf"></i>
                  
                </small>
                {{-- Recibos --}}
              </td>
              @if ($cliente->documento!=null)
              <td>
                 <small class="text-success mr-1">
                 <a class="btn btn-default btn-sm btn-dark mx-1"  href="{{route('downFile',$cliente->id)}}" target="_blank">
                   <i class="fas fa-file-pdf"></i> Descargar
                 </a>
               </small>
              </td>
              <td>
               <small class="text-success mr-1">
                 <a class="btn btn-default btn-sm btn-dark mx-1" data-toggle="modal" data-target="#modal-default" href="#">
                   <i class="fas fa-file-pdf"></i> Editar
                 </a>
               </small>

             </td> 
              
               {{-- {{asset($equipo->img)}} --}}
               @else
               <td>Sin documentos</td>
                 <td>
                   <small class="text-success mr-1">
                     <a class="btn btn-default btn-sm btn-dark mx-1" data-toggle="modal" data-target="#modal-default" href="#" >
                       <i class="fas fa-file-pdf"></i> Agregar
                     </a>
                   </small>

                 </td> 
               @endif
            </tr>
            {{-- MODAL SUBIR DOC --}}
            <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header btn btn-dark" style="background-color:#20207d">
                      <h4 class="modal-title ">Cargar arichivo <h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                   
                    <div class="modal-body"> 
                      <form action="{{route('AggFile',$cliente->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="validationServer03">Documento</label>
                            <div class="custom-file">
                              <input name="file" type="file" class="custom-file-input" id="" required>
                              <label name="file" class="custom-file-label" for="">Cargar achivo PDF</label>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" style="background-color:#20207d" type="submit">Agregar</button>
                        </div> 
                     </form>
                    </div>
                  </div>
                </div>
            </div>
              {{-- END MODAL --}}
            </tbody>
          </table>
        </div>
      </div>                    
    </div>                   
 </div>
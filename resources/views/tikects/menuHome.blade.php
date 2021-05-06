{{-- panel home --}}
<div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
    <br>
    <div class="form-row">
        <div class="col-lg-5 col-12">
          {{-- CARD TABLA DE TICKETS --}}
            <div class="card">
                <div class="card-header text-center card-primary  card-outline"  >Tickets</div>
               
                <div class="card-body">
                    <div class="table-responsive">
                        {{-- TABLA DE TICKETS PRINCIPAL --}}
                        <table class="table" id="tabla1">
                            <thead class="">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Asunto</th>                                  
                                </tr>
                              </thead>
                              <tbody>                                                    
                              </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>                               
        </div>
        {{-- CARD DETALLE DE TICKETS --}}
        <div class="col-lg-7 col-12" id="cardDetallTicket" style="display: none">
            <div class="card">
                <div class="card-header text-center card-primary  card-outline" id="txtDetalle">Detalle de Ticket</div>
                <div class="card-body">
                    <!-- Post -->
                    <small id="id" class="float-right"></small>
                      <div class="post">
                        
                        <div class="user-block">                                                
                            <img id="txtImgShow" class="img-circle img-bordered-sm" src="" alt="user image"> 
                            <span class="Creado por:">
                            <h6 id="txtNombreShow"></h6>
                            <span class="txtFechaShow"></span>
                          </span> 
                          
                        </div>
                        <!-- /.user-block -->
                        <p>
                          <h6 >Asunto: 
                            {{-- <i class="far fa-clock"></i> --}}
                            <small class="txtAsuntoShow text-info"></small>
                          </h6>
                          <hr>
                          <div></div>
                          <h6>Cliente: 
                            <small class="txtClienteShow text-info"></small>
                          </h6>
                          <hr> 

                          <div id="hTipologia">
                           <h6 >Tipologia: 
                            <small class="txtTipoShow text-info"></small>
                          </h6>
                          <hr>
                          </div>  
                          <div id="hPeticion" >
                            <h6 >Peticion: 
                              <small class="txtPeticionShow text-info"></small>
                            </h6>
                            <hr>
                          </div>                                          
                         
                          
                          <h6 >Medio: 
                            <small class="txtMedioShow text-info"></small>
                          </h6>                          
                          <hr>
                          <h6>Personal Encargado: 
                            <small class="txtPersonalEncargado text-info"></small>
                          </h6>
                          <hr>
                           <h6>Mensaje: 
                            <small class="txtMensajeShow text-info"></small>
                          </h6>
                          <hr>
                          <a href="#" id="irChat" class="btn btn-sm btn-info">Detalle</a>
                          <a href="#" id="eliminarTicket" class="btn btn-sm btn-danger" title="Eliminar Ticket"><i class="fas fa-trash-alt"></i></a>
                        </p>                                            
                      </div>
                      <!-- /.post -->
                </div>
            </div>
        </div>
    </div>
</div>
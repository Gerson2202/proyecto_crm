<div class="modal fade" id="modal-Tipos">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tipo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
               <div class="card">
                <div class="card-header">Lista de Tipos</div>
                <div class="card-body">
                  <table class="table table-striped table-bordered" id="tablaTipos"> 
                     <thead >
                       <tr>
                           <th >Nombre</th>
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
                <div class="card-header">Agregar Tipo</div>
                <div class="card-body">
                  
                     <form  method="POST" action=""  id="formTipo">
                      @csrf
                      <div class="form-row">                   
                        <div class="col-md-7 mb-3">
                          <label for="validationServer01">Nombre</label>
                          <input type="text"  name="nombre" class="form-control" id="inputName" placeholder="Tipo De Equipo"  required>
                          <div class="valid-feedback"></div>
                        </div>
                      </div>
                      <hr>
                      <a href="#" class="btn btn-info btn-sm" id="btnAgregarTipo" style="float: right">Guardar</a> 
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
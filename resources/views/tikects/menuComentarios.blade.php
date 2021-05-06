<div class="tab-pane fade" id="custom-content-below-comentarios" role="tabpanel" aria-labelledby="custom-content-below-comentarios-tab">
  <br>
  <div class="form-row">
    <div class="col-4">
      <div class="card">
          <div class="card-header card-primary  card-outline text-center text-info">Agregar comentario</div>
          
          <form action="" id="formAggComentario">
            @csrf
            <div class="card-body">           
              <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Nombre"> 
              <br>
              <textarea name="txtContenido" id="txtContenido" cols="15" class="form-control" rows="5" placeholder="Contenido"></textarea>
              <br>
              <a href="#" onclick="AgregarComentario()" class="btn btn-info btn-sm">Agregar </a>
            
            
            </div>            
        </form>
      </div>
    </div>
    <div class="col-8">
      <div class="card">
          <div class="card-header card-primary  card-outline text-center">Comentarios Guardados</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm" id="tablaComentarios">
                <thead>
                  <tr>       
                      <th>id</th>               
                      <th>Nombre</th>
                      <th>Contenido</th>
                      <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      
                   </tr>                                       
                </tbody>
              </table>
          </div>
           
          </div>
      </div>
    </div>
  </div>
</div>
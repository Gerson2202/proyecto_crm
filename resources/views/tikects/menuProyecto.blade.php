{{-- MENU PROYECTOS --}}
<div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
    <br>
    <div class="form-row">
      <div class="col-12">
          {{-- TABLA PROYECTOS --}}
        <div class="card">
            <div class="card-header text-center">Proyectos</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="tablaProyectos">
                    <thead class="">
                        <tr>
                          <th id="idCol" scope="col">ID</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Descripcion</th>
                          <th scope="col">Fecha inicio</th>  
                           <th scope="col">Opciones</th>                        
                        </tr>
                      </thead>
                      <tbody>                                   
                      </tbody>
                </table>
            </div>
            </div>
        </div>
      </div>
      {{-- agg proyecto --}}
      {{-- <div class="col-5">
        <div class="card" id="cardAgregarProyecto">
          <div class="card-header">Agregar Proyecto</div>
          <div class="card-body">
            <form id="FormAgregarProjecto">
              @csrf
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Nombre</span>
                <input type="text" name="txtNombre" id="txtNombre" class="form-control" aria-describedby="basic-addon3">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Descripcion</span>
                <input type="text" name="txtDescripcion" id="txtDescripcion" class="form-control"  aria-describedby="basic-addon3">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Fecha</span>
                <input type="date" name="txtFecha" id="txtFecha" class="form-control"  aria-describedby="basic-addon3">
              </div>
              <div class="input-group mb-3">
                <a href="#"  onclick="agregarProyecto()" id="agregarProyecto" class="btn text-light" style="background-color:#3333CC">Agregar</a>
                
                                            
              </div>
            </form>

          </div>

        </div>
      </div> --}}
    </div>
    {{-- PANEL DE EDICION PROYECTO--}}
    <div class="form-row" id="rowEditar">                        
      <div class="col-6">
        <div class="card" id="card">
          <div class="card-header">Editar Proyecto </div>
          <div class="card-body">
            <form action="" id="formProyectoEdit">
              @csrf
              {{-- tipo hiden para el id --}}
              <input type="hidden" id="txtId"> 
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Nombre</span>
                <input type="text" id="txtNombreEdit" name="txtNombreEdit" class="form-control rounded-0" aria-describedby="basic-addon3">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Descripcion</span>
                <input type="text" id="txtDescripcionEdit" name="txtDescripcionEdit" class="form-control rounded-0" aria-describedby="basic-addon3">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Fecha</span>
                <input type="date" id="txtFechaEdit" name="txtFechaEdit" class="form-control rounded-0" aria-describedby="basic-addon3">
              </div>
              <div class="input-group mb-3">
                <a href="#" class="btn btn-info btn-block" id="btnEditarProyecto" onclick="editarProyecto()">Editar</a>
                
              </div>
            </form>

          </div>

        </div>
      </div>
      <div class="col-6">
        <div class="card" id="cardEdit">
            <div class="card-header text-center">Niveles</div>
            <div class="card-body">
              <div class="table-responsive">
                {{-- FORM LVL --}}
                <form action="" id="formAgregarNivel">
                  @csrf
                  <div class="input-group mb-3">
                  <input type="text" id="txtNombreNivel" name="txtNombreNivel" class="form-control rounded-0" placeholder="Nombre del nivel">
                  <input type="hidden" id="txtProyectId" name="txtProyectId" class="form-control rounded-0" placeholder="ProjectId">
                  <span class="input-group-append">
                    <button type="button" id="btnAgregarNivel" onclick="AgregarNivel()" class="btn btn-info btn-flat">Añadir</button>
                    
                  </span>
                </div>
                </form>
                {{-- <div id="tablaNiveles">

                </div> --}}
                
                <table class="table" id="tablaNiveles">
                    <thead class="">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nivel</th>
                          <th scope="col"># Proyecto </th>
                          
                        </tr>
                      </thead>
                      <tbody>                                        
                      </tbody>
                </table> 
                <button class="btn btn-sm btn-danger btnCerrarEdicion" >Cerrar edicion</button>
                {{-- <button  onclick="nivelesPintar()">prueba</button> --}}
                
            </div>
            </div>
        </div>
      </div>
    </div>
</div>
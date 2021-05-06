<div class="row">
    <div class="col-lg-4 col-12">
      <div class="card cardAggimg">
        <div class="card-header text-info"><i class="fas fa-edit "></i><strong> Agregar Imagenes</strong>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>             
          </div>
        </div>
        <div class="card-body">
          {{-- FORMULARIO --}}
        <form action="{{route('actaSubirImagenes')}}" method="POST" id="my-awesome-dropzone" class="dropzone" >
          <input type="hidden" name="idActa" value="{{$acta->id}}">
        </form>
        </div>
     </div>
    </div>
    <div class="col-lg-8 col-12">
      <div class="card cardImgs">
        <div class="card-header text-info"><strong> Imagenes Cargadas</strong>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>             
          </div>
        </div>
        <div class="card-body">
          {{-- TABLA AMAGENES --}}
          <table class="table table-sm table-striped table-borderes" id="tableImgActa">
            <thead>
              <tr>
                  <th>Id</th>
                  <th>Imagen</th>
                  <th>Opciones</th>
              </tr>
            </thead>
            <tbody>                                      
            </tbody>
          </table>
          </table>

        </div>
     </div>
    </div>
    
  </div>
{{-- PANEL EDICION USER Y ASIGA PROYECTOS --}}

  <div class="tab-pane" id="settings">
    <form class="form-horizontal" action="{{route('userUpdate',$user->id)}}" method="POST">
      @csrf
      <div class="form-group row">
        <label for="inputName"  class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="inputName" id="inputName" value="{{$user->name}}" placeholder="inputName">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="inputEmail"  value="{{$user->email}}" id="inputEmail" placeholder="Email">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputContraseña" class="col-sm-2 col-form-label">Contraseña</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="inputContraseña" value="{{$user->password}}" id="inputContraseña" placeholder="inputContraseña">
        </div>
      </div>                            
      <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
          <button type="submit" id="tbnEditar" class="btn btn-info  btn-block">Editar</button>
        </div>
      </div>
    </form>
    <hr>
    <!-- /.card -->      
     <h5 class="text-primary">Asiganar Proyecto</h5 class="text-primary">
     <hr>
     <div class="row">
      <div class="form-group col-6">
          <label for="exampleSelectBorder">Proyectos</label>
          <select class="custom-select form-control-border" id="selectProject">
              <option value="">Seleccionar Proyecto</option>
              @foreach ($proyectos as $item)
              <option value="{{$item->id}}">{{$item->nombre}}</option>
              @endforeach                      
          </select>
      </div>       
      <div class="form-group col-6">
          <label for="exampleSelectBorder">Niveles</label>
          <select class="custom-select form-control-border" id="selectLevel">
             
          </select>
      </div>   
      <div class="form-group col-12">
          <a href="#" class="btn btn-info btn-block" id="btnAsignar">Asignar</a>
      </div>       
     </div>                                 
  </div>


<div class="row">
    <div class="col-6">
      <h5 class="text-primary"> <strong class="text-primary"> Bodega de materiales</strong></h5>                                  
      <hr>
      <table class="table table-sm">
        <thead>
          <tr>
              <th>Material</th>
              <th>Cantidad</th>              
          </tr>
        </thead>
        <tbody>
          
            @foreach ($materiales as $item)
            <tr>
              <th scope="row" class="text-info">{{$item->material->nombre}}</th>
              <td>{{$item->stock}}</td>              
            </tr> 
            @endforeach
             
                                                  
        </tbody>
      </table>
    </div>
    <div class="col-6">
      <h5 class="text-primary"> <strong class="text-primary"> Bodega de equipos</strong></h5>                                 
      <hr>
      <table class="table table-sm">
        <thead>
          <tr>
              <th>Tipo</th>
              <th>Mac</th>
              <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($equiposEnPosecion as $item)
            <tr>
              @if ($item->tipoequipo_id!=null)
              <th scope="row" class="text-info">{{$item->tipoequipo->nombre}}</th>
              @else
              <th scope="row" class="text-info">sin tipo</th> 
              @endif
              
              <td><a href="{{route('equipoShow',$item->id)}}">{{$item->mac}}</a></td>
              <th><a href="#" id="btnPrestar" class="btn btn-warning btn-sm btnPrestar" datos="{{$item->id}}" data-toggle="modal" data-target="#modal-prestamo">Prestar</a></th>
              </tr> 
            @endforeach
             
                                                  
        </tbody>
      </table>
      {{-- INICIO DE MODAL DE PRESTAMOS --}}
      <div class="modal fade" id="modal-prestamo">
        <div class="modal-dialog ">
          <div class="modal-content">
                <div class="modal-header btn-info" style="background-color:#3333cc">
                <h4 class="modal-title">Prestamo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
                </div>
                 <div class="modal-body">
                      <form id="formPrestarEquipo">
                        @csrf
                        <div class="form-row">         
                          <div class="form-group col-md-12">           
                           
                             <label for="exampleInputEmail1"><i class="fas fa-user"></i> Usuario</label>
                             <select name="idUser"  value="{{old('user')}}" id="idUser" style="width: 100%" class="form-control form-control-sm"  required>
                                @foreach ($users as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                               </select> 
                               <input type="hidden" name="idEquipo" id="idEquipo" class="idEquipo">
                          </div>
                        </div>        
                        <div class="modal-footer">
                          <a href="#" onclick="prestarEquipo()" class="btn text-light"   style="background-color:#3333cc">Prestar</a>
                          
                        </div> 
                     </form> 
                   </div>
                </div>
        </div>
      </div>
    {{-- <div class="col-6">
      <h5>Equipos en posecion</h5>
      <hr>
    </div> --}}
  </div>
 {{-- panel ultimos nuevos tickets sin asignar --}}
 <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
    <br>
    <div class="form-row">
      <div class="col-12">
        <div class="card">
            <div class="card-header  text-center card-primary  card-outline">Ultimos Reportes</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="tabla2">
                    <thead class="">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Asunto</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Opciones</th>   
                           <th scope="col">Asignar ticket</th>                                         
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                </table>
            </div>
            </div>
        </div>
      </div>
    </div>
</div> 

   {{-- panel asignadas a mi --}}
 <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
    <br>
    <div class="form-row">
      <div class="col-12">
        <div class="card">
            <div class="card-header card-primary  card-outline text-center">Asiganados a mi</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tabla3">
                    <thead class="">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Asunto</th>
                          <th scope="col">fecha</th>
                          {{-- <th scope="col">opciones</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                      
                      </tbody>
                </table>
            </div>
            </div>
        </div>
      </div>
    </div>
</div>


  

{{-- MODAL PARA ASIG --}}
<div class="modal fade" id="modal-asignar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Asignacion de ticket</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">       

        <form id="formAsignarTicket">
          @csrf
          <div class="form-row">         
            <div class="form-group col-md-12">           
             
               <label for="exampleInputEmail1"><i class="fas fa-user"></i> Usuario</label>
               <select name="idUser"  value="{{old('user')}}" id="idUser" style="width: 100%" class="form-control form-control-sm"  required>
                  @foreach ($users as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                 </select> 
            </div>
          </div>        
          <div class="modal-footer">
            <a href="#" onclick="asignarTicket()" class="btn text-light"   style="background-color:#3333cc">Asignar</a>
            
          </div> 
       </form>
      </div>
       <!-- /.modal-content -->
    </div>
   <!-- /.modal-dialog -->
  </div>
</div>

{{-- SECTION FORM Wimbox --}}
<div class="col-4">
    <div class="card">
        <div class="card-header card-primary  card-outline text-center text-info">Agregar Wimbox</div>
        
        <form action="" id="formAggWimbox">
          @csrf
          <div class="card-body">           
            <input type="text" name="txtNombreW" id="txtNombreW" class="form-control" placeholder="Nombre"> 
            <br>
            
            <a href="#" onclick="AgregarWimbox()" class="btn btn-info btn-sm">Agregar </a>
          
          
          </div>            
      </form>
    </div>
  </div>
  {{-- SECTION TBALA Wimbox --}}
  <div class="col-8">
    <div class="card">
        <div class="card-header card-primary card-outline text-info text-center">Wimbox</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm" id="tablaWimbox">
              <thead>
                <tr>       
                                 
                    <th>Nombre</th>
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
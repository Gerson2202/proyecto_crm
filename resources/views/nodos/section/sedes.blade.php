{{-- SECTION FORM SEDE --}}
<div class="col-4">
    <div class="card">
        <div class="card-header card-primary  card-outline text-center text-info">Agregar Sede</div>
        
        <form action="" id="formAggSede">
          @csrf
          <div class="card-body">           
            <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Nombre"> 
            <br>
            
            <a href="#" onclick="AgregarSede()" class="btn btn-info btn-sm">Agregar </a>
          
          
          </div>            
      </form>
    </div>
  </div>
  {{-- SECTION TBALA SEDE --}}
  <div class="col-8">
    <div class="card">
        <div class="card-header card-primary  card-outline text-center text-info">Sedes</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm" id="tablaSede">
              <thead>
                <tr>       
                    <th>id</th>               
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
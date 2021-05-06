@extends('includes.dash')
@section('contenido')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" >     
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-file-signature"></i> Administracion De Contratos</h1>
           </div>          
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('homeIndex')}}">Pagina Principal</a></li>
                {{-- <li class="breadcrumb-item "><a href="{{route('planesIndex')}}">Ir atras</a></li> --}}
              </ol>
            </div>
            {{-- MODAL CREAR CONTRATO --}}
             <div class="modal fade" id="modal-default">
              <link rel="stylesheet" href="{{asset('vendor\jquery-ui-1.12.1\jquery-ui.min.css')}}">
              <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header text-light"  style="background-color:#3333CC">
                      <h4 class="modal-title ">Detalles de contrato <h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>                   
                    <div class="modal-body"> 
                      <style>
                        .ui-widget.ui-widget-content
                        {
                          border: 1px solid #c5c5c5;
                          z-index: 2000 !important;
                        }
                      </style>
                      <form action="{{route('ContratosStore')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="validationServer01">Codigo Contrato</label>
                            <input type="text" name="cod_contrato" minlength="3" class="form-control" value="{{old('cod_contrato')}}" placeholder="####" required>
                            <div class="valid-feedback"></div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationServer01">Tipo</label>
                            <select name="tipo"  value="{{old('tipo')}}" class="custom-select">
                              <option value="{{old('tipo')}}">{{old('tipo')}}</option>
                              <option value="Primer contrato">Primer contrato</option>
                              <option value="Mas planes">Mas planes</option>
                            </select>
                            
                            <div class="valid-feedback"></div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col-md-12 mb-3">
                            <label for="validationServer02">Cliente</label>
                            <select name="cliente_id" class="custom-select form-control-lg" id="cliente" style="width: 100%"  required>
                               @foreach ($clientes as $user)
                              <option  value="{{ $user->id }}">{{ $user->nombre }}</option>
                              @endforeach                     
                           </select> 
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="validationServer06">Plan</label>
                            <select name="plan_id" class="custom-select" id="validationServer04"   required>
                               @foreach ($planes as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->descripcion }}</option>
                                @endforeach                     
                            </select>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationServer03">Fecha</label>
                            <input type="date" name="fecha" class="form-control" value="{{old('fecha')}}" aria-describedby="validationServer03Feedback" required>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                              
                            </div>
                          </div>
                          <div class="col-md-12 mb-3">
                            <label for="validationServer03">Documento</label>
                            <div class="custom-file">
                              <input name="file" type="file" class="custom-file-input" value="{{old('file')}}" required>
                              <label name="file" class="custom-file-label" for="">Cargar Evidencia</label>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn text-light" style="background-color:#3333CC" type="submit">Agregar</button>
                        </div> 
                     </form>
                    </div>
                  </div>
                </div>
            </div>
              {{-- FIN MODAL --}}    
    </section>  
     <!-- Main content -->
    <section class="content">
   {{-- lista de contratos --}}
      <!-- Default box -->
      <div class="card">
        <div class="card-header card-blue card-outline" style="background: white">
          <h3 class="card-title"><i class="fas fa-table"></i> Lista de contratos </h3>
           <div class="card-tools">
              <a class="btn  btn-sm text-blue" data-toggle="modal" data-target="#modal-default" href="#">
                <i class="fa fa-plus"></i>
              </a>
          </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="contratos">
                <thead>
                  <tr>
                      <th>Id </th>
                      <th>Codigo </th>
                      <th>Tipo</th>
                      <th>fecha</th>
                      <th>Cliente</th>
                      <th>Documento</th>                      
                      <th>Opciones</th>
                  </tr>
               </thead>
              <tbody >
                    
              </tbody>   
            </table> 
         </div>
        
        
        
        
        <!-- /.card-footer-->
      </div>
      
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
  @include('includes.pluggin')

    @include('contratos.section.datatable')


  <script>
         
          $("#cliente").select2({
            placeholder: "selecciona el plan",
             theme: "classic",
          });
  </script>
  {{-- MENSAJE DE EXITO --}}
     @if (session('mensaje'))
     <script>
       toastr.success("{{session('mensaje')}}");
     </script>                
     @endif          
   {{-- END MENSAJE DE EXITO --}}

   @error('cod_contrato')
       {{-- MENSAJE DE EROR --}}
           
            <script>
                 toastr.error("!!El CODIGO ya existe , Intenta con otro!!");
           </script> 
   @enderror             
    
 {{-- END MENSAJE DE EROR --}}
    {{-- ELIMINAR CONTRATO --}}
 <script>
   let fila;
    $(document).on("click",".btnEliminar",function(){
         fila= $(this).closest("tr");
         let id= parseInt(fila.find('td:eq(0)').text()); //tomamos el primero dato el 0 que se encuentra en esa fila en nuestro caso es el id
         
          Swal.fire({
                   title: 'Estas Seguro?',
                   text: "Deseas Eliminar este Contrato?",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Si!'
                 }).then((result) => {
                   if (result.isConfirmed) {
                     $.ajax(
                       {
                         url: "/Crm/Contrato/delet/"+id, 
                         processData: false,  
                         contentType: false,    
                          
                         success: function(response){              
                           Swal.fire({
                               icon: 'success',
                               title: 'Contrato Eliminado Eliminado',
                               showConfirmButton: false,
                               timer: 700
                           }).then((result) => {
                                // redireccion con javascript
                               window.location.href = "/Crm/contratos/list";
                              //  recargar página  jQuery
                               location.reload();
                           });
                           }
                     })  
                    
                   }
                 })       

    });
   
 </script>
 @include('includes.buscador')
@endsection
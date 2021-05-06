@extends('includes.dash')
@section('contenido')

{{-- <link href="vendor/select2-4.0.13/dist/css/select2.min.css" rel="stylesheet" /> --}}
<link rel="stylesheet" href="{{asset('vendor\select2-4.0.13\dist\css\select2.min.css')}}">

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">   
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Administracion De Contratos</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Pagina Principal</a></li>
                 <li class="breadcrumb-item btn-outline-success"><a href="{{route('prueba')}}">Pagina prueba</a></li> 
              </ol>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Nuevo Contrato
              </button>
            </div>
          </div>
        </div>

        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
              {{-- <style>
                  .ui-widget.ui-widget-content
                  {
                    border: 1px solid #c5c5c5;
                    z-index: 2000 !important;
                  }
              </style> --}}

              <form action="{{route('ContratosStore')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                 
                  <div class="col-md-6 mb-6">
                    <label for="validationServer01">Responsable </label>
                            <select name="responsable" class="custom-select " id="users"  required>
                              @foreach ($clientes as $user)
                              <option value="{{ $user->id }}">{{ $user->nombre }}</option>
                              @endforeach                     
                           </select> 
                  </div>
                </div>

               
               
              </form>
              
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-defaulte">
                      Nuevo Contratos
                </button>
    
                <div class="modal fade " id="modal-defaulte">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Agregar Contrato</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body ">
                          <style>
                            .ui-widget.ui-widget-content
                            {
                              border: 1px solid #c5c5c5;
                              z-index: 2000 !important;
                            }
                        </style>
                          <form action="{{route('storePrueba')}}" autocomplete="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                             <div class="col-md-6 mb-3">
                                <label for="validationServer02">Cliente</label>
                                <select name="responsable[]" multiple="multiple" class="custom-select " id="user"  required>
                                  @foreach ($clientes as $user)
                                  <option value="{{ $user->id }}">{{ $user->nombre }}</option>
                                  @endforeach                     
                               </select> 
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-primary" type="submit">Agregar</button>
                            </div>   
                          </form>
                        </div>
                      </div>
                     </div>  
                </div>


                <script src="https:code.jquery.com/jquery-3.5.1.min.js"></script> 
                <script src="{{asset('vendor\select2-4.0.13\dist\js\select2.min.js')}}"></script> 
                
                <script>
                
                    $("#user").select2({
                    
                    });
                </script>  
       </section>
</div>
{{-- scrip del buscador --}}
{{-- <script src="https:code.jquery.com/jquery-3.5.1.min.js"></script> 
<script src="{{asset('vendor\jquery-ui-1.12.1\jquery-ui.min.js')}}"></script> 
<script> 
                     $('#buscar').autocomplete({
                       source: function(request, response){
                         $.ajax({
                           url: "{{route('searchCliente')}}",
                           dataType: 'json',
                           data:{
                             term: request.term 
                           },
                           success: function(data){
                             response(data)
                           }
                         });
                       }
                      
                     });
</script>  --}}




@endsection
{{-- @extends('includes.dash')
@section('contenido')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css"> --}}
{{-- arriba esta lo del autocomplete --}}
{{-- <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
           </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
   {{-- lista de contratos --}}
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de contratos </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
          
        </div>
        <div class="card-body">
          <table class="table table -striped" id="contratos">
            <thead>
              <tr>
                  <th>Codigo De Contrato</th>
                  <th>Plan</th>
                  <th>fecha</th>
                  <th>Documento de Soporte</th>
                 </tr>
         </thead>
          <tbody >
                @foreach ($Contrato as $item)
        
                  <tr>
                    <th scope="row">{{$item->cod_contrato}}</th>
                    
                    <td>{{$item->tipo}}</td>
                    
                    <td>{{$item->fecha}}</td>
                    <td><a href="{{ route('soportea',$item->documento) }}">Descargar<a></td> 
                  </tr>
                      
                  @endforeach 
          </tbody>

          {{-- <div class="card" style="width:400px">
            <img class="card-img-top" src="{{asset($item->documento)}}" alt="Card image">
            <div class="card-body"> --}}

          </table>
        </div>
        




        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
        <script> 
          
          $('#contratos').DataTable({
           responsive:true,
           autoWidth: false,
          
                  "language": {
                      "lengthMenu": "Mostrar _MENU_ Registros por Pagina",
                      "zeroRecords": "No encontre nadita :( , Disculpa!",
                      "info": "Mostrando la Pagina _PAGE_ de _PAGES_",
                      "infoEmpty": "No records available",
                      "infoFiltered": "(filtrado de  _MAX_ registros totales)"
                  }
          
          
          });
          </script>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  {{-- </div> --}} --}}



                     
        
  
    
{{-- @endsection --}}
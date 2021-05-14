@extends('includes.dash')
@section('contenido')
{{-- 
<link rel="stylesheet" href="{{asset('assets/vendor/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css"> --}}

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-print"></i> Reporte de Tickets </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina Principal</a></li>
              <li class="breadcrumb-item "><a href="{{route('ticketsIndex')}}">Ir a tickets</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="background: white">
                          <h3 class="card-title"><i class="fas fa-calendar-minus"></i> Tickets </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Asunto</th>
                              <th>Mensaje</th>
                              <th>Tipologia</th>
                              <th>M.Atencion</th>     
                              <th>Peticion</th>                              
                              <th>Fecha</th>
                            </thead>
                            <tbody>
                            <tbody>                                                     
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
 {{-- IMPRIMIR --}}

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>



<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>



  <script>
       let table= $('#example1').DataTable(
            {
                dom: 'Bfrtip',
                    buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print','colvis'
                    ],
                    
                                        "ajax": "{{route('indexListarInforme')}}",
                                        "columns": [
                                            {data: 'asunto'},
                                            {data: 'mensaje'},
                                            {data: 'tipologia.nombre',                                            
                                            "defaultContent": ""},                                              
                                            {data: 'medio.nombre'},
                                            {data: 'peticion.nombre',
                                            "defaultContent": ""},                                            
                                            {data: 'created_at'},                                                                                       
                                            
                                        ],
                                        responsive:true,
                                        autoWidth: false,
                                        "order": [[ 0, 'des' ], [ 1, 'des' ]],
                                        "language":
                                            { 
                                                "lengthMenu": "Mostrar _MENU_ Registros",
                                                "zeroRecords": "Obteniendo datos....",
                                                "info":"Pagina _PAGE_ de _PAGES_",
                                                "infoEmpty": "No records available",
                                                "infoFiltered": "(filtrado de  _MAX_ registros totales)",
                                                "sSearch": "Buscar:",                                                
                                                "oPaginate": 
                                                {  
                                                  "sFirst": "Primero",
                                                  "sLast": "Ultimo",
                                                  "sNext": "Siguiente",
                                                  "sPrevious": "Anterior"
                                                 },
                                                "sProcessing": "Procesando...",
                                                "buttons": {
                                                        "copy": 'Copiar',
                                                        "csv": 'Exportar a CSV',
                                                        "print": 'Imprimir',
                                                        "colvis": 'Excluir Columna',                                                                                       
                                                        
                                                    },
                                        }
                                                                      
            });
            table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
   
  
    // $('#example1').DataTable( {
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // } );

  </script> 
@endsection
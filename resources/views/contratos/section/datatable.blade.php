<script> 
                            
    $('#contratos').DataTable({
      "ajax": "{{route('contratoListado')}}",
      "columns": [
          {data: 'id'},
          {data: 'cod_contrato'},
          {data: 'tipo'},
          {data: 'fecha'},
          {data: 'cliente.nombre'}, 
          {data: 'id'},
              
          {defaultContent: '<a href="#" class="btn btn-sm btn-danger btnEliminar" i><i class="fas fa-trash-alt"></i></a>'}                 
      ],
      "columnDefs": [
         {
            "targets":5,
            "data": "download_link",
            "render": function ( data, type, row, meta )
              {
                return '<small class="text-success mr-1"><a class="btn btn-default text-light btn-sm  mx-1" style="background-color: #3333cc"  href="/Crm/Contratos/down/'+data+'" target="_blank"><i class="fas fa-download"></i>Descargar </a></small>';
              }
          }
          ],
      responsive:true,
      autoWidth: false,
      "order": [[ 0, 'asc' ], [ 1, 'asc' ]],
      "language":
          { 
              "lengthMenu": "Mostrar _MENU_ Registros",
              "zeroRecords": "Obteniendo datos....",
              "info":"Pagina _PAGE_ de _PAGES_",
              "infoEmpty": "No records available",
              "infoFiltered": "(filtrado de  _MAX_ registros totales)",
              "sSearch": "Buscar:",
              "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Ultimo",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
          },
          "sProcessing": "Procesando...",
      }
      
      
      });
</script>
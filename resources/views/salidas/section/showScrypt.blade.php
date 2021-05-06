<script>
  var material_id;
    $('.informacion').click(function(e){
        e.preventDefault();
      
        var nombre = $(this).attr('nombre');
        var fecha = $(this).attr('fecha');
        var responsable = $(this).attr('responsable');
        var destino = $(this).attr('destino');
        var descripcion = $(this).attr('descripcion');
        var mac = $(this).attr('mac');
        var serial = $(this).attr('serial');
        // alert(nombre);
       // var fecha = $(this).attr('fecha');
       // var responsable = $(this).attr('responsable');
       // var destino = $(this).attr('destino');
       // var descripcion = $(this).attr('descripcion');
   
   
       
        $(".nombre").html(nombre);   
        $(".fecha").html(fecha); 
        $(".responsable").html(responsable);
        $(".destino").html(destino);
        $(".descripcion").html(descripcion);
        $(".mac").html(mac);
        $(".serial").html(serial);
       // $(".destino").val(VelBadestinojada);  
       // $(".descripcion").val(descripcion);
            
     
      
       
     });
    // CARGAR MATERIAL
     function agregarMaterial()
    {        
     
      var datosP = new FormData(document.getElementById("formAgregarMaterial")); 
        $.ajax(
            {
              url: "/Crm/Inventario/agregarMaterial", 
              type: "POST",
              data: datosP,
              processData: false,   //tell jQuery not to process the data
              contentType: false,    //tell jQuery not to set contentType
                //a continuacion refrescar la tabla despues de un evento
              success: function(response){
                toastr.success("Material Agregado"); 
                $('#inputCantidad').val('0');    
                tableMateriales.ajax.reload();
                }
          })           
    };
    // ELIMNIAR MATERIAL CARGADO
    
    function eliminarMaterial(data)
    {      
     
      idRegistro=data;
      var user_id=$("#idUser").val();
      
      console.log(user_id);
      
      //  consulta de id material
      $.ajax(
              {
                url: "/Crm/Inventario/consultaIdmaterial/"+data, 
                processData: false,   //tell jQuery not to process the data
                contentType: false,    //tell jQuery not to set contentType
                  //a continuacion refrescar la tabla despues de un evento
                success: function(response){
                  
                  material_id=response.material_id;
                  let stock=response.stock;
                  // console.log(stock);
                  eviarIdmaterial(material_id,stock);
                  
                  }
      });   
      
      function eviarIdmaterial(material_id,stock){
        console.log(stock);
        $.ajax(
             {
               url: "/Crm/Inventario/eliminarMaterial/"+data+"/"+material_id+"/"+user_id+"/"+stock, 
               processData: false,  
               contentType: false,   
               success: function(response){
                 toastr.success("Se ah eliminado");          
                 tableMateriales.ajax.reload();
                 }
           }) 
      };   
                  
    };
   
 </script>

   <script> 
      var idSalida=$('#txtIdSalida').val();         
      let tableMateriales=$('#tablaMateriales').DataTable({
        "bPaginate": false, "bFilter": false, "bInfo": false,
        'ajax' : {
            'url' : "/Crm/Inventario/materiales/lista/"+idSalida,
        },
        "columns": [
            {data: 'material.nombre'},
            {data: 'stock'},
            {data: 'id'},
            {data: 'material_id'},
        ],
        "columnDefs": [
                              {
                                "targets":2,
                                "data": "link",
                                "render": function ( data, type, row, meta ) {
                                  return ' <a href="#" onclick="eliminarMaterial('+data+')" class="btn btn-sm btn-danger text-light eliminarMaterial"><i class="fas fa-trash-alt"> </i></a> ';
                                }
                              },
                                {
                                  // OCULTAR COLUMNA
                                    "targets": [ 3 ],
                                    "visible": false,
                                    "searchable": false
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
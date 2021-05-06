{{--MOSTRAR CONTENIDO EN EDITAR--}}
  
<script>
    
    $('#rowEditar').hide(); //permanece oculto seccion de editar
    $('#cardAgregarProyecto').hide();

 var fila; //captura la fila en la que estoys
 var idProyecto;
 $(document).on("click","#btnEditar",function()
  {
      fila= $(this).closest("tr");
      let id= parseInt(fila.find('td:eq(0)').text()); //tomamos el primero dato el 0 que se encuentra en esa fila en nuestro caso es el id
      idProyecto=id;
      $('#rowEditar').show();
      // $('#cardAgregarProyecto').hide();

      $.ajax(
        {
          url: "/proyecto/ajax/show/"+id, 
          type: "GET",
          processData: false,   //tell jQuery not to process the data
          contentType: false,//tell jQuery not to set contentType
          
            success: function(proyecto)
            {                  
                // proyecto=datos["0"];
                // levels=datos["1"];
                // console.log(levels);
                var proyectos = JSON.parse(proyecto);
                console.log();
                $("#txtNombreEdit").val(proyectos.nombre);
                $("#txtDescripcionEdit").val(proyectos.descripcion);
                $("#txtFechaEdit").val(proyectos.start);    
                $("#txtId").val(proyectos.id);  
                $("#txtProyectId").val(proyectos.id);      //pegamos el id al fomr de lvl Oculto 
            } 
        })

  });

    var tablaNiveles =$('#tablaNiveles').DataTable(
      {
                      ajax:{
                          url: "{{route('nivelesListar')}}",
                          data: {"idProyecto": idProyecto} 
                       },
                      "columns": [
                      {data: 'id'},
                      {data: 'name'},
                      {data: 'project_id'},
                      {defaultContent: '<button  class="btn btn-danger btn-sm mx-1" id="btnEliminarNivel" title="Eliminar"><i class="fas fa-trash-alt"></i></button>'}    

                      
                    ],
                  responsive:true,
                  autoWidth: false,
                      
                  "language": { 
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

 //AGREGAR PROYECTO
  function agregarProyecto()
    {           
        var datosP = new FormData(document.getElementById("FormAgregarProjecto")); 
        $.ajax(
            {
              url: "/proyecto/guardar", 
              type: "POST",
              data: datosP,
              processData: false,   //tell jQuery not to process the data
            contentType: false,    //tell jQuery not to set contentType
                //a continuacion refrescar la tabla despues de un evento
              success: function(response){
                alert('se guardo con exito');
                limpiar();
                tablaProgramacion.ajax.reload();  // QUE SE RECARGUE LA DATATBALE
                }
          })           
    };

  // EDITAR PROYECTO
  function editarProyecto()
    {
    
      var fd = new FormData(document.getElementById("formProyectoEdit"));
      
      let id=$("#txtId").val();
      
    
        
        $.ajax(
          {
              url: "/proyecto/ajax/update/"+id, 
              type: "POST",
              data: fd,
              processData: false,   //tell jQuery not to process the data
              contentType: false, //tell jQuery not to set contentType
              
              success: function(response)
              {
                  alert('editado con exito');
                  tablaProgramacion.ajax.reload();
              }

    
            })      

      
      
    };
    //  ELIMINAR PROYECTO
    $(document).on("click","#btnEliminarProyecto",function()
    {
        fila= $(this).closest("tr");
            let id= parseInt(fila.find('td:eq(0)').text()); //tomamos el primero dato el 0 que se encuentra en esa fila en nuestro caso es el id
            $.ajax(
              {
                  url: "/proyecto/eliminar/"+id, 
                  type: "GET",
                  processData: false,   //tell jQuery not to process the data
                  contentType: false, //tell jQuery not to set contentType
                  
                  success: function(response)
                  {
                      alert('Proyecto Eliminado');
                      tablaProgramacion.ajax.reload();
                  }

        
              }) 

    });

    // AGREGAR NIVEL
    function AgregarNivel()
    {      
      var fr = new FormData(document.getElementById("formAgregarNivel"));
      $.ajax(
              {
                  url: "/agregar/nivel", 
                  type: "POST",
                  data: fr,   
                  processData: false,   //tell jQuery not to process the data
                  contentType: false, //tell jQuery not to set contentType
                  
                  success: function(response)
                  {
                      $("#txtNombreNivel").val("");
                      alert('Nivel Agregado');                      
                      tablaNiveles.ajax.reload();
                  }

        
              }) 

    };

    //  ELIMINAR NIVEL
    $(document).on("click","#btnEliminarNivel",function()
    {
        fila= $(this).closest("tr");
        let id= parseInt(fila.find('td:eq(0)').text()); //tomamos el primero dato el 0 que se encuentra en esa fila en nuestro caso es el id
            $.ajax(
              {
                  url: "/nivel/eliminar/"+id, 
                  type: "GET",
                  processData: false,   //tell jQuery not to process the data
                  contentType: false, //tell jQuery not to set contentType
                  
                  success: function(response)
                  {
                      alert('nivel Eliminado');
                      tablaNiveles.ajax.reload();
                  }

        
              }) 

    });




</script> 
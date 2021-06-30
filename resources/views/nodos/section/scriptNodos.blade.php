<script>
    // ver detalle del NODO
    let idNodo;
      $('.btnVer').click(function(e)
      {
        e.preventDefault();
        var datos = $(this).attr('datos');
        var equipos = $(this).attr('equipos');
        let dt=JSON.parse(datos);
        let eq=JSON.parse(equipos);

        // Lista de quipos
        let equiposArray=dt.equipo
        // Extraemos solo array con ids para ususarlo en el select2
        let array=equiposArray.map((equipo)=>equipo.id);

        idNodo=dt.id;

        $('#cardDetalle').show();
        $('#spanNombre').html(" "+dt.nombre);
        $('#spanUbicacion').html(" "+dt.direccion);
        $('#spanCoordenadas').html(" "+dt.coordenadas);
        $('#spanDescripcion').html(" "+dt.descripcion);
       
       console.log(array);
        $("#listado").html("");   //VACIAMOS EL DIV 
        var listado =document.getElementById("listado");
        eq.forEach(function(data,index)
        {
              var linea= document.createElement("li");                            
              var contenido= document.createTextNode(data.id+"- MAC:" +data.mac);
              listado.appendChild(linea);
              linea.appendChild(contenido);
        })
        // ELIMINAR NODO   
        $('#btnEliminar').click(function(e)
         {    
            // e.preventDefault();
                Swal.fire({
                  title: 'Estas Seguro?',
                  text: "Deseas Eliminar este Nodo?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si!'
                }).then((result) => {
                  if (result.isConfirmed) {

                    let ruta1 = "{{ route('nodoEliminar', 'req_id') }}" 
                    var ruta = ruta1.replace('req_id',idNodo)
                    $.ajax(
                      {
                        url: ruta, 
                        processData: false,   //tell jQuery not to process the data
                        contentType: false,    //tell jQuery not to set contentType
                          //a continuacion refrescar la tabla despues de un evento
                        success: function(response){              
                          Swal.fire({
                              icon: 'success',
                              title: 'Nodo Eliminado',
                              showConfirmButton: false,
                              timer: 700
                          }).then((result) => {
                              // redireccion con javascript
                              window.location.href = "/Crm/nodo/index";
                              //recargar página  jQuery
                              location.reload();
                          });
                          }
                    })  
                    
                  }
                })       
          
         });   
        //  BTN EDITAR NODO
         $('#btnEditar').click(function(e)
         {    
            $('#txtNombreEdit').val(dt.nombre);
            $('#txtUbicacionEdit').val(dt.direccion);
            $('#txtCoordenadasEdit').val(dt.coordenadas);
            $('#txtDescripcionEdit').val(dt.descripcion);  
            $('#selectEquiposEdit').val(array).trigger('change.select2');
         });
         
        //  ACTION EDITAR NODO
         $('#btnUpdate').click(function()
         {   
          var datosUpdate = new FormData(document.getElementById("formNodoUpdate")); 
          let ruta11 = "{{ route('nodoUpdate', 'req_id') }}" 
          var ruta2 = ruta11.replace('req_id',idNodo)
            $.ajax(
                {
                  url: ruta2, 
                  type: "POST",
                  data: datosUpdate,
                  processData: false,   //tell jQuery not to process the data
                  contentType: false,    //tell jQuery not to set contentType
                    //a continuacion refrescar la tabla despues de un evento
                  success: function(response){
                   
                    Swal.fire({
                              icon: 'success',
                              title: 'Cambios Guardados',
                              showConfirmButton: false,
                              timer: 700
                          }).then((result) => {
                              // redireccion con javascript
                              // window.location.href = "/Crm/nodo/index";
                              //recargar página  jQuery
                              location.reload();
                          });
                      
                        
                  }
              }) 
         });

      });
  </script>
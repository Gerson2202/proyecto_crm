{{--INICIO scroip para mostrar datos en el modal  --}}
<script>      
    var fila; //captura la fila en la que estoy
    $(document).on("click","#showModal",function(e)
    {
      
      fila= $(this).closest("tr");
      let id= parseInt(fila.find('td:eq(0)').text()); //tomamos el primero dato el 0 que se encuentra en esa fila en nuestro caso es el id
      //  alert(id);
      $.ajax(
      {
            url: "/programacion/ajax/show/"+id, 
            type: "GET",
            processData: false,   //tell jQuery not to process the data
            contentType: false,//tell jQuery not to set contentType
            
            success: function(programacion)
            {
                    $("#listado").html("");
                    $(".ShowTitulo").html(programacion.titulo);
                    $(".horaInicio").html(programacion.hora_inicial);
                    $(".horaFinal").html(programacion.hora_final);
                    $(".fecha").html(programacion.fecha);
                    $(".Mdescripcion").html(programacion.descripcion);
                    $(".Mdireccion").html(programacion.direccion);
                    // $(".Mpersonal").html(programacion.user.name);
                    $(".Mcliente").html(programacion.cliente.nombre);

                    
                      var listado =document.getElementById("listado");
                      programacion.users.forEach(function(data,index)
                      {
                        var linea= document.createElement("li");                            
                        var contenido= document.createTextNode(data.name+" ");
                        listado.appendChild(linea);
                        linea.appendChild(contenido);
                      })
              
            }
 
          })

    });
</script> 
<script>
    let id //GUARDAMOS EL ID
      $('#buscador').autocomplete(
      {
        source: function(request, response){
        
          $.ajax({
            url:"/search/clientes",
            dataType: 'json',
            data:{
              term: request.term
            },
            success: function(data){
            
              response(data);
            }
          });
        },
        // FUNCION CUANDO SELECCIONAMOS
        select: function (event, ui) {
              $('#buscador').val(ui.item.label); // AGREGAMOS EL NOMBRE AL INPUT
              id=(ui.item.value); //GUARDAMOS EL ID 
              return false;
        }
      });
      //  CUANDO DEMOS CLICK EN BUSCAR 
      $('.btnBuscar').click(function(){

        $('.btnBuscar').attr('href','/Crm/Clientes/ver/'+id);
      });
</script>
<script> 
          
  $('#facturas').DataTable({
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
  </script>
<script>
  let id;
  $('.btnEditar').click(function(){
    // alert('hola');
   var datos = $(this).attr('datos');
   console.log(datos);
   let dato =JSON.parse(datos);
   $('.txtCodigo').val(dato.codigo);
   $('.txtProveedor').val(dato.proveedor);
   $('.fecha').val(dato.fecha);
   $('.txtDescripcion').val(dato.descripcion);
   id=dato.id;      
  });

  // $('#btnAgregar').click(function(){
  //  $('#formFactura').attr('action','/Crm/Factura/update/'+id);
  //  this.submit();
  // });
  $('#formFactura').submit(function(e)
        {
         e.preventDefault();

         let ruta1 = "{{ route('facturaUpdate', 'req_id') }}" 
         var ruta = ruta1.replace('req_id',id)

         $('#formFactura').attr('action',ruta);
         this.submit();
                   
        });

    // Eliminar factura
    $('#btnEliminar').click(function()
         {    
            // e.preventDefault();
                Swal.fire({
                  title: 'Estas Seguro?',
                  text: "Deseas Eliminar Esta factura?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax(
                      {
                        url: "/Crm/Factura/delet/"+id, 
                        processData: false,   //tell jQuery not to process the data
                        contentType: false,    //tell jQuery not to set contentType
                          //a continuacion refrescar la tabla despues de un evento
                        success: function(response){              
                          Swal.fire({
                              icon: 'success',
                              title: 'Factura Eliminada',
                              showConfirmButton: false,
                              timer: 700
                          }).then((result) => {
                              // redireccion con javascript
                              window.location.href = "/Crm/Factura/list";
                              //recargar página  jQuery
                              location.reload();
                          });
                          }
                    })  
                    
                  }
                })       
          
         });  
</script>

 {{-- MENSAJE DE EXITO --}}
 @if (session('mensaje'))
 <script>
   toastr.success("{{session('mensaje')}}");
 </script>                
@endif
@error('codigo')
<script>
  toastr.error("El codigo Ya existe");
</script> 
@enderror
{{-- END MENSAJE DE EXITO --}}
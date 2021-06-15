{{-- codigo de fullcallendar --}}
<script>
    var calendar =null;
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

     calendar = new FullCalendar.Calendar(calendarEl,
      {
     
        locale: 'es',
        headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay' 

      },
     
     
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      
      // AL DAR CLICK AL CALENDARIO  VACIO
       select: function(arg)
        {
            let fecha = moment(arg.start).format("YYYY-MM-DD")
            let hora_inicial = moment(arg.start).format("HH:mm")           
            // let hora_final = moment(arg.end).format("HH:mm")          
            // console.log(hora_inicial,hora_final)         
            $("#fecha").val(fecha);
            $("#hora_inicial").val(hora_inicial);
            $("#tiempo").val("120");
            // $("#hora_final").val(hora_final);                    
            $("#modal-default").modal();
            calendar.unselect()
            // var title = prompt('Event Title:');
            // if (title) {
            //   calendar.addEvent({
            //     title: title,
            //     start: arg.start,
            //     end: arg.end,
            //     allDay: arg.allDay
            //   })
        // }         
        },
  
      // AL DAR CLICK A UNA PROGRAMACION HECHA
      eventClick: function(arg)
       {
          let users=arg.event.extendedProps.user_id;  //usuarios selecionados 
          // console.log(users);
          let ids=users.map((user)=>user.id);
          // console.log(ids);

        $('#txtUser_id').val(ids).trigger('change.select2'); // es la magia para dejarlos select recuerda vaciarlo
         $("#txtTitulo").val(arg.event.title);
         $("#txtFecha").val(arg.event.extendedProps.fecha);
         $("#txtHora_inicial").val(arg.event.extendedProps.hora_inicial);
         $("#txtCliente_id").val(arg.event.extendedProps.cliente_id).trigger('change.select2');
         $("#txtDescripcion").val(arg.event.extendedProps.descripcion);
         $("#txtDireccion").val(arg.event.extendedProps.direccion);
         $("#txtEstado").val(arg.event.extendedProps.estado);
         $("#txtId").val(arg.event.extendedProps.id);
         $("#txtHora_final").val(arg.event.extendedProps.hora_final);
         console.log(arg.event.extendedProps);
         $("#txtTareas").val(arg.event.extendedProps.tareas);
        
        // console.log(arg.event.title)
         $("#modal-3").modal();
        
        
       },
      editable: true,
      // llamar a un evento en este caso via ajax 
      events: {
        url: "{{route('programacionListar')}}",
        method: 'GET',
        
        failure: function() {
          alert('there was an error while fetching events!');
        },
       
      }
     
    });
    
    // cambiar el idioma
    calendar.setOption('locale','Es');
    calendar.render();
    

  })

  // vaciar los campos del modal una vex guarde se hizo solo esta function
  function limpiar()
   {
    $('#user_id').val(null).trigger('change');
    $('#cliente_id').val(null).trigger('change');
    $("#modal-default").modal('hide');    
    $("#fecha").val("");
    $("#hora_inicial").val("");
    $("#hora_final").val("");    
    $("#descripcion").val("");
    $("#direccion").val("");
    $("#titulo").val("");
   
   }
  // en esta funcion lo que hacemos es que le sumamos el timepo ala fecha y sacamos la hora final y lo enviamos por ajax al controlador 
  function guardar()
   {
      // let formulario =document.getElementById("formularioProgramacion"); iba a tomar el elemento con ese nombre
      var fd = new FormData(document.getElementById("formulario_programacion"));
      let fecha= $("#fecha").val();
      let hora= $("#hora_inicial").val();
      let tiempo= $("#tiempo").val();
      let hora_inicial= moment(fecha+" "+hora).format("HH:mm");
      let hora_final= moment(fecha+" "+hora).add(tiempo, 'minutes').format("HH:mm");
    
    fd.append("hora_inicial", hora_inicial);    
    fd.append("hora_final", hora_final);
    
    
    $.ajax(
      {
        url: "{{route('programacionStore')}}",
        type: "POST",
        data: fd,
        processData: false,  // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        // a continuacion refrescar la tabla despues de un evento
       success: function(response){
        // tablaProgramacion.ajax.reload();  //PARA QUE SE RECARGUE LA DATATBALE
        tablaProgramacioncola.ajax.reload();  
         }

      }).done(function (respuesta){
          if(respuesta && respuesta.ok)
          {
              calendar.refetchEvents();//para refrescar en la vista  FUNCTION DE CALLENDAR
              toastr.success("!!Programacion Agendada!!");
              limpiar(); //se activa la funcion limpiar
              // DataTable();  
             
          }else{
            alert("la agenda ya contiene la fecha seleccionada");
           }
        
      })      

      // 
  }
  // end guardar
  // inicio de mofificar
  function modificar()
  {
    var fd = new FormData(document.getElementById("programacionEdit"));
    let fecha= $("#txtFecha").val();
    let hora= $("#txtHora_inicial").val();
    let tiempo= $("#txtTiempo2").val();
    let id=$("#txtId").val();
    let titulo=$("#txtTitulo").val();
    
    let hora_inicial= moment(fecha+" "+hora).format("HH:mm");
    let hora_final= moment(fecha+" "+hora).add(tiempo, 'minutes').format("HH:mm");    
    //  console.log(hora);

    // fd.append("titulo", titulo);

    fd.append("hora_inicial", hora_inicial);  
    fd.append("hora_final", hora_final);
    //  alert(titulo);
    let ruta1 = "{{ route('programacionUpdate', 'req_id') }}" 
    var rutaM = ruta1.replace('req_id',id)
      $.ajax(
        {
        url: rutaM, 
        type: "POST",
        data: fd,
        processData: false,   //tell jQuery not to process the data
        contentType: false,//tell jQuery not to set contentType
        
        success: function(response){
        // tablaProgramacion.ajax.reload();
        tablaProgramacioncola.ajax.reload();  

         }

  
          }).done(function (respuesta){
            if(respuesta && respuesta.ok)
            {
              calendar.refetchEvents(); //para refrescar en la vista 
              toastr.success("!!Programacion Editada!!");
              $("#modal-3").modal('hide');             
              
            }
        })      

     
     
  }
  // end de modificar

  // inicio de eliminar
  // ACTIVACION DE ALERT2
  $('#btnEliminar').click(function()
         {    
                Swal.fire({
                  title: 'Estas Seguro?',
                  text: "Deseas Eliminar Esta Programacion?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si!'
                }).then((result) => {
                  if (result.isConfirmed) {
                   eliminar();
                  }
                })       
          
         })
        //  FUNCION ELIMINAR PROGRAMACION
  function eliminar()
  {
   
    let id=$("#txtId").val();
    let ruta11 = "{{ route('programacionDelete', 'req_id') }}" 
    var rutaE = ruta11.replace('req_id',id)
    $.ajax(
     {
      url: rutaE, 
      type: "GET",
      processData: false,   //tell jQuery not to process the data
      contentType: false, //tell jQuery not to set contentType
      success: function(response){
        // tablaProgramacion.ajax.reload();
        tablaProgramacioncola.ajax.reload();  

         }

 
     }).done(function (respuesta){
       if(respuesta && respuesta.ok){
          calendar.refetchEvents();//para refrescar en la vista 
          toastr.error("!!Programacion Eliminada!!");
          $("#modal-3").modal('hide');
          
       }
     })  

  }
  // END ELIMINAR


  
</script>
{{-- fin de script de fullcalendar --}}


       
    
   
   

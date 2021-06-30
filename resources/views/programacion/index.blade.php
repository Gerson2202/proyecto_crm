@extends('includes.dash')
@section('contenido')
{{-- <link rel="stylesheet" href="{{asset('vendor\select2-4.0.13\dist\css\select2.min.css')}}"> --}}
{{-- Link de fullcalendar --}}
<link rel="stylesheet" href="{{asset('vendor\lib\main.css')}}">
<link rel="stylesheet" href="{{asset('assets\vendor\fullcalendar\main.css')}}">

  
  {{-- codigo de mi pagina --}}

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fas fa-calendar-alt"></i> Programaciones </h1>
          </div>
          <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina Principal</a></li>
              <li class="breadcrumb-item nuevo"><a href="#">Nuevo</a></li>
            </ol> --}}
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
     
      <div class="container-fluid" >
        <div class="row">
          <div class="col-md-5">
            <div class="sticky-top mb-3">

              
              <!-- /.card -->
              {{-- PROGRAMACIONES EN COLA --}}
              <div class="card">
                <div class="card-header" style="background: white">
                  {{-- <h4 class="card-title" style="color: #2ebea4b9">Programaciones En cola</h4> --}}
                  <strong  style="color: #2ebea4b9">Programaciones En cola</strong>
                </div>
                <div class="card-body ">
                  <div class="table-responsive">
                    <TAble class="table table" id="programacionCola">
                      <thead >
                          <tr>
                              <th>Fecha</th>     
                              <th>Direccion</th>    
                              <th>Descripcion</th>                       
                            </tr>
                  
                      </thead>
                      <tbody >
                     </tbody>
                     
                     {{-- modal --}}
                     
                    </TAble>                   
                    
                  </div>
                  
                  <div id="external-events">
                                         
                  </div>

                </div>
              </div>  
              {{-- CARD TODAS LAS PROGRAMACIONES --}}
              
               {{-- <div class="card" id="cardTodas">
                  <div class="card-header">
                    <strong  style="color: #2ebea4b9">Programaciones Agendadas</strong>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"  title="Remove"><i class="fas fa-times"></i></button>      
                    </div>
                    </div>
                  <div class="card-body ">
                    <div class="table-responsive">
                      <TAble class="table table" id="programacion">
                        <thead >
                            <tr>
                                <th>Id </th>
                                <th>Titulo</th>                            
                              </tr>
                    
                        </thead>
                        <tbody >
                      </tbody>
                      </TAble>                   
                      
                    </div>
                    
                    <div id="external-events">
                                          
                    </div>

                  </div>
               </div>                --}}
             
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-7">
            <div class="card card-primary card-outline">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

    {{-- MODALES --}}
     @include('programacion.section.modales')
    {{-- END MODALES --}}     
    
      
   </section>
       
  </div>
  {{-- SCRPITS --}}
   {{-- INICIO DE SCRIPT PARA DATABLES --}}
   @include('includes.pluggin')
   <script src="{{asset('vendor\lib\main.js')}}"></script>
   {{-- para español --}}
   <script src="{{asset('vendor\lib\locales\es.js')}}"></script> 
   <script src="{{asset('vendor\moment.min.js')}}"></script>
 

    {{-- SELETC2 --}}
    <script>
       
      $("#cliente_id").select2({
      placeholder: "seleccionar cliente",
      theme: "classic",
      width: 'resolve',
      });

      $("#user_id").select2({
      placeholder: "seleccionar Personal",
      });

     //  MODIFICAR
      $("#txtCliente_id").select2({
      placeholder: "seleccionar cliente",
      theme: "classic",
      width: 'resolve',
      });

      $("#txtUser_id").select2({
      });
    </script> 
    
   {{-- codigo de fullcallendar --}}
    @include('programacion.section.fullCalendar') 
    {{-- fin de script de fullcalendar --}}


  {{-- TABLA PROGRAMACION--}}
   @include('programacion.section.datatables')
   
    {{--INICIO script para mostrar datos en el modal  --}}
   @include('programacion.section.modalDetalle')
    

   {{-- MODIFICACIONES DE CHECKBOX --}}
  <script>
    // PARA QUE SE CARGUEN DESAHBILITADOS
    $(document).ready(function(){
         $('#txtUser_id').attr('disabled',true);
         $("#txtTitulo").attr('disabled',true);
         $("#txtHora_inicial").attr('disabled',true);
         $("#txtCliente_id").attr('disabled',true);
         $("#txtDescripcion").attr('disabled',true);
         $("#txtDireccion").attr('disabled',true);
         $("#txtEstado").attr('disabled',true);
         $("#txtFecha").attr('disabled',true);
         $("#txtHora_final").attr('disabled',true);
    });
    //  1. AL CREAR NUEVA PROGRAMACION
    //  let activo=$('#checkCola[type=checkbox]').prop("checked",false);
    $('#checkCola').click(function(){
      if($('#checkCola').prop('checked')) {
        $('#cliente_id').attr('disabled',true);
        $('#hora_inicial').attr('disabled',true);
        $('#tiempo').attr('disabled',true);
        $('#user_id').attr('disabled',true);
        $('#cliente_id').attr('disabled',true);
        $('#descripcion').attr('placeholder','Posible Cliente');
     }else{
        $('#hora_inicial').attr('disabled',false);
        $('#tiempo').attr('disabled',false);
        $('#user_id').attr('disabled',false);
        $('#cliente_id').attr('disabled',false);
        $('#titulo').attr('placeholder','');
        
     }  
    }); 
    //  2. AL EDITAR UNA PROGRAMACION

    $('#checkEditar').click(function(){
      if($('#checkEditar').prop('checked')) {
        $('#txtUser_id').attr('disabled',false);
         $("#txtTitulo").attr('disabled',false);
         $("#txtHora_inicial").attr('disabled',false);
         $("#txtCliente_id").attr('disabled',false);
         $("#txtDescripcion").attr('disabled',false);
         $("#txtDireccion").attr('disabled',false);
         $("#txtEstado").attr('disabled',false);
         $("#txtFecha").attr('disabled',false);
         $("#txtHora_final").attr('disabled',false);
     }else{
      $('#txtUser_id').attr('disabled',true);
         $("#txtTitulo").attr('disabled',true);
         $("#txtHora_inicial").attr('disabled',true);
         $("#txtCliente_id").attr('disabled',true);
         $("#txtDescripcion").attr('disabled',true);
         $("#txtDireccion").attr('disabled',true);
         $("#txtEstado").attr('disabled',true);
         $("#txtFecha").attr('disabled',true);
         $("#txtHora_final").attr('disabled',true);
     }  
    });

  </script>
  {{-- BUSCADOR --}}
@include('includes.buscador')
    
@endsection
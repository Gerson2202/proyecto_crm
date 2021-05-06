 {{-- PANEL DE INFO --}}
 <div class="col-lg-4 col-12">
    <div class="card">
        <div class="card-header" style="background: white">
          @if ($ticket->active==1)
          <h4 style="color: #227d39" >{{$ticket->asunto}} <small id="txtIdMensaje" class="float-right">{{$ticket->id}}</small> </h4>
          @endif
          @if ($ticket->active==2)
          <h4 style="color: #da1c1c" >{{$ticket->asunto}} <small id="txtIdMensaje" class="float-right">{{$ticket->id}}</small> </h4>
          @endif
        </div>
        <div class="card-body">
          <p>
           
            <h6>Cliente: 
              <small class="txtClienteShow text-info"> {{$ticket->cliente->nombre}}</small>
            </h6>
            <hr> 
            @if ($ticket->tipologia!=null)
              <h6>Tipo: 
                <small class="txtTipoShow text-info"> {{$ticket->tipologia->nombre}}</small>
              </h6>
              <hr>
             @endif                                            
              
             {{-- EVITAR ERRORES DE NULOS --}}
             @if ($ticket->peticion!=null)
                <h6>Peticion: 
                  <small class="txtPeticionShow text-info"> {{$ticket->peticion->nombre}}</small>
                  <hr>
                </h6>                 
             @endif                                          
           
            
            <h6>Personal Encargado:  
             @if ($ticket->support_id!=null)
              <small class="txtPersonalEncargado text-info"> {{$ticket->userSuport->name}}</small>
             @else
              <small class="txtPersonalEncargado text-info"> NO ATENDIDO</small>
             @endif
              
            </h6>
            <hr>
            @if ($ticket->comentario!=null)
            <h6>Mensaje: 
              <small class="txtMensajeShow text-info">{{$ticket->comentario->contenido}}</small>
            </h6>
            <hr>   
            @else
            <h6>Mensaje: 
              <small class="txtMensajeShow text-info">Mensaje Eliminado</small>
            </h6>
            <hr>  
            @endif
                                      
            @if ($ticket->active<2)
            <a href="#" class="btn btn-success btn-sm" datos="{{$ticket}}" id="cambiarEstado">Cerrar Ticket</a>
            @else
            <a href="#" class="btn btn-danger btn-sm" datos="{{$ticket}}" id="cambiarEstado">Abrir Ticket</a> 
            @endif
            
            
          </p>

        </div>

    </div>
    
</div>
{{-- PANE CHAT --}}
<div class="col-lg-8 col-12">
    <div class="card direct-chat direct-chat-success">
        <div class="card-header card-success card-outline direct-chat-success">
          <h3 class="card-title"> <i class="fas fa-comments"></i>Chat</h3>           
          <div class="card-tools">
              <button type="button" class="btn btn-tool vaciarChat" idTicket="{{$ticket->id}}" id="vaciarChat" title="Vaciar Chat">
              <i class="fas fa-trash-alt"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <!-- Conversations are loaded here -->
          <div class="direct-chat-messages" id="cajaMensajes" >
            <!-- CUERPO DE MENSAJES  -->            
           
          </div>            
          <div class="card-footer">
            <form id="formMensaje">
                @csrf
              <div class="input-group">
                <input type="text" name="txtMensaje" id="txtMensaje" placeholder="escribe el mensaje"  class="form-control mensajito">
                <input type="hidden" name="txtId" id="txtId" value="{{$ticket->id}}" >
                <span class="input-group-append">
                  <button id="btnEnviar" class="btn btn-success">enviar</button>
                    {{-- <a id="btnEnviar" class="btn btn-success" href="#">enviar</a> --}}
                </span>
              </div>
            </form>
          </div>
      </div>
 </div>
 <hr>
 <div class="row">
   <div class="col-4">
     <h5>Comentarios</h5>
   </div>
   <div class="col-8">
     <select name="" class="form-control" style="width: 50%" id="selectComentario">
      <option value=""></option>
   @foreach ($comentarios as $item)
   <option value="{{$item->contenido}}">{{$item->nombre}}</option>
   @endforeach
  
 </select>
   </div>
 </div>
 
 
</div>

{{-- <div class="col-md-12">
  <!-- DIRECT CHAT SUCCESS -->
  <div class="card card-success card-outline direct-chat direct-chat-success">
    <!-- /.card-header -->
    <div class="card-body">
      <!-- Conversations are loaded here -->
      <div class="direct-chat-messages">
        <!-- Message. Default to the left -->
        <div class="direct-chat-msg">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-left">Alexander Pierce</span>
            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
          </div>
          <!-- /.direct-chat-infos -->
          <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image">
          <!-- /.direct-chat-img -->
          <div class="direct-chat-text">
            Is this template really for free? That's unbelievable!
          </div>
          <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->

        <!-- Message to the right -->
        <div class="direct-chat-msg right">
          <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right">Sarah Bullock</span>
            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
          </div>
          <!-- /.direct-chat-infos -->
          <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image">
          <!-- /.direct-chat-img -->
          <div class="direct-chat-text">
            You better believe it!
          </div>
          <!-- /.direct-chat-text -->
        </div>
        <!-- /.direct-chat-msg -->
      </div>
      <!--/.direct-chat-messages-->

     
      <!-- /.direct-chat-pane -->
    </div>
    <!-- /.card-footer-->
  </div>
  <!--/.direct-chat -->
</div>
<!-- /.col --> --}}
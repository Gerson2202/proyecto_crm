<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<div>
    <div class="container">
        <div class="form-group">  
              <form action="#" method="post" id="formMensaje">
                  @csrf
                <div class="input-group">
                  <input type="text" name="txtMensaje" id="txtMensaje" placeholder="escribe el mensaje" wire:model="nombre" class="form-control mensajito">
                             
                <input type="hidden" name="txtId" id="txtId" >              
                  <span class="input-group-append">
                      {{-- <a  class="btn btn-primary" wire:click="enviarMensaje" href="#">enviar</a> --}}
                      {{-- <button class="btn btn-success " wire:click="enviarMensaje">Enviar mensaje</button> --}}
                  </span>
                </div>  
                         
              </form>
              <button class="btn btn-success" wire:click="enviarMensaje">Enviar mensaje</button> 
            </div>
            <br>
            {{-- MENSAJE DE ALERTA --}}

            <div class="alert alert-success " id="alerta">
                {{-- <h5><i class="icon fas fa-check"></i> Alert!</h5> --}}
                  
            </div>
    
            
        </div>
        
      <script>
        $('#alerta').hide();
         window.livewire.on('mensajeEnviado', function(){
          alert("hola");
           setTimeout(function(){ $("#alerta").fadeOut("slow"); }, 30000);


         });
      </script>
      
    
    </div>
    
</div>


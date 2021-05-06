<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatForm extends Component
{
    public $nombre =0;
    public $mensaje;

    public function mount(){ //cuando se recargue 
        $this->nombre= 0;   
        $this->mensaje="";   
    }
  

    public function render()
    {

        return view('livewire.chat-form');
    }

    public function enviarMensaje(){
        $this->emit("mensajeEnviado");
    }
}

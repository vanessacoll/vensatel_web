<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChatForm extends Component
{
    public $nombre;
    public $message;

    public function mount()
    {
        $this->nombre = Auth::user()->name;
        $this->message = "";
    }

    public function render()
    {
        return view('livewire.chat-form');
    }

    public function enviarMensaje(){

      //  \App\Mensajes::create
    }
}

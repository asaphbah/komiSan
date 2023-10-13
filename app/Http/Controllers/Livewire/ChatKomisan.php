<?php

namespace App\Http\Controllers\Livewire;

use App\Models\Chat;
use App\Models\Message;
use Livewire\Component;

class ChatKomisan extends Component
{
    public $chat;
    public $messages;
    public $newMessage;
    
    public function mount($id){

        $this->messages = Message::where('chat_id', $id)->get();  // Use get() to retrieve the messages
        $this->chat = Chat::find($id);
    }
    public function render()
    {
        return view('livewire.chat-komisan');
    }
    public function store()
    {
        // Crie uma nova mensagem no banco de dados
        Message::create([
            'chat_id' => $this->chat->id,
            'user_id' => auth()->user()->id, // Assumindo que o usuário está autenticado
            'message' => $this->newMessage,
        ]);

        // Limpe o campo de nova mensagem após o envio
        $this->newMessage = '';

        // Recarregue as mensagens após o envio
        $this->messages = Message::where('chat_id', $this->chat->id)->get();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Request_artist;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function show($chat_id)
    {
        $request = Request_artist::find($chat_id);
        
        if (!$request) {
            return redirect()->route('user.home');
        }
    
        // Busque o chat correspondente a esse Request_artist
        $chat_view = Chat::where('request_id', $request->id)->first();
    
        if ($chat_view) {
            // Se o chat já existe, você pode redirecionar para a view 'komisan.chat' passando o chat_id
            return view('komisan.chat', compact('chat_view'));
        }
        
        // Se o chat não existe, crie um novo registro no modelo Chat
        $chat_view = Chat::create([
            'title' => $request->title,
            'request_id' => $request->id,
            'user_id' => $request->user_id,
            'artist_id' => $request->artist_id,
            'status' => $request->status,
        ]);
    
        // Redirecione para a view 'komisan.chat'
        return view('komisan.chat', compact('chat_view'));
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Resend;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResendRequest;
use App\Http\Requests\UpdateResendRequest;
use Illuminate\Http\Request;

class ResendController extends Controller
{
    public function store(Request $request)
    {
        // Valide os dados se necessário
        $validatedData = $request->validate([
            'resend' => 'required|max:255',
            'user_id' => 'required|integer',
            'artist_id' => 'required|integer',
            'request_id' => 'required|integer',
        ]);
    
        // Crie um novo Resend com os dados validados
        $resend = Resend::create($validatedData);
    
        // Redirecionar para a rota nomeada 'request.show' com o ID do novo Resend
        return redirect()->route('request.show', $resend->request_id);
    }
    
}

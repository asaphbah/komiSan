<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Request_artist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RequestController extends Controller
{
    public function create($artist){
        return view('komisan.forms.cadastroRequest', compact('artist'));
    }
    public function store(Request $request)
    {
        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'total_value' => $request->input('total_value'),
            'deadline' => $request->input('deadline'),
            'status' => 'P',
            'user_id' => $request->input('user_id'),
            'artist_id' => $request->input('artist_id'),
        ];
    
        if ($request->hasFile('reference_img')) {
            $extension = $request->file('reference_img')->getClientOriginalExtension();
            $fileName = Str::random(20) . '.' . $extension;
            $data['reference_img'] = $request->file('reference_img')->storeAs('referenc', $fileName);
        }
    
        Request_artist::create($data);
    
        return redirect()->route('user.home'); // Substitua 'sua_rota' pela rota para onde você deseja redirecionar após a criação do pedido
    }
    
    public function delete(){

    }
    public function show() {
        $view = 'X';
        return view('komisan.encomendas', compact( 'view'));
    }
    
    public function showUser() {
        $view = 'user';
        return view('komisan.encomendas', compact( 'view'));
    }
    
    public function showArtist() {
        $view = 'artist';
        return view('komisan.encomendas', compact( 'view'));
    }
}

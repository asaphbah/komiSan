<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function login(){
       return view('komisan.login');
    }
    public function auth(Request $request) {
        $request->validate([
            'username' => 'required',  // Alterado para 'username'
            'password' => 'required',
        ]);
        $credentials = [
            'username' => $request->input('username'),  // Alterado para 'username'
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->username == 'Komisan') {
                return redirect()->route('profile.komisan', ['username' => $request->input('username')]);
            }else{
                return redirect()->route('profile.komisan', ['username' => $request->input('username')]);
            }
        }

        return redirect()->route('user.login')->withErrors(['login_error' => 'username ou senha invalida']);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('user.login');
    }


    public function profile($username){
        $user = User::where('username', $username)->first();
        return view('komisan.profile', compact('user'));
    }
    public  function home(){
        /*mostra os artistas*/
        $artistas = User::where('artist', 1)->get();
        /*pega os artistas recomendados paa o usuario*/

         $usuarioLogado =  User::find(1);
        $tagsUsuarioLogado = $usuarioLogado->tags;

        $artistas_rec = User::whereHas('tags', function ($query) use ($tagsUsuarioLogado) {
            $query->whereIn('tag_id', $tagsUsuarioLogado->pluck('id'))->where('status', 'P');
        })->where('id', '!=', $usuarioLogado->id)->get();
        /*artistas mais virais*/    

    }
    public function post_create(){
        return view('komisan.forms.cadastroPost');
    }
    public function post_store(){


    }

}

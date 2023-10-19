<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Mail\EmailChecks;
use App\Models\Follower;
use App\Models\Tag;
use App\Models\tag_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //mostra tela de cadastro
    public function create_one(){
        return view('komisan.forms.cadastroUser-one');
    }
    //efetuar o store do cadastro
    public function store_one(UserCreateRequest $request){
        $validatedData = $request->validated(); // Obtém os dados validados da request

    // Criptografa a senha antes de salvar no banco de dados
    $validatedData['password'] = bcrypt($validatedData['password']);

    // Cria o usuário com os dados validados
    $user = User::create($validatedData);

    Mail::to($user->email, $user->username)->send(new EmailChecks(['name'=> 'Komisan',
    'email' => 'asaphmendesdeoliveira@gmail.com', 'id' => $user->id,
]));

    // Redireciona para a próxima etapa com o ID do usuário
    return redirect()->route('user.create.two', ['id' => $user->id]);
    }   
    public function email(Request $request){
        Mail::to('asaphmendesdeoliveira@gmail.com', 'Asaph')->send(new EmailChecks(['
        name'=> $request->name,
        'email' => $request->email
    ]));
    }
   //mostra tela da segunda etapa
    public function create_two(int $id)
    {  
        $tags = Tag::all(); 
        $user = User::find($id);
        return view('komisan.forms.cadastroUser-two', compact('tags', 'user'));
    }
    //efetua o store da segunda etapa
    public function store_two(Request $request){

        $user = User::find($request->input('user_id'));
        $validator = Validator::make($request->all(), [
            'tags' => 'array',
            'tags.*' => 'exists:tags,id', 
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.create.two', ['id' => $user->id])->withErrors($validator)->withInput();
        }

        $user = User::find($request->input('user_id'));
        $tagIds = $request->input('tags', []);
        foreach ($tagIds as $tagId) {
            tag_user::create([
                'user_id' => $user->id,
                'tag_id' => $tagId,
                'status' => 0
            ]);
        }

    return redirect()->route('user.create.three', ['id' => $user->id]);
    }
    public function create_three(int $id)
    {
       $user = User::find($id);
       return view('komisan.forms.cadastroUser-three', compact('user'));
    }
    public function store_three(UserUpdateRequest $request){
        $user = User::find($request->input('user_id'));
        $artist = $request->has('artist') ? true : false;

        $user->update([
            'bio' => $request->input('bio'),
            'artist' => $artist,
        ]);
    
        // Upload da imagem de capa, se fornecida
        if ($request->hasFile('img_user')) {
            $extension = $request->file('img_user')->getClientOriginalExtension();
            $fileName = Str::random(20) . '.' . $extension; // Gera um nome aleatório para o arquivo
            $data['img_user'] = $request->file('img_user')->storeAs('users', $fileName);
            $user->update(['img_user' => $data['img_user']]);
        }
        
        // Upload da imagem de perfil, se fornecida
        if ($request->hasFile('img_cover')) {
            $extension = $request->file('img_cover')->getClientOriginalExtension();
            $fileName = Str::random(20) . '.' . $extension; // Gera um nome aleatório para o arquivo
            $data['img_cover'] = $request->file('img_cover')->storeAs('users/cover', $fileName);
            $user->update(['img_cover' => $data['img_cover']]);
        }
        return view('komisan.login');
    }
    public function follower(int $user_id,int $follower_id){
        if ($user_id === $follower_id) {
            return redirect()->back();
        }

        Follower::create([
            'follower' => $follower_id,
            'following' => $user_id,
        ]);
    
        return redirect()->back();
    }
    public function unfollow(int $follower_id, int $following_id){

        if ($follower_id === $following_id) {
            return redirect()->back();
        }
        Follower::where('follower', $follower_id)
            ->where('following', $following_id)
            ->delete();

        return redirect()->back();
    }
    public function artist(){
        $users = User::where('artist', 1)->get();

        return view('komisan.home', compact('users'));
    }
}

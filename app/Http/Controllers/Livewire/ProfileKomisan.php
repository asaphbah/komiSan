<?php

namespace App\Http\Controllers\Livewire;

use App\Models\Like;
use App\Models\Post_Favorites;
use App\Models\User;
use Livewire\Component;

class ProfileKomisan extends Component
{
    public $posts;
    public $user;
//fazer com que quando eu entre na tela de profile ele passe o id de usuario pra ca pra eu ter acesso ao usuario por aqui tambem
    public function mount($user_id)
    {
        $this->user = User::find($user_id);
        $this->posts = $this->user->posts;
    }
    public function render()
    {
        return view('livewire.profile-komisan');
    }
    public function section(){

    }
    public function myPosts(){
        $this->posts = $this->user->posts;
    }
    public function likesPosts(){
        $this->posts = $this->user->likes()->with('post')->get()->pluck('post');
    }
    public function favoritPosts(){
        $this->posts = $this->user->favoritPosts()->with('post')->get()->pluck('post');
    }
    public function save($post_id){
        Post_Favorites::create([
            'user_id' => auth()->user()->id,
            'post_id'=> $post_id,
        ]);
    }
    public function like($post_id)
    {
        $user_id = auth()->id();
    
        if (!$user_id) {
            // Usuário não autenticado, não é possível curtir
            return;
        }
    
        $existingLike = Like::where('user_id', $user_id)
                            ->where('post_id', $post_id)
                            ->first();
    
        if (!$existingLike) {
            Like::create([
                'user_id' => $user_id,
                'post_id' => $post_id,
            ]);
        }
    
      
    }
    
    public function unliked($post_id)
    {
        $user_id = auth()->id();
    
        if (!$user_id) {
            return;
        }
    
        Like::where('user_id', $user_id)
            ->where('post_id', $post_id)
            ->delete();
    
        
    }
}

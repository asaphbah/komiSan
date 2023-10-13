<?php

namespace App\Http\Controllers\Livewire;

use App\Models\Like;
use App\Models\Post;
use App\Models\Post_Favorites;
use Livewire\Component;

class PostUnicoLike extends Component
{
    public $post;
    public function mount($post_id){
        $this->post = Post::find($post_id);
    }
    public function render()
    {
        return view('livewire.post-unico-like');
    }
    public function save($post_id){
        Post_Favorites::create([
            'user_id' => auth()->user()->id,
            'post_id'=> $post_id,
        ]);
    }
    public function like($post_id)
    {
        $user_id = auth()->user()->id;
    
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
        $user_id = auth()->user()->id;
    
        if (!$user_id) {
            return;
        }
    
        Like::where('user_id', $user_id)
            ->where('post_id', $post_id)
            ->delete();   
    }
}  

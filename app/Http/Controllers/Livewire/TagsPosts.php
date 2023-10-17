<?php

namespace App\Http\Controllers\Livewire;

use App\Models\Like;
use App\Models\Tag;
use Livewire\Component;

class TagsPosts extends Component
{
    public $tag;
    public $posts;

    public function mount($tag){
        $this->tag = $tag;
       $tag_posts = Tag::where('tag', $tag)->first();
       $this->posts = $tag_posts->posts;
    }
    public function render()
    {
        return view('livewire.tags-posts');
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

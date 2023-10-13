<?php

namespace App\Http\Controllers\Livewire;

use App\Models\Like;
use App\Models\Post;
use App\Models\Post_Favorites;
use Livewire\Component;

class FeedPostUnico extends Component
{
    public $post_relacionados;

    public function mount($id)
    {
        $post = Post::find($id);
        $this->post_relacionados = Post::whereHas('tags', function ($query) use ($post) {
            return $query->whereIn('tags.id', $post->tags->pluck('id'));
        })
        ->where('id', '!=', $post->id)
        ->take(10)
        ->get();
    }
    public function render()
    {
        return view('livewire.feed-post-unico');
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

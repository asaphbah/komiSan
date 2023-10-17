<?php

namespace App\Http\Controllers\Livewire;

use App\Models\Like;
use App\Models\Post;
use App\Models\Post_Favorites;
use App\Models\User;
use Livewire\Component;

class ExplorarKomisan extends Component
{
    public $posts;

    public function mount()
    {
      $this->posts = Post::all();
    }
    public function render()
    {
        return view('livewire.explorar-komisan');
    }
    public function postsForYou()
{
    $userTags = auth()->user()->tags;

    $tagIds = $userTags->pluck('id'); // Simplificando a obtenção dos IDs das tags do usuário

    $posts_relacionados = Post::whereHas('tags', function ($query) use ($tagIds) {
            $query->whereIn('tags.id', $tagIds);
        })->get();

    $this->posts = $posts_relacionados; // Corrigindo a atribuição para $this->posts
}
    public function postsViral(){

        $posts = Post::withCount('likes')
        ->orderBy('likes_count', 'desc')
        ->get();

        $this->posts = $posts;
    }
    public function postsFollowers(){
    $followerIds = auth()->user()->following->pluck('following');
    $posts = Post::whereIn('user_id', $followerIds)
                ->orderBy('created_at', 'desc')
                ->get();

    $this->posts = $posts;
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
        $user_id = auth()->user()->id;
    
        if (!$user_id) {
            return;
        }
    
        Like::where('user_id', $user_id)
            ->where('post_id', $post_id)
            ->delete();
    
        
    }
}

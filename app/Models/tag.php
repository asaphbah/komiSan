<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tag extends Model
{
    protected $fillable = ['tag'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'tag_users', 'tag_id', 'user_id');
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags');
    }
    public function userTags()
    {
        return $this->hasMany(UserTag::class);
    }

    public function postTags()
    {
        return $this->hasMany(PostTag::class);
    }
    public function imgTag()
{
    $post = $this->posts()->orderBy('created_at')->first(); 
    return $post ? $post->img_post : null; 
}
public function isUserRelatedToTag()
{
    $user = auth()->user(); // Obtém o usuário autenticado

    if ($user) {
        return $this->users()->where('user_id', $user->id)->first();
    }

    return false;
}

}
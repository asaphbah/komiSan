<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'tag_user', 'tag_id', 'user_id');
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
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_Tag extends Model
{
    protected $table = 'post_tags';
    protected $fillable = ['post_id', 'tag_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostOfFolder extends Model
{
    protected $fillable = ['folder_id', 'post_id'];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = ['title', 'description', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_of_folders');
    }
}

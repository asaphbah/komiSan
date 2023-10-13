<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'comentario',
        'img_post',
    ];

    /**
     * Define the relationship between the Post and User models.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
    }
    public function likeUser(){
        return $this->hasMany(Like::class)->where('user_id', auth()->user()->id);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }
    public function likeCount()
    {
        return $this->hasMany(Like::class, 'post_id')->selectRaw('count(*) as count')->groupBy('post_id');
    }
     public static function getByTags(array $tagIds)
    {
        return static::whereHas('tags', function ($query) use ($tagIds) {
            $query->whereIn('id', $tagIds);
        })->get();
    }
    public function favorite()
    {
        return $this->hasOne(Post_Favorites::class);
    }
}

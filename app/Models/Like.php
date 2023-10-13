<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'user_id',
    ];

    /**
     * Define the relationship between the Like and Post models.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Define the relationship between the Like and User models.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

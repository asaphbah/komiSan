<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'follower',
        'following',
    ];

    /**
     * Define the relationship between the Follower and User models.
     *
     * This defines the "follower" and "following" relationships between users.
     */
    public function followerUser()
    {
        return $this->belongsTo(User::class, 'follower', 'id');
    }

    public function followingUser()
    {
        return $this->belongsTo(User::class, 'following', 'id');
    }
}

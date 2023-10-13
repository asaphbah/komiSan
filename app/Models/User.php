<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth',
        'username',
        'img_cover',
        'img_user',
        'bio',
        'artist',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth' => 'date', // Cast 'birth' as a date
        'artist' => 'boolean', // Cast 'artist' as a boolean
    ];
    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }
    public function postCount()
    {
        return $this->posts()->count();
    }
    public function likes()
    {
        return $this->hasMany(Like::class, 'user_id');
    }
    
    public function assessmentsAsArtist()
    {
        return $this->hasMany(Assessment::class, 'artist_id');
    }
    
    public function assessmentsAsClient()
    {
        return $this->hasMany(Assessment::class, 'client_id');
    }
    
    public function requestsAsUser()
    {
        return $this->hasMany(RequestArtist::class, 'user_id');
    }
    
    public function requestsAsArtist()
    {
        return $this->hasMany(RequestArtist::class, 'artist_id');
    }
    public function followers()
    {
        return $this->hasMany(Follower::class, 'following', 'id');
    }

    public function following()
    {
        return $this->hasMany(Follower::class, 'follower', 'id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_users', 'user_id', 'tag_id');
    }
    public function artistTags()
    {
        return $this->belongsToMany(Tag::class, 'tag_users', 'user_id', 'tag_id')->where('status', 'P');
    }
  
    public function averageRating()
    {
        $assessments = $this->assessmentsAsArtist;
    
        if ($assessments->isEmpty()) {
            return 0;
        }
    
        $totalRating = 0;
        foreach ($assessments as $assessment) {
            $totalRating += $assessment->rating;
        }
    
        return $totalRating / $assessments->count();
    }
    public function followerAuth()
    {
        return $this->hasMany(Follower::class, 'following', 'id')
            ->where('follower', auth()->user()->id);
    }
    public function favoritPosts()
    {
        return $this->hasMany(Post_Favorites::class);
    }
    
}

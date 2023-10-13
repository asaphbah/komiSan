<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'request_id',
        'user_id',
        'artist_id',
        'status',
    ];

    public function request()
    {
        return $this->belongsTo(Request::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function artist()
    {
        return $this->belongsTo(User::class, 'artist_id', 'id');
    }
    
}

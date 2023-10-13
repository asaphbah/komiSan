<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resend extends Model
{
    use HasFactory;

    protected $fillable = [
        'resend',
        'user_id',
        'artist_id',
        'request_id'
    ];

    public function request()
    {
        return $this->belongsTo(Request_artist::class, 'request_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function artist()
    {
        return $this->belongsTo(User::class, 'artist_id');
    }
}

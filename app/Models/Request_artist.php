<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'total_value',
        'deadline',
        'status',
        'reference_img',
        'user_id',
        'artist_id',
    ];
    protected $attributes = [
        'status' => 'P',
    ];
    public function artist()
    {
        return $this->belongsTo(User::class, 'artist_id');
    }
    
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
    public function resend()
    {
        return $this->hasOne(Resend::class, 'request_id');
    }
    
}

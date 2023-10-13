<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'request_id',
        'client_id',
        'rating',
        'assessment_type',
        'comment',
    ];

    public function artist()
    {
        return $this->belongsTo(User::class, 'artist_id');
    }
    
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
    
}

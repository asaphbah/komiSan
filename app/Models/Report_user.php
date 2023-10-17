<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report_User extends Model
{
    use HasFactory;
    protected $table = 'report_users';
    protected $fillable = [
        'report_text', 'user_id', 'reported_user_id'
    ];

    public function reportingUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reportedUser()
    {
        return $this->belongsTo(User::class, 'reported_user_id');
    }
}

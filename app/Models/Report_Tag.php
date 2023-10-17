<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report_Tag extends Model
{
    use HasFactory;
    protected $table = 'report_tags';

    protected $fillable = [
        'report_text', 'user_id', 'tag_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}

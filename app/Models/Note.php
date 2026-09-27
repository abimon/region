<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'user_id',
        'lesson_id',
        'title',
        'content',
        'status',
    ];
}

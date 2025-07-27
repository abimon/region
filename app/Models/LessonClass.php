<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonClass extends Model
{
    protected $fillable =[
        'title',
        'description',
        'facilitator',
        'date',
        'venue',
        'comments',
        'created_by'
    ];
}

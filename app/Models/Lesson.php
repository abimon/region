<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title',
        'category',
        'instructor_id',
        'content',
        'image',
        'slug',
        'isPublished',
    ];
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }
}

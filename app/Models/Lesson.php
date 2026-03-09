<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'class_id',
        'title',
        'description',
        'instructor',
        'date',
        'venue',
        'venue_type',
        'content',
        'status',
        'content_type',
        'comments',
        'created_by'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

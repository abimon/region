<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assigment extends Model
{
    protected $fillable = [
        'title',
        'description',
        'due_by',
        'class_id',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

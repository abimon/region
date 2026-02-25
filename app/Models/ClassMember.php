<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassMember extends Model
{
    protected $fillable = [
        'church_class_id',
        'user_id',
        'role',
        'status'
    ];
}

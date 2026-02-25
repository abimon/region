<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChurchClass extends Model
{
    protected $fillable = [
        'church_id',
        'class_name'
    ];
}

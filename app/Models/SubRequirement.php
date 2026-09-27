<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubRequirement extends Model
{
    protected $table= 'sub_requirements';
    protected $fillable = [
        "requirement_id",
        "description",
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'user_id',
        'description',
        'type',
        'icon',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}

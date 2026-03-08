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
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'user_id','id');
    }
}

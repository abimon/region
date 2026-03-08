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
    public function church_class()
    {
        return $this->belongsTo(ChurchClass::class, 'church_class_id','id');
    }
}

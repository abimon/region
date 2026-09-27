<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassMember extends Model
{
    protected $fillable = [
        'church_id',
        'user_id',
        'class',
        'role',
        'status'
    ];
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'user_id','id');
    }
    public function church()
    {
        return $this->belongsTo(Church::class, 'church_id','id');
    }
    public function member()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}

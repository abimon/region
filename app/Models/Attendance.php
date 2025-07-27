<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
            'user_id',
            'lesson_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function lesson(){
        return $this->belongsTo(LessonClass::class,'lesson_id','id');
    }
}

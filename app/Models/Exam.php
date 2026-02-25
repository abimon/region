<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'user_id',
        'church_id',
        'church_heritage',
        'bible_truth',
        'general_knowledge',
        'logged_by'
    ];
    public  function student(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function admin(){
        return $this->belongsTo(User::class,'logged_by','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'requirement_id',
        'student_id',
        'src_url',
        'assessor_id',
        'comment',
        'status'
    ];
    public function requirement()
    {
        return $this->belongsTo(ClubRequirement::class, 'requirement_id');
    }
    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }
    public function assessor()
    {
        return $this->belongsTo(User::class, 'assessor_id');
    }
}

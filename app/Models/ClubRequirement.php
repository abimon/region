<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClubRequirement extends Model
{
    protected $table = 'club_requirements';
    protected $fillable = [
        'club',
        'title',
        'description',
    ];

    public function subrequirements(){
        return $this->hasMany(SubRequirement::class, 'requirement_id');
    }
}

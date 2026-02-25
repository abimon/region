<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mreq extends Model
{
    protected $fillable = [
        'type', //membership or leadership
        'description',
        'church_id',
        'status',
    ];
    public function church()
    {
        return $this->belongsTo(Church::class);
    }

}

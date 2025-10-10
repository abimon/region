<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    protected $fillable = [
        'name',
        'district',
        'station',
        'conference',
        'union',
        'division',
        'email',
        'phone',
        'is_approved',
    ];
    public function members()
    {
        return $this->hasMany(User::class, 'institution','name');
    }
}

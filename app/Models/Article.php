<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'category',
        'author_id',
        'content',
        'image',
        'slug',
        'isPublished',
    ];
    public function author(){
        return $this->belongsTo(User::class,'author_id','id');
    }
}

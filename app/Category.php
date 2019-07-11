<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'colour'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getPostCountAttribute()
    {
        return $this->posts->count();
    }
}

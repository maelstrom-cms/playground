<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getPostCountAttribute()
    {
        return $this->posts->count();
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtolower($value);
    }
}

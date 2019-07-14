<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Author extends Model
{
    protected $fillable = [
        'name',
        'avatar',
        'biography',
        'website',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getPostCountAttribute()
    {
        return $this->posts->count();
    }

    public function getAvatarUrlAttribute()
    {
        return Storage::disk('avatars')->url($this->getAttribute('avatar'));
    }

}

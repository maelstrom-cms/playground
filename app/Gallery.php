<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Gallery extends Model
{
    protected $fillable = [
        'name',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getPostCountAttribute()
    {
        return $this->posts->count();
    }

    public function getImageCountAttribute()
    {
        $items = Arr::wrap($this->items);

        return count($items);
    }

}

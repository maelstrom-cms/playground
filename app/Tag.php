<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public static function createIfNeeded($tag_id)
    {
        if (static::where('id', $tag_id)->count()) {
            return $tag_id;
        }

        $tag = static::create(['name' => $tag_id]);

        return $tag->getKey();
    }

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

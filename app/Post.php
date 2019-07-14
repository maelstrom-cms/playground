<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'body',
        'gallery_id',
        'category_id',
        'author_id',
        'rating',
        'is_featured',
        'featured_headline',
        'featured_image',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function getTagIdsAttribute()
    {
        return $this->tags->pluck('id');
    }

    public function getTagNamesAttribute()
    {
        return $this->tags->pluck('name');
    }
}

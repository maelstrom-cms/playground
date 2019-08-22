<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    protected $fillable = [
        'description',
        'keywords',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

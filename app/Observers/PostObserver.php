<?php

namespace App\Observers;

use App\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the post "creating" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function creating(Post $post)
    {
        $post->setAttribute('slug', Str::slug($post->getAttribute('name')));
    }
}

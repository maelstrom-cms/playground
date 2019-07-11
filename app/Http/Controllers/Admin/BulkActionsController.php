<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use App\Author;
use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BulkActionsController extends Controller
{
    public function __invoke(Request $request)
    {
        $type = $request->segment(3);

        if (method_exists($this, $type)) {
            return $this->execute($type);
        }

        throw new \InvalidArgumentException($type . ' is not a valid panel.');
    }

    private function categories()
    {
        return Category::class;
    }

    private function tags()
    {
        return Tag::class;
    }

    private function authors()
    {
        return Author::class;
    }

    private function posts()
    {
        return Post::class;
    }

    private function galleries()
    {
        return Gallery::class;
    }

    private function execute($type)
    {
        $panel = maelstrom($this->{$type}());

        $panel->handleBulkActions();

        return $panel->redirect('index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * @var \Maelstrom\Panel
     */
    private $panel;

    public function __construct()
    {
        $this->panel = maelstrom(Post::class)
            ->setEagerLoad(['category', 'tags'])
            ->setRelationships(['tag_ids' => 'tags'])
            ->setWithAttributes(['tag_names', 'category.admin_url']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->panel->setTableHeadings([
            [
                'label' => 'Featured',
                'dataIndex' => 'is_featured',
                'type' => 'BooleanColumn',
                'width' => '150px',
                'align' => 'center',
            ],
            [
                'label' => 'Name',
                'dataIndex' => 'name',
                'type' => 'EditLinkColumn',
                'searchable' => true,
                'sortable' => true,
            ],
            [
                'label' => 'Rating',
                'dataIndex' => 'rating',
                'align' => 'center',
            ],
            [
                'label' => 'Category',
                'type' => 'TextLinkColumn',
                'labelIndex' => 'category.name',
                'dataIndex' => 'category.admin_url',
                'newTab' => true,
            ],
            [
                'label' => 'Tags',
                'dataIndex' => 'tag_names',
                'type' => 'TagsColumn',
            ],
        ]);

        return $this->panel->index('admin.post-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->panel->create('admin.post-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws \ReflectionException
     */
    public function store(Request $request)
    {
        $this->createTags($request);

        $this->panel->store('Post created.');

        return $this->panel->redirect('edit');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function show(Post $post)
    {
        $this->panel->setEntry($post);

        return $this->panel->redirect('edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post)
    {
        $this->panel->setEntry($post);

        return $this->panel->edit('admin.post-form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     * @return Response
     * @throws \ReflectionException
     */
    public function update(Request $request, Post $post)
    {
        $this->panel->setEntry($post);

        $this->createTags($request);

        $this->panel->update('Post updated.');

        return $this->panel->redirect('edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $this->panel->setEntry($post);

        $this->panel->destroy(
            $post->exists() ? 'Post deleted.' : 'Post restored.'
        );

        return $this->panel->redirect('edit');
    }

    private function createTags(Request $request)
    {
        $request->merge(['tag_ids' => array_map(function ($tag) {
            return Tag::createIfNeeded($tag);
        }, $request->get('tag_ids', []))]);
    }
}

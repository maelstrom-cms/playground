<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest as Request;

class TagController extends Controller
{
    /**
     * @var \Maelstrom\Panel
     */
    private $panel;

    public function __construct()
    {
        $this->panel = maelstrom(Tag::class)
            ->setEagerLoad(['posts'])
            ->setRelationships(['posts' => 'posts'])
            ->setWithAttributes(['post_count']);
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
                'label' => 'Name',
                'dataIndex' => 'name',
                'type' => 'EditLinkColumn',
                'searchable' => true,
                'sortable' => true,
            ],
            [
                'label' => 'Post count',
                'dataIndex' => 'post_count',
                'align' => 'center',
            ],
        ]);

        return $this->panel->index('admin.tag-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->panel->create('admin.tag-form');
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
        $this->panel->store('Tag created.');

        return $this->panel->redirect('edit');
    }

    /**
     * Display the specified resource.
     *
     * @param Tag $tag
     * @return Response
     */
    public function show(Tag $tag)
    {
        $this->panel->setEntry($tag);

        return $this->panel->redirect('edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     * @return Response
     */
    public function edit(Tag $tag)
    {
        $this->panel->setEntry($tag);

        return $this->panel->edit('admin.tag-form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Tag $tag
     * @return Response
     * @throws \ReflectionException
     */
    public function update(Request $request, Tag $tag)
    {
        $this->panel->setEntry($tag);

        $this->panel->update('Tag updated.');

        return $this->panel->redirect('edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return Response
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        $this->panel->setEntry($tag);

        $this->panel->destroy('Tag deleted.');

        return $this->panel->redirect('index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest as Request;

class GalleryController extends Controller
{
    /**
     * @var \Maelstrom\Panel
     */
    private $panel;

    public function __construct()
    {
        $this->panel = maelstrom(Gallery::class)
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

        return $this->panel->index('admin.gallery-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->panel->create('admin.gallery-form');
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
        $this->panel->store('Gallery created.');

        return $this->panel->redirect('edit');
    }

    /**
     * Display the specified resource.
     *
     * @param Gallery $gallery
     * @return Response
     */
    public function show(Gallery $gallery)
    {
        $this->panel->setEntry($gallery);

        return $this->panel->redirect('edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gallery $gallery
     * @return Response
     */
    public function edit(Gallery $gallery)
    {
        $this->panel->setEntry($gallery);

        return $this->panel->edit('admin.gallery-form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Gallery $gallery
     * @return Response
     * @throws \ReflectionException
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->panel->setEntry($gallery);

        $this->panel->update('Gallery updated.');

        return $this->panel->redirect('edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Gallery $gallery
     * @return Response
     * @throws \Exception
     */
    public function destroy(Gallery $gallery)
    {
        $this->panel->setEntry($gallery);

        $this->panel->destroy('Gallery deleted.');

        return $this->panel->redirect('index');
    }
}

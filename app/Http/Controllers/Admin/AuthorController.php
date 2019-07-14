<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthorRequest as Request;

class AuthorController extends Controller
{
    /**
     * @var \Maelstrom\Panel
     */
    private $panel;

    public function __construct()
    {
        $this->panel = maelstrom(Author::class)
            ->setEagerLoad(['posts'])
            ->setRelationships(['posts' => 'posts'])
            ->setWithAttributes(['post_count', 'avatar_url'])
            ->setUploadables([
                'avatar' => ['disk' => 'avatars'],
            ]);
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
                'label' => 'Avatar',
                'dataIndex' => 'avatar_url',
                'type' => 'ImageColumn',
                'align' => 'center',
                'width' => '150px',
            ],
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

        return $this->panel->index('admin.author-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->panel->create('admin.author-form');
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
        $this->panel->store('Author created.');

        return $this->panel->redirect('edit');
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return Response
     */
    public function show(Author $author)
    {
        $this->panel->setEntry($author);

        return $this->panel->redirect('edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author $author
     * @return Response
     */
    public function edit(Author $author)
    {
        $this->panel->setEntry($author);

        return $this->panel->edit('admin.author-form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Author $author
     * @return Response
     * @throws \ReflectionException
     */
    public function update(Request $request, Author $author)
    {
        $this->panel->setEntry($author);

        $this->panel->update('Author updated.');

        return $this->panel->redirect('edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return Response
     * @throws \Exception
     */
    public function destroy(Author $author)
    {
        $this->panel->setEntry($author);

        $this->panel->destroy('Author deleted.');

        return $this->panel->redirect('index');
    }
}

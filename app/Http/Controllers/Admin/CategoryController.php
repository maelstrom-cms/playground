<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * @var \Maelstrom\Panel
     */
    private $panel;

    public function __construct()
    {
        $this->panel = maelstrom(Category::class)
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

        return $this->panel->index('admin.category-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->panel->create('admin.category-form');
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
        $this->panel->store('Category created.');

        return $this->panel->redirect('edit');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        $this->panel->setEntry($category);

        return $this->panel->redirect('edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        $this->panel->setEntry($category);

        return $this->panel->edit('admin.category-form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     * @throws \ReflectionException
     */
    public function update(Request $request, Category $category)
    {
        $this->panel->setEntry($category);

        $this->panel->update('Category updated.');

        return $this->panel->redirect('edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $this->panel->setEntry($category);

        $this->panel->destroy('Category deleted.');

        return $this->panel->redirect('index');
    }
}

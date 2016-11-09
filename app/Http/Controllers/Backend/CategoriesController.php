<?php

namespace cms\Http\Controllers\Backend;

use cms\Categories;
use Illuminate\Http\Request;
use cms\Http\Requests;

class CategoriesController extends Controller
{
    protected $category;

    public function __construct(Categories $category)
    {
        $this->category = $category;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->all();

        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Categories $category)
    {
        $parents = $this->getParent();
        return view('backend.categories.form', compact('category', 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreCategoryRequest $request)
    {
        $category = $this->category->create($request->only('name', 'parent_id', 'has_child', 'position', 'active', 'hidden'));

        return redirect(route('backend.categories.index'))->with('status', 'Category has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        $parents = $this->getParent();

        return view('backend.categories.form', compact('category','parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateCategoriesRequest $request, $id)
    {
        $category = $this->category->findOrFail($id);

        if ($response = $this->updateCategoryOrder($category, $request)) {
            return $response;
        }

        $category->fill($request->only('name', 'parent_id', 'has_child', 'position', 'active', 'hidden'))->save();

        return redirect(route('backend.categories.edit', $category->id))->with('status', 'Category has been updated.');
    }

    public function confirm($id)
    {
        $category = $this->category->findOrFail($id);

        return view('backend.categories.confirm', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->findOrFail($id);

        $category->delete();

        return redirect(route('backend.categories.index'))->with('status', 'Category has been deleted.');
    }

    protected function getParent()
    {
        $categories = $this->category->all();
        $arrParent = array('0' => '');
        if(count($categories)>0){
            foreach ($categories as $category){
                if($category['has_child']==1){
                    array_push($arrParent, $category['name']);
                }

            }
        }

        return $arrParent;
    }

}
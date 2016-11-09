<?php

namespace cms\Http\Controllers\Backend;

use cms\Product;
use cms\Categories;
use Illuminate\Http\Request;
use cms\Http\Requests;
use cms\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $product;
    protected $category;

    public function __construct(Product $product, Categories $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->all();
        $categories = $this->getCategory();
        return view('backend.product.index', compact('products', 'categories'));
    }

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
    public function store(Requests\StoreProductRequest $request)
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

    protected function getCategory()
    {
        $categories = $this->category->all();
        $arrParent = array('0' => 'Chon danh muc');
        if(count($categories)>0){
            foreach ($categories as $category){
                if($category['has_child']==0){
                    array_push($arrParent, $category['name']);
                }

            }
        }

        return $arrParent;
    }
}

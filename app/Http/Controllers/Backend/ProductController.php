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

    public function create(Product $product)
    {
        $categories = $this->getCategory();
        return view('backend.product.form', compact('product', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreProductRequest $request)
    {
        $filename1 = '';
        $filename2 = '';
        $filename3 = '';
        if(Input::file('image1'))
        {
            //image1
            $image1 = Input::file('image1');
            $filename1  = time() . '.' . $image1->getClientOriginalExtension();
            $path = public_path('product/' . $filename1);
            Image::make($image1->getRealPath())->resize(200, 200)->save($path);
            //image2
            $image2 = Input::file('image2');
            $filename2  = time() . '.' . $image2->getClientOriginalExtension();
            $path = public_path('product/' . $filename2);
            Image::make($image2->getRealPath())->resize(200, 200)->save($path);
            //image3
            $image3 = Input::file('image3');
            $filename3  = time() . '.' . $image3->getClientOriginalExtension();
            $path = public_path('product/' . $filename3);
            Image::make($image3->getRealPath())->resize(200, 200)->save($path);

        }
        $product = $this->product->create($request->only('name', 'category_id', 'short_desc', 'description', $filename1, $filename2, $filename3, 'is_hot', 'is_sale', 'price', 'sale_price', 'position', 'active'));

        return redirect(route('backend.product.index'))->with('status', 'Product has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->findOrFail($id);
        $categories = $this->getCategory();

        return view('backend.product.form', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateProductRequest $request, $id)
    {
        $product = $this->product->findOrFail($id);

        $filename1 = $this->fileUpload($request, 'image1');
        $filename2 = $this->fileUpload($request, 'image2');
        $filename3 = $this->fileUpload($request, 'image3');

        $product->fill($request->only('name', 'category_id', 'short_desc', 'description', $filename1, $filename2, $filename3, 'is_hot', 'is_sale', 'price', 'sale_price', 'position', 'active'));

        return redirect(route('backend.product.edit', $product->id))->with('status', 'Product has been updated.');
    }

    public function confirm($id)
    {
        $product = $this->product->findOrFail($id);

        return view('backend.product.confirm', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);

        $product->delete();

        return redirect(route('backend.product.index'))->with('status', 'Product has been deleted.');
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

    private function fileUpload($request, $fileName)
    {
        $imageTempName = $request->file($fileName)->getPathname();
        $imageName = $request->file($fileName)->getClientOriginalName();
        $path = base_path() . '/public/uploads/consultants/images/';
        $request->file($fileName)->move($path , $imageName);
        return $imageName;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userStore = auth()->user()->store;
        $products = $userStore->product()->paginate(10);
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all(['id', 'name']);
        $stores = Store::all(['id', 'name']);
        return view('admin.product.create', ['stores' => $stores, 'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $data = $request->all();
        $store = auth()->user()->store;
        $product = $store->product()->create($data);
        $product->category()->sync($data['categories']);

        if($request->hasFile('photos')){
            $images = $this->imageUpload($request, 'image');
            $product->photo()->createMany($images);
        }

        flash('Produto criado com sucesso')->success();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product::findOrFail($id);
        return view('admin.product.show', ['produc' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all(['id', 'name']);
        $product = $this->product->findOrFail($id);
        return view('admin.product.edit', ['product' => $product, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ProductRequest $request)
    {
        $data = $request->all();

        $product = $this->product::findOrFail($id);
        $product->update($data);
        $product->category()->sync($data['categories']);

        flash('Produto atualizado com sucesso')->success();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product::findOrFail($id);
        $product->delete();
        flash('Produto deletado com sucesso')->success();

        return redirect()->route('products.index');
    }
    private function imageUpload(Request $request, $imageColumn)
    {
        $images = $request->file('photos');

        $imagesList = [];
        foreach ($images as $image) {
            $imagesList[] = [$imageColumn => $image->store('products', 'public')];
        }

        return $imagesList;
    }
}

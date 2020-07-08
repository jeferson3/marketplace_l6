<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Store;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use UploadTrait;

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
        if (auth()->user()->store) {
            $userStore = auth()->user()->store;
            $products = $userStore->product()->paginate(10);
            return view('admin.product.index', ['products' => $products]);
        } else {
            flash('Voce não possui uma loja cadastrada')->warning();
            return redirect()->route('stores.index');
        }
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
        return view('admin.product.create', ['stores' => $stores, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $categories = $request->get('categories', null);

        $store = auth()->user()->store;
        $product = $store->product()->create($data);
        $product->category()->sync($categories);

        if ($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');
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
        return view('admin.product.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ProductRequest $request)
    {
        $data = $request->all();
        $categories = $request->get('categories', null);

        $product = $this->product::findOrFail($id);
        $product->update($data);

        if(!is_null($categories)){
            $product->category()->sync($categories);
        }

        if ($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');
            $product->photo()->createMany($images);
        }

        flash('Produto atualizado com sucesso')->success();

        return redirect()->back();
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
}

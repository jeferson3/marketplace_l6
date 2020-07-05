<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $request;
    private $product;

    public function __construct(Request $request, Product $product)
    {
        $this->request = $request;
        $this->product = $product;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product::paginate(10);
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::all(['id', 'name']);
        return view('admin.product.create', ['stores' => $stores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $product = $this->request->all();
        $store = Store::findOrFail($product['store']);
        $store->product()->create($product);

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
        $product = $this->product->findOrFail($id);
        return view('admin.product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $product = $this->product::findOrFail($id);
        $product->update($this->request->all());
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
}

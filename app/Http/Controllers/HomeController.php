<?php

namespace App\Http\Controllers;

use App\Product;
use App\Store;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    
    public function index()
    {
        $products = $this->product->limit(6)->orderBy('id', 'DESC')->get(); //busca os 8 primeiros produtos
        // dd($products);
        $stores  = Store::limit(3)->orderBy('id','DESC')->get();
        return view('welcome', ['products'=>$products, 'stores'=>$stores]);
    }
    public function single($slug)
    {
        $product = $this->product->whereSlug($slug)->first(); 
        // dd($product);
        if($product)
            return view('single', ['product'=>$product]);
        
        return view('welcome', ['products' => Product::limit(8)]);
        
    }
}

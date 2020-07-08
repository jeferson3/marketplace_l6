<?php

namespace App\Http\Controllers;

use App\Product;
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
        $products = $this->product->limit(8)->orderBy('id', 'DESC')->get(); //busca os 8 primeiros produtos
        // dd($products);
        return view('welcome', ['products'=>$products]);
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

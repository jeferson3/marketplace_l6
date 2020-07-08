<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        // dd(session()->get('cart'));
        $cart = session()->has('cart') ? session()->get('cart') : [];
        
        return view('cart', ['cart' => $cart]);
    }

    public function add(Request $request)
    {
        $product = $request->get('product');

        if (session()->has('cart')) {
            session()->push('cart', $product);

        } else {
            $products[] = $product;
            session()->put('cart', $products);
        }
        
        flash('Produto adionado ao carrinho')->success();

        return redirect()->route('product.single', ['id' => $product['slug']]);
    }
    public function remove($id)
    {
        if (!session()->has('cart')) {
            return redirect()->route('cart.index');
        }

        $products = session()->get('cart');
        $products = array_filter($products, function($line) use($id){
            return $line['slug'] != $id;
        });
        
        session()->put('cart', $products);
        flash('Produto removido do carrinho')->success();

        return redirect()->route('cart.index');
    }
}

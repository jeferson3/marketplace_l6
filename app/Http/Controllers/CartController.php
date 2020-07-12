<?php

namespace App\Http\Controllers;

use App\Product;
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
        $productData = $request->get('product');
        $product = Product::whereSlug($productData['slug']);
        if(!$product->count() || $productData['amount'] <= 0)
            return redirect()->route('home');

        $product = array_merge($productData, $product->first(['name', 'price'])->toArray());

        if (session()->has('cart')) {

            $products = session()->get('cart');
            $productSlugs = array_column($products, 'slug');
            if (in_array($product['slug'], $productSlugs)) {
                $products = $this->productIncrement($products, $product['amount'], $product['slug']);
                session()->put('cart', $products);
            } else {
                session()->push('cart', $product);
            }
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
    public function cancel()
    {
        session()->forget('cart'); //remove todos os prpdutos da sessão cart
        flash('Compra cancelada')->success();
        return redirect()->route('home');

    }
    public function productIncrement($products, $amount, $slug)
    {
        $products = array_map(function($line) use($amount, $slug){
            if($line['slug'] == $slug){
                $line['amount'] += $amount;
            }
            return $line;
        }, $products);

        return $products;
    }

}

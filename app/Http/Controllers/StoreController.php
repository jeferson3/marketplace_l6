<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    private $store;
    public function __construct(Store $store)
    {
        $this->store = $store;   
    }
    public function index($slug)
    {
        $stores = $this->store->whereSlug($slug)->first();
        // dd($stores);
        return view('store', ['store'=>$stores]);
    }
}

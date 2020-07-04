<?php

use App\Category;
use App\Product;
use App\Store;
use App\User;


Route::get('users/{id?}', function ($id = null) {
    if ($id) {
        return User::find($id);
    }
    return User::All();
});


// valores de relacionamentos

Route::get('/', function () {

    ## retornando o usuario e sua loja ##
    // $user = User::find(1); //pega o usuario 1 da tabela
    // $loja = $user->store; //pega a coluna store da tabela do usuario
    // return $loja;

    ## retornando a loja e seus produtos ##
    // $loja = Store::find(1);
    // $products = $loja->product;
    // return $products;

    ## criando uma loja pra um usuário ##
    // $user = User::create([
    //     'name' => 'jeferson',
    //     'email' => 'jefersonemail.com',
    //     'email_verified_at' => now(),
    //     'password' => bcrypt(123456),
    //     'remember_token' => 'nkfdnkndklsbljdk',
    // ]);
    // $loja = $user->store()->create([
    //     'name' => 'Loja teste',
    //     'description' => 'Loja teste de informática',
    //     'phone' => '55-0800-0000',
    //     'mobile_phone' => '55-0800-0000',
    //     'slug' => 'loja-teste'
    // ]);
    // return User::find(41)->store;

    ## criando produto pra loja ##

    // $product = Store::find(41)->product()->create([
    //     'name' => 'Notebook Samsung',
    //     'description' =>  'Core I5 10gb ram',
    //     'body' => 'notebook alta velocidade com alta performace',
    //     'price' => 5300.99,
    //     'slug' => 'notebook-samsung'
    // ]);
    // return $loja->product;

    ## criando categorias ##
    // Category::create([
    //     'name' => 'Games',
    //     'slug' => 'games'
    // ]);
    // Category::create([
    //     'name' => 'Notebooks',
    //     'slug' => 'notebooks'
    // ]);
    // return Category::all();

    // Product::find(41)->category()->attach([1]); //adciona uma categoria a um produto
    // Product::find(41)->category()->detach([1]); //remove uma categoria de um produto
    return Product::find(41)->category;
});

Route::get('admin/stores', 'Admin\\StoreController@index');
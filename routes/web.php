<?php

use App\Product;

// valores de relacionamentos

Route::get('/teste', function () {

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
    return "teste";
});

Route::get('', 'HomeController@index')->name('home');
Route::get('product/{id}', 'HomeController@single')->name('product.single');

Route::group(['prefix' => 'cart', 'as'=>'cart.'], function () {
    Route::get('', 'CartController@index')->name('index');
    Route::post('/add', 'CartController@add')->name('add');
    Route::get('/remove/{id}', 'CartController@remove')->name('remove');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::resource('stores', 'StoreController');
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photos.remove');
});

Auth::routes();

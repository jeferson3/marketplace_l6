<?php

use App\Product;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users/{id?}', function ($id = null) {
    if ($id) {
        return User::find($id);
    }
    return User::All();
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
            'id_store' => '',
            'name' =>  '',
            'description' => '',
            'body' => '',
            'price' => '',
            'slug' => ''
    ];
});

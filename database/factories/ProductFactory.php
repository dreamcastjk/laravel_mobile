<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->word;
    $code = Str::slug($name);

    return [
        'category_id' => \App\Category::all()->random()->id,
        'name' => $name,
        'code' => $code,
        'description' => $faker->text,
        'price' => $faker->randomNumber(),
    ];
});

<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'surname' => $faker->lastname,
        'name' => $faker->firstname,
        'email' => $faker->email,
        'account_type' => $faker->randomElement(['SELLER', 'BUYER']),
        'password' => 123456,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->username,
        'email' => $faker->email,        
        'full_name' => $faker->name,
        'password' => 123456,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->word,
        'description' => $faker->sentence,
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'seller_id' => factory('App\AdminUser')->create()->id,
        'product_name' => $faker->randomElement(['Samsung AZ-300', 'Iphone 6S', 'Bluetooth headphone 3G']),
        'price' => $faker->randomNumber(3),
        'unit_price' => 'USD',
        'total_items' => $faker->randomNumber(),
        'review' => $faker->sentence(),
        'category_id' => factory('App\ProductCategory')->create()->id,
    ];
});

$factory->define(App\ProductPhoto::class, function (Faker\Generator $faker) {
    return [
        'product_id' => factory('App\Product')->create()->id,
        'file_name' => $faker->image(public_path() . '/imgs/280x280', 280, 280),
    ];
});

$factory->define(App\ProductCategory::class, function (Faker\Generator $faker) {
    return [
        'category_name' => $faker->word,
    ];
});
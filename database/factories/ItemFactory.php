<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Item;
use App\Category;
use App\Color;
use App\Brand;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Item::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'price' => rand(0, 10000),
        'description' => $faker->text(190),
        'category_id' => Category::orderByRaw('RAND()')->first()->id,
        'brand_id' => Brand::orderByRaw('RAND()')->first()->id,
        'color_id' => Color::orderByRaw('RAND()')->first()->id,
        'quantity' => rand(0, 1) == 1 ? rand(1, 10) : 0,
        'purchases' => rand(0, 1) == 1 ? rand(1, 40) : 0,
        'discount' => rand(0, 1) == 1 ? rand(1, 50) : 0,
        'img_href' => rand(0, 10) >= 2 ? 'storage/items/product' . rand(1, 8) . '.png' : 'storage/errors/item_no_img.png',
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'caption_en' => $faker->name,
        'caption_ar' => $faker->name,
        'description_en' => $faker->paragraph,
        'description_ar' => $faker->paragraph,
        'price' => $faker->randomFloat(3, 10, 200),
        'active' => $faker->boolean(true),
        'image' => 'user-' . $faker->numberBetween(1, 5) . '.jpg',
        'order' => $faker->numberBetween(1,99),
    ];
});

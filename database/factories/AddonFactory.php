<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Addon;
use Faker\Generator as Faker;

$factory->define(Addon::class, function (Faker $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'caption_en' => $faker->name,
        'caption_ar' => $faker->name,
        'description_en' => $faker->paragraph,
        'description_ar' => $faker->paragraph,
        'active' => $faker->boolean(true),
        'is_multi' => $faker->boolean(true),
        'image' => 'user-' . $faker->numberBetween(1, 5) . '.jpg',
        'exclusive' => $faker->boolean(true),
        'order' => $faker->numberBetween(1,99),
    ];
});

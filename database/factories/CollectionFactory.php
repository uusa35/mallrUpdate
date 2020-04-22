<?php

use App\Models\Collection;
use App\Models\Product;
use App\Models\User;
use Faker\Generator as Faker;
$fakerAr = \Faker\Factory::create('ar_JO');
$factory->define(Collection::class, function (Faker $faker) use($fakerAr) {
    return [
        'name' => $faker->name,
        'slug_ar' => $faker->realText(40),
        'slug_en' => $faker->name,
        'image' => env('APP_MODE') . '-' . $faker->numberBetween(1, 42) . '.jpeg',
        'on_home' => $faker->boolean(true),
        'order' => $faker->numberBetween(1,99),
        'keywords' => $faker->sentence,
        'user_id' => User::all()->random()->id,
        'views' => $faker->randomNumber()
    ];
});

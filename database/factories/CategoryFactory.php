<?php

use App\Models\Category;
use Faker\Generator as Faker;

$fakerAr = \Faker\Factory::create('ar_JO');
$factory->define(Category::class, function (Faker $faker) use ($fakerAr) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'caption_ar' => $faker->name,
        'caption_en' => $faker->name,
        'order' => $faker->numberBetween(1, 99),
        'description_en' => $faker->paragraph(1),
        'description_ar' => $faker->paragraph(1),
        'image' => 'user-' . $faker->numberBetween(1, 5) . '.jpg',
//        'image' => env('APP_MODE') . '-' . $faker->numberBetween(1, 12) . '.jpeg',
        'limited' => $faker->numberBetween(0, 1),
        'parent_id' => Category::where('parent_id', 0)->pluck('id')->shuffle()->first(),
        'on_home' => $faker->boolean(true),
        'on_new' => $faker->boolean(true),
        'is_featured' => $faker->boolean(true),
        'is_service' => $faker->boolean(true),
        'is_product' => $faker->boolean(true),
        'is_user' => $faker->boolean(true),
        'is_classified' => $faker->boolean(true),
        'is_commercial' => $faker->boolean(true),
        'icon' => $faker->randomElement(['fa-user', 'fa-eye', 'fa-map', 'fa-paper']),
        'min' => $faker->numberBetween(0, 10),
        'max' => $faker->numberBetween(1000, 99999),
    ];
});
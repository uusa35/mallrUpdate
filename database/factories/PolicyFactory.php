<?php

use App\Models\Policy;
use Faker\Generator as Faker;

$factory->define(Policy::class, function (Faker $faker) {
    return [
            'title_ar' => $faker->sentence(1),
            'title_en' => $faker->sentence(1),
            'content_en' => $faker->paragraph(5),
            'content_ar' => $faker->paragraph(5),
    ];
});
